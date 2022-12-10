<script setup>
    import { ref } from 'vue'

    import { Button, DashboardRow } from "../Components"

    const raffles = ref([
        {
            id: 1,
            text: 'Festa junina',
            date: '10/09/2023'
        },
        {
            id: 2,
            text: 'Festa junina',
            date: '10/09/2023'
        },
        {
            id: 3,
            text: 'Semana Paulo Freire',
            date: '10/12/2023'
        }
    ])
</script>

<template>
    <div class="min-h-screen w-full flex justify-center bg-slate-100">
        <div
            class="flex flex-col max-w-3xl items-center justify-between p-6 flex-1"
        >
            <div
                class="flex flex-col w-full items-center"
            >
                <img
                    src="/logoEtec.jpg"
                    alt="Logo da Etec da Zona Leste"
                    class="h-24 rounded-xl mb-10"
                />
                <div
                    class="flex w-full justify-center items-center"
                >
                    <h1 class="uppercase text-4xl sm:text-5xl font-bold mb-10 text-sky-600">rifas etec</h1>
                </div>
                <div
                    class="w-full mb-8"
                >
                    <DashboardRow v-for="item in raffles" :key="item.id" :item="item"/>
                </div>
            </div>
            <div
                class="flex flex-col w-full md:w-1/2 gap-y-2"
            >
                <Button :hasBackground="true" color="lightSky" size="full">Nova rifa</Button>
                <Button :hasBackground="false" color="red" size="full">Sair da Conta</Button>
            </div>
        </div>
    </div>
</template>