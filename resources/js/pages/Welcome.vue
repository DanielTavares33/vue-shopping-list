<script setup lang="ts">
import Header from '@/layouts/Header.vue';
import Search from '@/components/Search.vue';
import MainLayout from '@/layouts/Main.vue';
import Collapsible from '@/components/ui/Collapsible.vue';
import CategoriesList from '@/components/categories/CategoriesList.vue';
import Modal from '@/components/ui/Modal.vue';
import type { Category } from '@/types/interfaces/category';
import type { Product } from '@/types/interfaces/product';

import { ref } from 'vue';
import { router } from '@inertiajs/vue3';

const props = defineProps({
    categories: Array<Category>,
    products: Array<Product>,
});

const isOpen = ref(false);


function openModal() {
    isOpen.value = true;
}

function addProduct(form: { name: string | null; category_id: number | null }) {
    router.post('/add-product', form, {
        onFinish: () => {
            isOpen.value = false;
        }
    });
}

</script>

<template>
    <Header />
    <Search />

    <MainLayout>
        <Collapsible v-for="category in props.categories" :key="category.id" :title="category.name" :icon="category.icon">
            <CategoriesList :category="category" />
        </Collapsible>
    </MainLayout>

    <!-- FLOATING ACTION BUTTON -->
    <button @click="openModal"
        class="btn btn-primary btn-circle fixed bottom-6 right-6 shadow-xl flex items-center justify-center text-2xl">
        <span>+</span>
    </button>

    <Modal :isOpen="isOpen" @close="isOpen = false" @addProduct="addProduct" :categories="props.categories" />
</template>
