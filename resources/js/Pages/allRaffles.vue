<script setup>
import { ref } from "vue";
import { usePage } from "@inertiajs/inertia-vue3";
import { Button, LogoEtec } from "../Components";
import { TrophyIcon } from "@heroicons/vue/24/solid";

const raffles = usePage().props.value.raffles;
</script>

<template>
    <div class="min-h-screen w-full flex justify-center bg-slate-100">
        <div
            class="flex flex-col max-w-2xl items-center justify-between p-6 flex-1"
        >
            <div class="flex flex-col items-center justify-center">
                <LogoEtec />
                <h1 class="text-sky-600 text-5xl font-bold">RIFAS ETEC</h1>
            </div>
            <div class="flex flex-col w-full gap-y-2">
                <template v-if="Object.keys(raffles).length">
                    <div
                        v-for="raffle in raffles"
                        v-bind:key="raffle.id"
                        class="flex w-full justify-between items-center"
                    >
                        <p class="uppercase font-bold text-neutral-700">
                            {{ raffle.title }}
                        </p>
                        <a :href="`/ranking/${raffle.id}`">
                            <Button size="auto">
                                <div class="flex flex-row text-sky-600 gap-x-2">
                                    <p>Ranking</p>
                                    <TrophyIcon class="w-6" />
                                </div>
                            </Button>
                        </a>
                    </div>
                </template>
                <div v-else class="flex w-full justify-center items-center">
                    <p class="text-gray-700 text-lg">
                        Ainda não há rifas criadas, volte mais tarde
                    </p>
                </div>
            </div>
            <div class="flex flex-col w-full items-center">
                <a href="/login" class="w-full flex justify-center">
                    <Button :hasBackground="true" color="lightSky" size="1/2"
                        >Entrar</Button
                    >
                </a>
                <a href="/register" class="w-full flex justify-center">
                    <Button :hasBackground="false" color="sky" size="1/2"
                        >Cadastrar-se</Button
                    >
                </a>
            </div>
        </div>
    </div>
</template>
