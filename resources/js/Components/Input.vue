<script setup>
defineProps({
    labeltext: String,
    modelValue: String,
});
defineEmits(["update:modelValue"]);
</script>

<template>
    <div class="flex flex-col">
        <label class="uppercase text-sky-600 font-bold">{{ labeltext }}</label>
        <input
            v-bind="$attrs"
            :value="modelValue"
            @input="$emit('update:modelValue', $event.target.value)"
            class="w-full h-10 bg-transparent outline-0 border-b-2 border-sky-600"
        />
    </div>
</template>
