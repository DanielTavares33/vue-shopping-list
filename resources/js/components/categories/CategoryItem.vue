<script setup lang='ts'>
import Checkbox from '../ui/Checkbox.vue';
import { defineProps } from 'vue';

const props = defineProps<{
  product: {
    id: number;
    name: string;
  };
}>();
</script>

<template>
  <Checkbox :label="props.product.name" />
</template>

<style scoped></style>