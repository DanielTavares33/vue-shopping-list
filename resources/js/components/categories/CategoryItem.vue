<script setup lang='ts'>
import Checkbox from '../ui/Checkbox.vue';
import { defineProps } from 'vue';

const props = defineProps<{
  category: {
    id: number;
    name: string;
  };
}>();
</script>

<template>
  <Checkbox :label="props.category.name" />
</template>

<style scoped></style>