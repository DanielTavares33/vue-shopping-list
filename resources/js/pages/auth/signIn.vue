<script setup lang='ts'>
</script>

<template>
    <div class="min-h-screen bg-base-100 flex items-center justify-center">
        <div class="card w-full max-w-sm shadow-lg bg-base-200">
            <div class="card-body">
                <!-- Header -->
                <h2 class="text-center text-2xl font-bold text-primary mb-4">Sign In</h2>

                <!-- Form -->
                <form class="space-y-4">
                    <div>
                        <label class="label">
                            <span class="label-text">Email</span>
                        </label>
                        <input type="email" placeholder="you@example.com" class="input input-bordered w-full"
                            required />
                    </div>

                    <div>
                        <label class="label">
                            <span class="label-text">Password</span>
                        </label>
                        <input type="password" placeholder="••••••••" class="input input-bordered w-full" required />
                    </div>

                    <!-- <div class="flex justify-between items-center">
                        <label class="label cursor-pointer">
                            <input type="checkbox" class="checkbox checkbox-primary mr-2" />
                            <span class="label-text">Remember me</span>
                        </label>
                        <a href="#" class="text-sm text-primary hover:underline">Forgot password?</a>
                    </div> -->

                    <button type="submit" class="btn btn-primary w-full">Sign In</button>
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