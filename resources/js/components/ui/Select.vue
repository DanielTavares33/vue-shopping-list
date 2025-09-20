<script setup lang='ts'>
import { Category } from '@/types/interfaces/category';
import { defineProps, defineModel } from 'vue';

const props = defineProps<{
  label: string;
  options: Array<Category>;
}>();

const modelValue = defineModel<number>();
</script>

<template>
  <fieldset class="fieldset w-full">
    <legend class="fieldset-legend">{{ props.label }}</legend>
    <select class="select w-full" v-model="modelValue">
      <option disabled value="">Pick a category</option>
      <option v-for="option in props.options" :key="option.id" :value="option.id">{{ option.icon }} {{ option.name }}</option>
    </select>
  </fieldset>
</template>

<style scoped></style>