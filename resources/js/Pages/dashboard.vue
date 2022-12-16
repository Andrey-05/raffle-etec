<script setup>
import { usePage } from "@inertiajs/inertia-vue3";
import axios from "axios";
import { ref } from "vue";

import { Button, DashboardRow, LogoEtec } from "../Components";

import { getCurrentInstance } from "@vue/runtime-core";

const globals = getCurrentInstance().appContext.config.globalProperties;

const raffles = usePage().props.value.raffles.map((raffle, index) => {
    return {
        id: raffle.id,
        text: raffle.title,
        date: new Date(raffle.date).toLocaleDateString("pt-br", {
            timeZone: "UTC",
        }),
    };
});

async function handleDeleteRaffle(id) {
    try {
        const res = await axios.delete(`/api/raffle/${id}`);

        window.location.reload();
    } catch (error) {
        if (axios.isAxiosError(error)) {
            globals.$toast.error(error.response.data.error, {
                position: "top-right",
            });
        } else {
            globals.$toast.error(error.message, {
                position: "top-right",
            });
        }
    }
}
</script>

<template>
    <div class="min-h-screen w-full flex justify-center bg-slate-100">
        <div
            class="flex flex-col max-w-3xl items-center justify-between p-6 flex-1"
        >
            <div class="flex flex-col w-full items-center">
                <LogoEtec />
                <div class="flex w-full justify-center items-center">
                    <h1
                        class="uppercase text-4xl sm:text-5xl font-bold mb-10 text-sky-600"
                    >
                        rifas etec
                    </h1>
                </div>
                <div class="w-full mb-8">
                    <DashboardRow
                        v-for="item in raffles"
                        :key="item.id"
                        :item="item"
                        :onDeleteRaffle="handleDeleteRaffle"
                    />
                </div>
            </div>
            <div class="flex flex-col w-full md:w-1/2 gap-y-2">
                <a href="/dashboard/criar">
                    <Button :hasBackground="true" color="lightSky" size="full"
                        >Nova rifa</Button
                    >
                </a>
                <a href="/logout">
                    <Button :hasBackground="false" color="red" size="full"
                        >Sair da Conta</Button
                    >
                </a>
            </div>
        </div>
    </div>
</template>
