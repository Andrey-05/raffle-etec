<script setup>
import { ref } from "vue";

import { Button, RankingItem } from "../Components";
import { TrophyIcon } from "@heroicons/vue/24/solid";
import { usePage } from "@inertiajs/inertia-vue3";

const sellers = usePage().props.value.sellers;
const raffle = usePage().props.value.raffle;
</script>

<template>
    <div class="min-h-screen w-full flex justify-center bg-slate-100">
        <div
            class="flex flex-col max-w-xl items-center justify-between p-6 flex-1"
        >
            <div class="flex flex-col w-full items-center justify-center">
                <TrophyIcon class="h-20 text-yellow-500" />
                <h1 class="text-sky-600 text-5xl font-bold uppercase mt-6">
                    {{ raffle.title }}
                </h1>
            </div>
            <div class="flex flex-col w-full h-full mt-20 gap-y-6">
                <RankingItem
                    v-for="(seller, index) in sellers"
                    :key="index"
                    :item="{
                        name: seller.rm,
                        number: seller.sold_raffles,
                    }"
                    :index="index"
                />
                <!-- <Button
                    :hasBackground="false"
                    color="sky"
                    size="full"
                    v-if="sellers.length > 10"
                >
                    Mostrar Mais
                </Button> -->
            </div>
            <div class="flex flex-col w-full items-center mt-8">
                <a
                    href="/login"
                    class="w-full flex justify-center items-center"
                >
                    <Button
                        type="button"
                        :hasBackground="true"
                        color="lightSky"
                        size="1/2"
                        >Entrar</Button
                    >
                </a>

                <a href="/" class="w-full flex justify-center items-center">
                    <Button
                        :hasBackground="false"
                        type="button"
                        color="red"
                        size="1/2"
                        >Voltar</Button
                    >
                </a>
            </div>
        </div>
    </div>
</template>
