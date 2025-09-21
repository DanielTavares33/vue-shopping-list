<script setup lang='ts'>
import Checkbox from '../ui/Checkbox.vue';
import { TrashIcon } from '@heroicons/vue/24/solid';
import { defineProps } from 'vue';

const props = defineProps<{
  product: {
    id: number;
    name: string;
  };
}>();
</script>

<template>
  <form class="flex items-center gap-2 w-full">
    <Checkbox :label="props.product.name" />
    <button type="submit" class="cursor-pointer ml-auto right-0">
      <TrashIcon class="w-5 h-5 text-error hover:text-error/70" />
    </button>
  </form>
</template>

<style scoped></style>