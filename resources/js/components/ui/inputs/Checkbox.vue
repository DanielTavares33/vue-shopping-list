<script setup lang='ts'>
import { defineProps, ref } from 'vue';

const props = defineProps<{
  label?: string;
  value?: number;
  action: () => void;
}>();

const isChecked = ref(false);

function toggle() {
  isChecked.value = !isChecked.value;
}
</script>

<template>
    <input type="checkbox" class="checkbox checkbox-success" :checked="isChecked" :value="props.value" @change="toggle" @click="props.action" />
    <span>{{ props.label }}</span>
</template>

<style scoped>
</style>