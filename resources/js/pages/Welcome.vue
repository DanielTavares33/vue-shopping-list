<script setup lang="ts">
import CategoriesList from '@/components/CategoriesList.vue';
import Collapsible from '@/components/ui/Collapsible.vue';
import Search from '@/components/ui/inputs/Search.vue';
import AddProductModal from '@/components/ui/modals/AddProductModal.vue';
import RequiresConfirmationModal from '@/components/ui/modals/RequiresConfirmationModal.vue';
import Header from '@/layouts/Header.vue';
import MainLayout from '@/layouts/Main.vue';
import type { ProductForm } from '@/types/interfaces/forms/productForm';
import type { Category } from '@/types/interfaces/models/category';
import { PlusIcon } from '@heroicons/vue/24/outline';

import { router } from '@inertiajs/vue3';
import { ref } from 'vue';

const props = withDefaults(
    defineProps<{
        categories: Array<Category>;
        errors: Record<string, any>;
    }>(),
    {
        errors: () => ({}),
    },
);

const form = ref<ProductForm>({
    name: null,
    category_id: null,
});

const isOpen = ref(false);
const requiresConfirmation = ref(false);
const isLoading = ref(false);
const productToDelete = ref<number | null>(null);

function openModal() {
    isOpen.value = true;
    form.value = { name: null, category_id: null };
}

function closeModal() {
    isOpen.value = false;
}

function openConfirmationModal(productId: number) {
    productToDelete.value = productId;
    requiresConfirmation.value = true;
}

function closeConfirmationModal() {
    requiresConfirmation.value = false;
    productToDelete.value = null;
}

function addProduct(form: ProductForm) {
    isLoading.value = true;

    router.post(
        '/add-product',
        {
            name: form.name,
            category_id: form.category_id,
        },
        {
            onFinish: () => {
                isLoading.value = false;

                // Only close if there are no errors
                if (Object.keys(props.errors ?? {}).length === 0) {
                    isOpen.value = false;
                }
            },
        },
    );
}

function confirmDeleteProduct() {
    if (productToDelete.value !== null) {
        router.post(`/delete-product/${productToDelete.value}`);
        closeConfirmationModal();
    }
}
</script>

<template>
    <Header />
    <Search />

    <MainLayout>
        <Collapsible v-for="category in props.categories" :key="category.id" :title="category.name" :icon="category.icon">
            <CategoriesList :category="category" @requestDelete="openConfirmationModal" />
        </Collapsible>
    </MainLayout>

    <!-- FLOATING ACTION BUTTON -->
    <button
        @click="openModal"
        class="btn fixed right-6 bottom-6 flex btn-circle items-center justify-center text-2xl shadow-xl btn-primary"
        aria-label="Add Product"
    >
        <PlusIcon class="h-6 w-6" />
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
</template>
