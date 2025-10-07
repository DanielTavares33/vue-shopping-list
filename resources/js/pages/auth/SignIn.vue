<script setup lang="ts">
import { LoginForm } from '@/types/interfaces/forms/loginForm';
import { useForm } from '@inertiajs/vue3';

const form = useForm<LoginForm>({
    email: null,
    password: null,
});
</script>

<template>
    <div class="flex min-h-screen items-center justify-center bg-base-100">
        <div class="card w-full max-w-sm bg-base-200 shadow-lg">
            <div class="card-body">
                <!-- Header -->
                <h2 class="mb-4 text-center text-2xl font-bold text-primary">Sign In</h2>

                <!-- Form -->
                <form class="space-y-4" @submit.prevent="form.post('/sign-in')">
                    <div>
                        <label class="label">
                            <span class="label-text">Email</span>
                        </label>
                        <input type="email" placeholder="you@example.com" class="input-bordered input w-full" v-model="form.email" required />
                        <div v-if="form.errors.email" class="mt-1 text-sm text-error">{{ form.errors.email }}</div>
                    </div>

                    <div>
                        <label class="label">
                            <span class="label-text">Password</span>
                        </label>
                        <input type="password" placeholder="••••••••" class="input-bordered input w-full" v-model="form.password" required />
                        <div v-if="form.errors.password" class="mt-1 text-sm text-error">{{ form.errors.password }}</div>
                    </div>

                    <!-- <div class="flex justify-between items-center">
                        <label class="label cursor-pointer">
                            <input type="checkbox" class="checkbox checkbox-primary mr-2" />
                            <span class="label-text">Remember me</span>
                        </label>
                        <a href="#" class="text-sm text-primary hover:underline">Forgot password?</a>
                    </div> -->

                    <button type="submit" class="btn w-full btn-primary" :disabled="form.processing">Sign In</button>
                </form>

                <!-- Divider -->
                <!-- <div class="divider">OR</div> -->

                <!-- Social Login -->
                <!-- <button class="btn btn-outline w-full">Continue with Google</button> -->

                <!-- Footer -->
                <!-- <p class="text-center text-sm mt-4">
                    Don’t have an account?
                    <a href="#" class="text-primary hover:underline">Sign Up</a>
                </p> -->
            </div>
        </div>
    </div>
</template>

<style scoped></style>
