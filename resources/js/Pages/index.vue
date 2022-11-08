<script setup>
import Button from "../Components/Button.vue";

import { ref } from "vue";

const count = ref(0);
</script>
<template>
    <div
        class="min-h-screen w-full bg-neutral-50 flex flex-col justify-center items-center"
    >
        <img
            src="/logoEtec.jpg"
            alt="Logo da Etec da Zona Leste"
            class="h-24 rounded-xl mb-6"
        />
        <h1 class="text-cyan-600 text-6xl font-bold">RIFAS ETEC</h1>
    </div>
</template>
