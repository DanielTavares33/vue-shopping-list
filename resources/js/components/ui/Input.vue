<script setup lang='ts'>
import { defineProps, defineModel } from 'vue';


const props = defineProps<{
  label: string;
  type: string;
  placeholder?: string;
  inputType: 'text' | 'number' | 'email' | 'password';
}>();

const modelValue = defineModel<string | number>();
</script>

<template>
  <fieldset class="fieldset w-full">
    <legend class="fieldset-legend">{{ props.label }}</legend>
    <input
      :type="props.inputType"
      class="input w-full"
      :placeholder="props.placeholder"
      :value="modelValue"
      @input="modelValue = $event.target.value"
    />
  </fieldset>
</template>