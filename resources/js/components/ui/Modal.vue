<script setup lang='ts'>
import Input from './Input.vue';
import Select from './Select.vue';
import type { Category } from '@/types/interfaces/category';

import { defineProps, defineEmits, reactive } from 'vue';
import { ref } from 'vue';

const props = defineProps<{
  isOpen: boolean;
  categories: Array<Category>;
}>();

const emit = defineEmits<{
  (e: 'close'): void;
  (e: 'addProduct'): void;
}>();

const modalID = ref<string>('modal_' + Math.random().toString(36).substring(2, 15));

const form = reactive({
  name: null,
  category_id: '',
});
</script>

<template>
  <dialog :id="modalID" class="modal sm:modal-middle" :class="{ 'modal-open': props.isOpen }">
    <div class="modal-box">
      <h3 class="text-lg font-bold">🛒 Add Product</h3>
      <p class="py-4">Fill in the details below:</p>
      <div class="modal-action">
        <form class="w-full flex flex-col gap-4" @submit.prevent="emit('addProduct', form)">
          <button type="button" class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2" @click="emit('close')">✕</button>
          <div class="flex flex-col w-full">
            <Input v-model="form.name" label="Product Name" type="text" placeholder="Type here" inputType="text" />
            <Select v-model="form.category_id" label="Category" :options="props.categories" />
          </div>
          <div class="flex w-full gap-2">
            <button type="submit" class="btn btn-success">Add</button>
            <button type="button" class="btn btn-ghost" @click="emit('close')">Close</button>
          </div>
        </form>
      </div>
    </div>
  </dialog>
</template>

<style scoped>
.modal {
  display: none;
  position: fixed;
  inset: 0;
  z-index: 50;
  justify-content: center;
  align-items: center;
  width: 100vw;
  height: 100vh;
  display: flex;
}

.modal-open {
  display: flex;
}
</style>