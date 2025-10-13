<script setup lang="ts">
import CategoriesList from '@/components/CategoriesList.vue';
import Collapsible from '@/components/ui/Collapsible.vue';
import Search from '@/components/ui/inputs/Search.vue';
import AddProductModal from '@/components/ui/modals/AddProductModal.vue';
import RequiresConfirmationModal from '@/components/ui/modals/RequiresConfirmationModal.vue';
import ToastMessage from '@/components/ui/toaster/ToastMessage.vue';
import { useProducts } from '@/composables/useProducts';
import Header from '@/layouts/Header.vue';
import MainLayout from '@/layouts/Main.vue';
import { User } from '@/types';
import type { Category } from '@/types/interfaces/models/category';
import type { Toast } from '@/types/interfaces/toast';
import { PlusIcon } from '@heroicons/vue/24/outline';
import { usePage } from '@inertiajs/vue3';
import { computed, onMounted, ref, watch } from 'vue';

const props = withDefaults(
    defineProps<{
        categories: Array<Category>;
        errors: Record<string, any>;
        can: {
            product: {
                create: boolean;
                delete: boolean;
            };
        };
    }>(),
    {
        errors: () => ({}),
    },
);

const page = usePage();
const {
    isOpen,
    form,
    isLoading,
    requiresConfirmation,
    openModal,
    closeModal,
    openConfirmationModal,
    closeConfirmationModal,
    addProduct,
    confirmDeleteProduct,
} = useProducts();
const user = page.props.auth?.user as User | null;

const toast = ref<Toast | null>((page.props.toast as Toast) ?? null);

const shouldShowToast = computed(() => {
    // If back navigation, clear flag and skip showing toast
    if (sessionStorage.getItem('isBackNavigation') === 'true') {
        sessionStorage.removeItem('isBackNavigation');
        return false;
    }

    return toast.value;
});

// Close modal if there are no errors after an attempt to add a product
watch(
    () => props.errors,
    (newErrors) => {
        if (Object.keys(newErrors).length === 0) {
            closeModal();
        }
    },
);

// Watch for changes in page props to update toast
watch(
    () => page.props.toast,
    (newToast) => {
        toast.value = (newToast as Toast) ?? null;
    },
);

// Watch for changes in toast to reset back navigation flag
onMounted(() => {
    window.addEventListener('popstate', () => {
        sessionStorage.setItem('isBackNavigation', 'true');
        // Optionally hide any visible toast immediately
        toast.value = null;
    });
});
</script>

<template>
    <Header />
    <Search />

    <MainLayout>
        <Collapsible v-for="category in props.categories" :key="category.id" :title="category.name" :icon="category.icon">
            <CategoriesList :category="category" @requestDelete="openConfirmationModal" :canDelete="props.can.product.delete" />
        </Collapsible>
    </MainLayout>

    <!-- FLOATING ACTION BUTTON -->
    <button
        @click="openModal"
        class="btn fixed right-6 bottom-6 flex btn-circle items-center justify-center text-2xl shadow-xl btn-secondary"
        aria-label="Add Product"
        v-if="user && props.can.product.create"
    >
        <PlusIcon class="h-6 text-white" />
    </button>

    <AddProductModal
        :isOpen="isOpen"
        @close="closeModal"
        @addProduct="addProduct"
        :categories="props.categories"
        :errors="props.errors"
        :isLoading="isLoading"
        v-model:form="form"
    />
    <RequiresConfirmationModal :isOpen="requiresConfirmation" @close="closeConfirmationModal" @confirm="confirmDeleteProduct" />
    <ToastMessage v-if="shouldShowToast" :message="toast.message" :type="toast.type" :timeout="toast.duration" @close="toast = null" />
</template>
