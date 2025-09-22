<script setup lang='ts'>
const props = defineProps<{
  isOpen: boolean;
}>();

const emit = defineEmits<{
  (e: 'confirm'): void;
  (e: 'close'): void;
}>();
</script>

<template>
  <dialog v-if="props.isOpen" class="modal" open>
    <div class="modal-box">
      <h3 class="text-lg font-bold">Confirm Delete</h3>
      <p class="py-4">Are you sure you want to delete this product?</p>
      <div class="modal-action">
        <button class="btn btn-error" @click="emit('confirm')">Yes</button>
        <button class="btn btn-ghost" @click="emit('close')">No</button>
      </div>
    </div>
  </dialog>
</template>

<style scoped></style>