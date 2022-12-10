<script setup>
defineProps({
    labeltext: String,
});
</script>

<template>
    <div class="flex flex-col w-full">
        <label class="uppercase text-sky-600 font-bold">{{ labeltext }}</label>
        <input
            v-bind="$attrs"
            class="w-full h-10 bg-transparent outline-0 border-b-2 border-sky-600"
        />
    </div>
</template>
