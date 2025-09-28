<script setup lang='ts'>
import { TrashIcon } from '@heroicons/vue/24/solid';
</script>

<template>
    <div class="space-y-3 mb-4">
        <!-- Product -->
        <div class="card bg-base-200 shadow-sm">
            <div class="card-body flex-row justify-between items-center p-4">
                <div class="flex items-center gap-3">
                    <h2 class="card-title text-base">Broccoli</h2>
                </div>
                <div class="flex items-center gap-3">
                    <div class="btn-group">
                        <button class="btn btn-xs">-</button>
                        <button class="btn btn-xs btn-ghost">2</button>
                        <button class="btn btn-xs">+</button>
                    </div>

                    <button type="submit" class="right-0 ml-auto cursor-pointer" @click.prevent="handleDelete">
                        <TrashIcon class="h-5 w-5 text-error hover:text-error/70" />
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped></style>