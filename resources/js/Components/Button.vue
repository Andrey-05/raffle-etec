<script setup>
    defineProps({
        hasBackground: Boolean,
        color: String
    })
</script>

<template>
    <button
        :class="
            `w-full h-12 rounded-md uppercase font-bold
            ${hasBackground
                ? color == 'sky' 
                    ? 'bg-sky-600 text-white hover:bg-sky-700' 
                    : color == 'red' 
                    && 'bg-red-600 text-white hover:bg-red-700'
                : color == 'sky'
                    ? 'text-sky-600 hover:text-sky-700' 
                    : color == 'red' 
                    && 'text-red-600 hover:text-red-700'
            }`
        "
    >
        <slot />
    </button>
</template>
