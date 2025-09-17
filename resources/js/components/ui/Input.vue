<script setup lang='ts'>
import { defineProps } from 'vue';

const props = defineProps<{
  label: string;
  type: string;
  placeholder?: string;
  inputType: 'text' | 'number' | 'email' | 'password';
  value?: string | number;
}>();
</script>

<template>
  <fieldset class="fieldset w-full">
    <legend class="fieldset-legend">{{ props.label }}</legend>
    <input
      :type="props.inputType"
      class="input w-full"
      :placeholder="props.placeholder"
      :value="props.value"
    />
  </fieldset>
</template>