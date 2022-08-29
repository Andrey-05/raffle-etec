<script setup>
import Button from "../Components/Button.vue";

import { ref } from "vue";

const count = ref(0);
</script>
<template>
    <div
        class="min-h-screen w-full bg-neutral-50 flex flex-col justify-center items-center"
    >
        <h1 class="text-2xl mb-4">Initial Project With Laravel and Vue</h1>
        <Button @click="count++"
            >The button was clicked {{ count }} times</Button
        >
    </div>
</template>
