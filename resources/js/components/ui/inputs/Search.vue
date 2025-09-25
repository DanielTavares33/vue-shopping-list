<script setup lang="ts">
import { computed, ref, onMounted, onUnmounted } from 'vue';

const isMac = computed(() => navigator.platform.toLowerCase().includes('mac'));
const isMobile = computed(() => /Mobi|Android|iPhone|iPad|iPod|Mobile/i.test(navigator.userAgent));

const inputRef = ref<HTMLInputElement | null>(null);

function handleShortcut(e: KeyboardEvent) {
  if (
    (isMac.value && e.metaKey && e.key.toLowerCase() === 'k') ||
    (!isMac.value && e.ctrlKey && e.key.toLowerCase() === 'k')
  ) {
    e.preventDefault();
    inputRef.value?.focus();
  }
}

onMounted(() => {
  window.addEventListener('keydown', handleShortcut);
});

onUnmounted(() => {
  window.removeEventListener('keydown', handleShortcut);
});
</script>

<template>
  <div class="flex p-4 w-full max-w-screen">
    <label class="input w-full">
      <input ref="inputRef" type="search" class="grow" placeholder="Search" />
      <span v-if="isMac" class="flex gap-1" v-show="!isMobile">
        <kbd class="kbd kbd-sm">⌘</kbd>
        <kbd class="kbd kbd-sm">K</kbd>
      </span>
      <span v-else class="flex gap-1" v-show="!isMobile">
        <kbd class="kbd kbd-sm">Ctrl</kbd>
        <kbd class="kbd kbd-sm">K</kbd>
      </span>
    </label>
  </div>
</template>

<style scoped></style>