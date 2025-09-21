<script setup lang='ts'>
import { defineProps, defineModel } from 'vue';


const props = defineProps<{
  label: string;
  type: string;
  placeholder?: string;
  inputType: 'text' | 'number' | 'email' | 'password';
  error?: string;
  required?: boolean;
}>();

const modelValue = defineModel<string | number>();
</script>

<template>
  <fieldset class="fieldset w-full">
    <legend class="fieldset-legend">{{ props.label }}</legend>
    <input
      :type="props.inputType"
      class="input w-full"
      :required="props.required"
      :placeholder="props.placeholder"
      :value="modelValue"
      @input="modelValue = $event.target.value"
    />
    <p v-if="props.error" class="text-sm text-red-600 mt-1">{{ props.error }}</p>
  </fieldset>
</template>