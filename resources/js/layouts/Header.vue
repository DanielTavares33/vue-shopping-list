<script setup lang="ts">
import { ShoppingCartIcon, UserIcon } from '@heroicons/vue/24/outline';
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue';

const title = ref('Grocery List');
const cartItemCount = ref(2);
</script>

<template>
    <header class="navbar bg-primary px-4 md:px-4 lg:px-12 text-primary-content shadow-lg">
        <div class="flex-1">
            <Link href="/">
            <h1 class="text-xl font-extrabold normal-case">{{ title }}</h1>
            </Link>
        </div>
        <div class="flex gap-4 md:gap-4 lg:gap-8 items-center">
            <Link href="/sign-in" class="btn btn-secondary btn-sm lg:btn">
                <UserIcon class="size-4 md:size-6 lg:size-6 text-white" />
                <span class="text-white text-xs md:text-sm lg:text-base">Sign In</span>
            </Link>
            <div class="flex">
                <Link href="/cart"
                    class="border-none bg-primary text-white shadow-none">
                <ShoppingCartIcon class="size-6 md:size-6 lg:size-8" />
                </Link>
                <span class="text-sm font-bold">{{ cartItemCount }}</span>
            </div>
        </div>
    </header>
</template>
