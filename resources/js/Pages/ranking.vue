<script setup>
  import { ref } from "vue"

  import { Button, RankingItem } from "../Components"
  import { TrophyIcon } from "@heroicons/vue/24/solid"

  const raffles = ref([{
    id: 1,
    name: "Andrey Lucas Rodrigues",
    number: 320
  },{
    id: 2,
    name: "Kayky de Sousa",
    number: 320
  },{
    id: 3,
    name: "Gustavo Santos Siqueira",
    number: 320
  },{
    id: 4,
    name: "Bruno dos Santos Barbosa",
    number: 320
  },{
    id: 5,
    name: "Cauê Henrique Ferrato",
    number: 320
  },{
    id: 6,
    name: "Mario Junior Paixão",
    number: 320
  },{
    id: 7,
    name: "Gustavo dos Anjos Nogueira",
    number: 320
  },{
    id: 8,
    name: "Bianca Carolina Barbosa Cardoso",
    number: 320
  },{
    id: 9,
    name: "Vinicus Altieri",
    number: 320
  },{
    id: 10,
    name: "Julia Campos",
    number: 320
  },])
</script>

<template>
    <div class="min-h-screen w-full flex justify-center bg-slate-100">
        <div
            class="flex flex-col max-w-xl items-center justify-between p-6 flex-1"
        >
            <div
                class="flex flex-col w-full items-center justify-center"
            >
                <TrophyIcon class="h-20 text-yellow-500"/>
                <h1 class="text-sky-600 text-5xl font-bold">Titulo da Rifa</h1>
            </div>
            <div
                class="flex flex-col w-full h-full mt-20 gap-y-6"
            >
                <RankingItem v-for="(raffle, index) in raffles" :key="raffle.id" :item="raffle" :index="index"/>
                <Button :hasBackground="false" color="sky" size="full" v-if="raffles.length > 10">
                    Mostrar Mais
                </Button>
            </div>
            <div 
                class="flex flex-col w-full items-center"
            >
                <Button :hasBackground="true" color="lightSky" size="1/2">Entrar</Button>
                <Button :hasBackground="false" color="red" size="1/2">Voltar</Button>
            </div>
        </div>
    </div>
</template>