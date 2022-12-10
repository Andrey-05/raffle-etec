<script setup>
    defineProps({
        hasBackground: Boolean,
        color: String,
        size: String
    })
</script>

<template>
    <button
        :class="
            `flex justify-center items-center h-12 p-2 rounded-md uppercase font-bold gap-x-1
            ${hasBackground
                ? color == 'sky' 
                    ? 'bg-sky-600 text-white hover:bg-sky-700' 
                    : color == 'red' 
                    ? 'bg-red-600 text-white hover:bg-red-700'
                    : color == 'lightSky'
                    && 'bg-sky-200 text-sky-600 hover:bg-sky-300'
                : color == 'sky'
                    ? 'text-sky-600 hover:text-sky-700' 
                    : color == 'red' 
                    ? 'text-red-600 hover:text-red-700'
                    : color == 'lightSky'
                    && 'text-sky-300 hover:text-sky-400'
            }
            ${
                size == 'full'
                ? 'w-full'
                : size == '1/2'
                ? 'w-1/2'
                : size == 'auto'
                ? 'w-auto'
                : 'w-full'
            }
            `
        "
    >
        <slot />
    </button>
</template>
