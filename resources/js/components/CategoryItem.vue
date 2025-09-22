<script setup lang="ts">
import Checkbox from '@/components/ui/inputs/Checkbox.vue';
import type { Product } from '@/types/interfaces/models/product';
import { TrashIcon } from '@heroicons/vue/24/solid';

import { defineProps } from 'vue';

const props = defineProps<{
    product: Product;
}>();

const emit = defineEmits<{
    (e: 'requestDelete', productId: number): void;
}>();

function handleDelete() {
    emit('requestDelete', props.product.id);
}
</script>

<template>
    <Checkbox :label="props.product.name" :value="props.product.id" />
    <button type="submit" class="right-0 ml-auto cursor-pointer" @click.prevent="handleDelete">
        <TrashIcon class="h-5 w-5 text-error hover:text-error/70" />
    </button>
</template>
