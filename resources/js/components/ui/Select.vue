<script setup lang='ts'>
import { Category } from '@/types/interfaces/models/category';
import { defineProps, defineModel } from 'vue';

const props = defineProps<{
  label: string;
  options: Array<Category>;
  error?: string;
  required?: boolean;
}>();

const modelValue = defineModel<number>();
</script>

<template>
  <fieldset class="fieldset w-full">
    <legend class="fieldset-legend">{{ props.label }}</legend>
    <select class="select w-full" v-model="modelValue" :required="props.required">
      <option disabled :value="null">Pick a category</option>
      <option v-for="option in props.options" :key="option.id" :value="option.id">{{ option.icon }} {{ option.name }}</option>
    </select>
    <p v-if="props.error" class="text-sm text-red-600 mt-1">{{ props.error }}</p>
  </fieldset>
</template>

<style scoped></style>