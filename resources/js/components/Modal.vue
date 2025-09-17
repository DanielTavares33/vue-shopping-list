<script setup lang='ts'>
const props = defineProps<{
  isOpen: boolean;
}>();

const emit = defineEmits<{
  (e: 'close'): void;
}>();
</script>

<template>
  <dialog id="my_modal_4" class="modal sm:modal-middle" :class="{ 'modal-open': props.isOpen }">
    <div class="modal-box w-11/12 max-w-5xl">
      <h3 class="text-lg font-bold">Hello!</h3>
      <p class="py-4">Click the button below to close</p>
      <div class="modal-action">
        <form method="dialog">
          <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2" @click="emit('close')">✕</button>
          <div class="flex flex-col w-full">
            <div class="mb-4">
              <fieldset class="fieldset">
                <legend class="fieldset-legend">What is your name?</legend>
                <input type="text" class="input" placeholder="Type here" />
                <p class="label">Optional</p>
              </fieldset>
            </div>
          </div>
          <!-- if there is a button, it will close the modal -->
          <button class="btn" @click="emit('close')">Close</button>
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