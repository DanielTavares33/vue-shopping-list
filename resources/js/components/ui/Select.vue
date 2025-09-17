<script setup lang='ts'>
import { defineProps } from 'vue';

const props = defineProps<{
  label: string;
  options?: string[];
}>();
</script>

<template>
  <fieldset class="fieldset w-full">
    <legend class="fieldset-legend">{{ props.label }}</legend>
    <select class="select w-full">
      <option disabled selected>Pick a category</option>
      <option v-for="option in props.options" :key="option">{{ option }}</option>
    </select>
  </fieldset>
</template>

<style scoped></style>