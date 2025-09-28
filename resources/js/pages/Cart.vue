<script setup lang='ts'>
import Header from '@/layouts/Header.vue';
import MainLayout from '@/layouts/Main.vue';
import ProductCard from '@/components/ProductCard.vue';
</script>

<template>
    <Header />

    <MainLayout>
    <section class="flex flex-col w-full max-w-2xl mx-auto h-auto p-4 sm:p-8 md:p-20 rounded-2xl">
            <h1 class="text-3xl font-bold mb-8">🛒 Your Cart</h1>
            <ProductCard />
            <ProductCard />
            <ProductCard />
        </section>
    </MainLayout>
</template>

<style scoped></style>