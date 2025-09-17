<script setup lang='ts'>
import CategoryItem from './CategoryItem.vue';

const categoryItems = [
  { id: 1, name: 'Baguette' },
  { id: 2, name: 'Bread' },
  { id: 3, name: 'Butter' },
];


</script>

<template>
  <ul class="space-y-2">
    <li class="hover:bg-base-300 flex items-center gap-2 rounded p-2" v-for="category in categoryItems" :key="category.id">
      <CategoryItem :category="category" />
    </li>
  </ul>
</template>

<style scoped></style>