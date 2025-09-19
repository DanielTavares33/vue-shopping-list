<script setup lang='ts'>
import CategoryItem from './CategoryItem.vue';

const props = defineProps({
  category: {
    type: Object,
    required: true,
  },
});

</script>

<template>
  <ul class="space-y-2">
    <li class="hover:bg-base-300 flex items-center gap-2 rounded p-2" v-for="product in props.category.products" :key="product.id">
      <CategoryItem :product="product" />
    </li>
  </ul>
</template>

<style scoped></style>