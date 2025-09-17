<script setup lang='ts'>
import { defineProps } from 'vue';
const props = defineProps<{
  label?: string;
}>();
</script>

<template>
  <input type="checkbox" class="checkbox checkbox-success" />
  <span>{{ props.label }}</span>
</template>

<style scoped>
</style>