<script setup>
    import { MinusIcon } from "@heroicons/vue/24/solid"

    defineProps({
        item:{
            id: Number,
            name: String,
            number: Number
        },
        index: Number
    })
</script>

<template>
    <div
        class="flex w-full justify-between items-center"
    >
        <div class="flex w-full gap-x-4"> 
            <p 
                :class="
                    `uppercase font-bold
                    ${index+1 < 4 ? 'text-sky-600' : 'text-neutral-400'}`
                "
            >
                {{index + 1}}º
            </p>
            <p class="w-full font-bold text-neutral-700">{{item.name}}</p>
        </div>
        <div
            class="flex w-2/12 justify-between"
        >
            <p class="text-sky-600 font-bold">{{item.number}}</p>
            <MinusIcon class="h-5 font-bold text-neutral-400"/>
        </div>
    </div>
</template>