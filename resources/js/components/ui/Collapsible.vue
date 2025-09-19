<script setup lang='ts'>
import { defineProps } from 'vue';

const props = defineProps({
  icon: {
    type: String,
  },
  title: {
    type: String,
  }
});
</script>

<template>
  <div class="collapse-arrow bg-base-200 rounded-box collapse mb-3">
    <input type="checkbox" />
    <div class="collapse-title text-secondary text-lg font-semibold">{{ props.icon }} {{ props.title }}</div>
    <div class="collapse-content">
      <slot />
    </div>
  </div>
</template>

<style scoped></style>