<script setup>
    import {Button} from "./"

    import { TrashIcon } from "@heroicons/vue/24/solid"

    defineProps({
        item: {
            id: Number,
            text: String,
            date: String,
        }
    })
</script>

<template>
    <div
        class="flex flex-wrap w-full justify-between items-center"
    >
        <p class="uppercase w-full sm:w-1/2 font-bold text-neutral-800">{{ item.text }}</p>
            
        <div
            class="flex w-full sm:w-1/2 gap-x-3 items-center"
        >
            <p class="text-neutral-400">{{ item.date }}</p>
            <Button :hasBackground="false" color="sky" size="full">Gerenciar</Button>
            <Button :hasBackground="false" color="red" size="auto">
                <TrashIcon class="w-7"/>
            </Button>
        </div>
    </div>    
</template>