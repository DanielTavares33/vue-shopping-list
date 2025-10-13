<script setup lang="ts">
import ProductCard from '@/components/ProductCard.vue';
import Header from '@/layouts/Header.vue';
import MainLayout from '@/layouts/Main.vue';
</script>

<template>
    <Header />

    <MainLayout>
        <section class="mx-auto flex h-auto w-full max-w-2xl flex-col rounded-2xl p-4 sm:p-8 md:p-20">
            <h1 class="mb-8 text-3xl font-bold">🛒 Your Cart</h1>
            <ProductCard />
            <ProductCard />
            <ProductCard />
        </section>
    </MainLayout>
</template>

<style scoped></style>
