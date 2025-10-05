<script setup lang="ts">
import { ShoppingCartIcon, UserIcon, ArrowLeftStartOnRectangleIcon } from '@heroicons/vue/24/outline';
import { ArrowDownIcon } from '@heroicons/vue/24/solid';
import { Link, router, usePage } from '@inertiajs/vue3';
import { ref } from 'vue';
import { useToast } from '@/composables/useToast';

const title = ref('Grocery List');
const cartItemCount = ref(2);
const page = usePage();
const user = page.props.auth?.user;

const { toasterMessage, toasterType, showToast } = useToast();

function logout() {
    router.post('/logout', {}, {
        preserveState: false,
        onSuccess: () => {
            showToast({
                message: 'Logged out successfully.',
                type: 'success',
                duration: 3000,
            });
        },
        onError: () => {
            showToast({
                message: 'Error logging out. Please try again.',
                type: 'error',
                duration: 3000,
            });
        }
    });
}
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
                <div class="dropdown dropdown-start">
                    <span
                        tabindex="0"
                        class="flex items-center gap-2 text-xs md:text-sm lg:text-base text-white cursor-pointer"
                        aria-haspopup="true"
                        aria-expanded="false"
                    >
                        Welcome, <span class="font-bold">{{ user.name }}</span>
                        <ArrowDownIcon class="inline size-4 text-white" />
                    </span>
                    <ul tabindex="0" class="dropdown-content menu z-1 w-42 rounded-box bg-base-100 p-2 shadow-sm">
                        <li>
                            <a class="text-base text-black" @click.prevent="logout">
                                <ArrowLeftStartOnRectangleIcon class="inline size-4 text-black" /> Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="flex">
                <Link href="/cart" class="border-none bg-primary text-white shadow-none">
                    <ShoppingCartIcon class="size-4 md:size-4 lg:size-6" />
                </Link>
                <span class="text-sm font-bold">{{ cartItemCount }}</span>
            </div>
        </div>
    </header>
</template>