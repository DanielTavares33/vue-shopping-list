<script setup lang="ts">
import CategoryItem from '@/components/CategoryItem.vue';
import { Product } from '@/types/interfaces/models/product';

const props = defineProps<{
    category: {
        products: Array<Product>;
    };
}>();

const emit = defineEmits<{
    (e: 'requestDelete', productId: number): void;
}>();
</script>

<template>
    <ul class="space-y-2">
        <li class="flex items-center gap-2 rounded p-2 hover:bg-base-300" v-for="product in props.category.products" :key="product.id">
            <CategoryItem :product="product" @requestDelete="emit('requestDelete', product.id)" />
        </li>
    </ul>
</template>

<style scoped></style>
