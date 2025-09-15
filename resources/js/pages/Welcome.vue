<script setup lang="ts"></script>

<template>
    <div class="bg-base-100 flex min-h-screen flex-col">
        <!-- HEADER -->
        <header class="navbar bg-primary text-primary-content shadow-lg px-4">
            <div class="flex-1">
                <h1 class="text-xl normal-case">🛒 Grocery List</h1>
            </div>
            <div class="flex-none">
                <button class="btn btn-ghost">Profile</button>
            </div>
        </header>

        <!-- SEARCH BAR -->
        <div class="p-4">
            <input type="text" placeholder="Search groceries..." class="input input-bordered w-full" />
        </div>

        <!-- CATEGORIES & PRODUCTS -->
        <main class="flex-1 overflow-y-auto px-4 pb-20">
            <!-- Category: Vegetables -->
            <div class="collapse-arrow bg-base-200 rounded-box collapse mb-3">
                <input type="checkbox" />
                <div class="collapse-title text-primary text-lg font-semibold">🥦 Vegetables</div>
                <div class="collapse-content">
                    <ul class="space-y-2">
                        <li class="hover:bg-base-300 flex items-center gap-2 rounded p-2">
                            <input type="checkbox" class="checkbox checkbox-success" />
                            <span>Broccoli</span>
                        </li>
                        <li class="hover:bg-base-300 flex items-center gap-2 rounded p-2">
                            <input type="checkbox" class="checkbox checkbox-success" />
                            <span>Carrots</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Category: Bakery -->
            <div class="collapse-arrow bg-base-200 rounded-box collapse mb-3">
                <input type="checkbox" />
                <div class="collapse-title text-secondary text-lg font-semibold">🍞 Bakery</div>
                <div class="collapse-content">
                    <ul class="space-y-2">
                        <li class="hover:bg-base-300 flex items-center gap-2 rounded p-2">
                            <input type="checkbox" class="checkbox checkbox-success" />
                            <span>Baguette</span>
                        </li>
                        <li class="hover:bg-base-300 flex items-center gap-2 rounded p-2">
                            <input type="checkbox" class="checkbox checkbox-success" />
                            <span>Croissant</span>
                        </li>
                    </ul>
                </div>
            </div>
        </main>

        <!-- FLOATING ACTION BUTTON -->
        <button class="btn btn-primary btn-circle fixed bottom-6 right-6 shadow-xl">➕</button>
    </div>
</template>
