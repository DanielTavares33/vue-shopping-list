<script setup lang="ts">
import Checkbox from '@/components/ui/inputs/Checkbox.vue';
import { User } from '@/types';
import type { Product } from '@/types/interfaces/models/product';
import { TrashIcon } from '@heroicons/vue/24/solid';
import { usePage } from '@inertiajs/vue3';
import { defineProps } from 'vue';
import { useProducts } from '@/composables/useProducts';

const page = usePage();
const user = page.props.auth?.user as User | null;
const { addProductToCart } = useProducts();


const props = defineProps<{
    product: Product;
    canDelete?: boolean;
}>();

const emit = defineEmits<{
    (e: 'requestDelete', productId: number): void;
}>();

function handleDelete() {
    emit('requestDelete', props.product.id);
}

function handleAddToCart() {
    addProductToCart(props.product);
}
</script>

<template>
    <Checkbox :label="props.product.name" :value="props.product.id" :action="handleAddToCart" />
    <button v-if="user && props.canDelete" type="submit" class="right-0 ml-auto cursor-pointer" @click.prevent="handleDelete">
        <TrashIcon class="h-5 w-5 text-error hover:text-error/70" />
    </button>
</template>
