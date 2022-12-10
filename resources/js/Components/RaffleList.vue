<script setup>
    defineProps({
        info: {
            numBead: Number,
            numRaffle: Number,
            name: String,
            sellerRm: String,
            numPhone: String,
            purchaseDate: String
        },
        index: Number
    })
</script>

<template>
    <div
        :class="
            `
            flex w-full items-center justify-center text-neutral-500 font-bold h-12
            ${index % 2 ==  1 && 'bg-neutral-200'}
            `
        "
    >
        <p class="w-1/12 text-center">{{info.numBead}}</p>
        <p class="w-1/12 text-center">{{info.numRaffle}}</p>
        <p class="w-4/12">{{info.name}}</p>
        <p class="w-2/12 text-center">{{info.sellerRm}}</p>
        <p class="w-2/12 text-center">{{info.numPhone}}</p>
        <p class="w-2/12 text-center">{{info.purchaseDate}}</p>
    </div>
</template>