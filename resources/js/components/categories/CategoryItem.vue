<script setup lang='ts'>
import Checkbox from '../ui/Checkbox.vue';
import { TrashIcon } from '@heroicons/vue/24/solid';
import type { Product } from '@/types/interfaces/models/product';
import { router } from '@inertiajs/vue3';

import { defineProps, ref } from 'vue';
import Modal from '../ui/Modal.vue';

const props = defineProps<{
  product: Product;
}>();

const requiresConfirmation = ref(false);

function deleteProduct() {
  router.post(`/delete-product/${props.product.id}`);
}

</script>

<template>
  <form class="flex items-center gap-2 w-full" @submit.prevent="deleteProduct">
    <Checkbox :label="props.product.name" :value="props.product.id" />
    <button type="submit" class="cursor-pointer ml-auto right-0">
      <TrashIcon class="w-5 h-5 text-error hover:text-error/70" />
    </button>
  </form>

  <Modal :isOpen="requiresConfirmation" :isLoading="false" :form="{ name: null, category_id: null }" :categories="[]"
    @close="requiresConfirmation = false" @addProduct="deleteProduct" />
</template>

<style scoped></style>