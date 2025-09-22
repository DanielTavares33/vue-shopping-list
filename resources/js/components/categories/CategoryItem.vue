<script setup lang='ts'>
import Checkbox from '@/components/ui/inputs/Checkbox.vue';
import { TrashIcon } from '@heroicons/vue/24/solid';
import type { Product } from '@/types/interfaces/models/product';

import { defineProps, ref } from 'vue';

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
  <button type="submit" class="cursor-pointer ml-auto right-0" @click.prevent="handleDelete">
    <TrashIcon class="w-5 h-5 text-error hover:text-error/70" />
  </button>
</template>