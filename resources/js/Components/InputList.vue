<script setup>
    import { Input, Button } from "./"

    import { PlusIcon, MinusIcon } from "@heroicons/vue/20/solid";

    defineProps({
        array: [String],
        disabled: Boolean
    })
</script>

<template>
    <div
        v-for="(item, index) in array"
        :key="index"
        class="flex w-full gap-x-2 items-center"
    >
        <Input
            :labeltext="`prêmio - ${index+1}º ganhador`"
            :disabled="disabled"
            type="text"
            :value="item"
            @change="text => array[index] = text.target.value.toString()"
            required
        />
        <button
            type="button"
            :disabled="disabled"
            @click="() => array.push('')"
            class="flex w-7 h-7 justify-center items-center p-0.5 rounded bg-sky-300 text-sky-600 hover:bg-sky-400"
        >
            <PlusIcon class="w-full"/>
        </button>
        <button
            v-if="index > 0"
            type="button"
            :disabled="disabled"
            @click="() => array = array.slice(0,index).concat(array.slice(index+1))"
            class="flex w-7 h-7 justify-center items-center p-0.5 rounded bg-red-300 text-red-600 hover:bg-red-400"
        >
            <MinusIcon class="w-full"/>
        </button>
    </div>
</template>