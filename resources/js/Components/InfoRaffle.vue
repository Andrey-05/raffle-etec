<script setup>
defineProps({
    titleText: String,
    text: String,
});
</script>

<template>
    <div class="flex flex-col gap-y-1">
        <p class="text-sky-600 uppercase font-bold text-base text-center">
            {{ titleText }}
        </p>
        <p
            class="font-bold text-neutral-500 text-sms text-center whitespace-pre"
        >
            {{ text }}
        </p>
    </div>
</template>
