<script setup lang='ts'>
import Input from './Input.vue';
import Select from './Select.vue';
import type { Category } from '@/types/interfaces/models/category';
import type { ProductForm } from '@/types/interfaces/forms/productForm';

import { defineProps, defineEmits } from 'vue';
import { ref, watch, onUnmounted } from 'vue';

const props = defineProps<{
  isOpen: boolean;
  categories: Array<Category>;
  errors?: Record<string, any>;
  isLoading?: boolean;
  form: ProductForm;
}>();

const emit = defineEmits<{
  (e: 'close'): void;
  (e: 'addProduct', form: ProductForm): void;
}>();

const modalID = ref<string>('modal_' + Math.random().toString(36).substring(2, 15));
</script>

<template>
  <dialog :id="modalID" class="modal sm:modal-middle" :class="{ 'modal-open': props.isOpen }">
    <div class="modal-box">
      <h3 class="text-lg font-bold">🛒 Add Product</h3>
      <p class="py-4">Fill in the details below:</p>
      <div class="modal-action">
        <form class="w-full flex flex-col gap-4" method="dialog" @submit.prevent="emit('addProduct', props.form)">
          <button type="button" class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2"
            @click="emit('close')">✕</button>
          <div class="flex flex-col w-full">
            <Input v-model="props.form.name" required label="Product Name" type="text" placeholder="Type here"
              inputType="text" :error="props.errors?.name" />
            <Select v-model="props.form.category_id" required label="Category" :options="props.categories"
              :error="props.errors?.category_id" />
          </div>
          <div class="flex w-full gap-2">
            <button type="submit" class="btn btn-primary">
              <span class="loading loading-spinner" v-if="props.isLoading"></span>
              Add
            </button>
            <button type="button" class="btn btn-ghost" @click="emit('close')">Close</button>
          </div>
        </form>
      </div>
    </div>
  </dialog>
</template>

<style scoped>
.modal-open {
  visibility: visible;
}
</style>