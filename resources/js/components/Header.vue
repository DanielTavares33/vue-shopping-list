<script setup lang="ts">
import { ref } from 'vue';

const title = ref('Grocery List');
const icon = ref('🛒');
</script>

<template>
    <header class="navbar bg-primary px-4 text-primary-content shadow-lg">
        <div class="flex-1">
            <h1 class="text-xl normal-case">{{ icon }} {{ title }}</h1>
        </div>
        <div class="flex-none">
            <button class="btn btn-ghost">Profile</button>
        </div>
    </header>
</template>
