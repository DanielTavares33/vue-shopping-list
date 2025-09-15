<script setup lang="ts">
import Header from '@/components/Header.vue';
import Search from '@/components/Search.vue';
import MainLayout from '@/layouts/Main.vue';
import Collapsible from '@/components/Collapsible.vue';
import CategoriesList from '@/components/CategoriesList.vue';
</script>

<template>
    <Header />
    <Search />

    <MainLayout>
        <Collapsible title="🍞 Bakery">
            <CategoriesList />
        </Collapsible>

        <Collapsible title="🍎 Fruits & Vegetables">
            <CategoriesList />
        </Collapsible>

        <Collapsible title="🥩 Meat & Fish">
            <CategoriesList />
        </Collapsible>

        <Collapsible title="🧴 Household">
            <CategoriesList />
        </Collapsible>
    </MainLayout>

    <!-- FLOATING ACTION BUTTON -->
    <button class="btn btn-primary btn-circle fixed bottom-6 right-6 shadow-xl flex items-center justify-center text-2xl">
        <span>+</span>
    </button>
</template>
