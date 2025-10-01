<script setup lang="ts">
import { ShoppingCartIcon, UserIcon } from '@heroicons/vue/24/outline';
import { Link, usePage } from '@inertiajs/vue3';
import { ref } from 'vue';

const title = ref('Grocery List');
const cartItemCount = ref(2);
const page = usePage();
const user = page.props.auth?.user;
</script>

<template>
    <header class="navbar bg-primary px-4 text-primary-content shadow-lg md:px-4 lg:px-12">
        <div class="flex-1">
            <Link href="/">
                <h1 class="text-xl font-extrabold normal-case">{{ title }}</h1>
            </Link>
        </div>
        <div class="flex items-center gap-4 md:gap-4 lg:gap-8">
            <Link v-if="!user" href="/sign-in" class="btn btn-sm btn-secondary lg:btn">
                <UserIcon class="size-4 text-white md:size-6 lg:size-6" />
                <span class="text-xs text-white md:text-sm lg:text-base">Sign In</span>
            </Link>
            <div v-else class="flex items-center gap-2">
                <span class="text-sm text-white md:text-sm lg:text-lg"
                    >Welcome, <span class="font-bold text-secondary">{{ user.name }}</span></span
                >
            </div>
            <div class="flex">
                <Link href="/cart" class="border-none bg-primary text-white shadow-none">
                    <ShoppingCartIcon class="size-6 md:size-6 lg:size-8" />
                </Link>
                <span class="text-sm font-bold">{{ cartItemCount }}</span>
            </div>
        </div>
    </header>
</template>
