<script setup lang='ts'>
import Input from './Input.vue';
import Select from './Select.vue';

import { defineProps, defineEmits } from 'vue';
import { ref } from 'vue';

const props = defineProps<{
  isOpen: boolean;
}>();

const emit = defineEmits<{
  (e: 'close'): void;
}>();

const modalID = ref<string>('modal_' + Math.random().toString(36).substr(2, 9));

const options = ref<string[]>(['Grocery', 'Electronics', 'Clothing', 'Household', 'Other']);
</script>

<template>
  <dialog :id="modalID" class="modal sm:modal-middle" :class="{ 'modal-open': props.isOpen }">
    <div class="modal-box">
      <h3 class="text-lg font-bold">🛒 Add Product</h3>
      <p class="py-4">Fill in the details below:</p>
      <div class="modal-action">
        <form method="dialog" class="w-full flex flex-col gap-4">
          <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2" @click="emit('close')">✕</button>
          <div class="flex flex-col w-full">
            <Input label="Product Name" type="text" placeholder="Type here" inputType="text" />
            <Input label="Quantity" type="number" inputType="number" :value="1"/>
            <Select label="Category" :options="options" />
          </div>
          <div class="flex w-full gap-2">
            <!-- if there is a button, it will close the modal -->
            <button class="btn btn-success" @click="emit('close')">Add</button>
            <button class="btn btn-ghost" @click="emit('close')">Close</button>
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