<script setup>

  import {ref} from "vue"

  import { Button } from "../Components"

  import { TrophyIcon } from "@heroicons/vue/24/solid"

  const raffles = ref([{
    id: 1,
    title: "Festa junina"
  },{
    id: 2,
    title: "Teste2"
  },{
    id: 3,
    title: "Teste3"
  },{
    id: 4,
    title: "Teste4"
  },])
</script>

<template>
    <div class="min-h-screen w-full flex justify-center bg-slate-100">
        <div
            class="flex flex-col max-w-2xl items-center justify-between p-6 flex-1"
        >
            <div
                class="flex flex-col items-center justify-center"
            >
                <img
                    src="/logoEtec.jpg"
                    alt="Logo da Etec da Zona Leste"
                    class="h-24 w-24 rounded-xl mb-6"
                />
                <h1 class="text-sky-600 text-5xl font-bold">RIFAS ETEC</h1>
            </div>
            <div
                class="flex flex-col w-full gap-y-2"
            >
                <div
                    v-for="raffle in raffles" v-bind:key="raffle.id"
                    class="flex w-full justify-between items-center"
                >
                    <p class="uppercase font-bold text-neutral-700">{{raffle.title}}</p>
                    <Button size="auto">
                        <div class="flex flex-row text-sky-600 gap-x-2">
                            <p>Ranking</p>
                            <TrophyIcon class="w-6"/>
                        </div>
                    </Button>
                </div>
            </div>
            <div 
                class="flex flex-col w-full items-center"
            >
                <Button :hasBackground="true" color="lightSky" size="1/2">Entrar</Button>
                <Button :hasBackground="false" color="sky" size="1/2">Cadastra-se</Button>
            </div>
        </div>
    </div>
</template>