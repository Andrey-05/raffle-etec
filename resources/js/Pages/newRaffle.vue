<script setup>
import { ref } from "vue";

import { Button, CSRF, Input, LogoEtec } from "../Components";
import { PlusIcon, MinusIcon } from "@heroicons/vue/20/solid";
import { useForm, usePage } from "@inertiajs/inertia-vue3";
import axios from "axios";

import { getCurrentInstance } from "@vue/runtime-core";

const globals = getCurrentInstance().appContext.config.globalProperties;

const awards = ref([""]);

const form = useForm({
    title: "",
    description: "",
    date: null,
    price: null,
    ticket_book_number: null,
    ticket_number_by_book: null,

    prizes: [""],
});

const loggedManager = usePage().props.value.manager;

function addPrize() {
    form.prizes[form.prizes.length] = "";
}

function removePrize(indexToRemove) {
    form.prizes = form.prizes.filter((prize, index) => {
        return index !== indexToRemove;
    });
}
async function handleSubmit() {
    try {
        const res = await axios.post("/api/raffle", {
            title: form.title,
            description: form.description,
            date: form.date,
            price: form.price,
            manager_id: loggedManager.id,
            ticket_book_number: form.ticket_book_number,
            ticket_number_by_book: form.ticket_number_by_book,
            prizes: form.prizes.map((prize, index) => {
                return {
                    description: prize,
                    position: index + 1,
                };
            }),
        });

        window.location.pathname = "/dashboard";
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
            class="flex flex-col max-w-3xl items-center md:justify-center p-6 flex-1 md:p-0"
        >
            <LogoEtec />

            <div class="flex w-full justify-center items-center">
                <h1
                    class="uppercase text-4xl sm:text-5xl font-bold mb-10 text-sky-600"
                >
                    Nova rifa
                </h1>
            </div>

            <form
                class="flex flex-col w-full h-full md:h-auto gap-y-6 justify-between md:justify-start"
                @submit.prevent="handleSubmit"
            >
                <CSRF />
                <div class="flex flex-col gap-y-6">
                    <Input
                        labeltext="Título"
                        name="title"
                        type="text"
                        v-model="form.title"
                        required
                    />
                    <Input
                        labeltext="Descrição"
                        name="decription"
                        type="text"
                        v-model="form.description"
                        required
                    />
                    <Input
                        labeltext="Data de conclusão"
                        name="conclusionDate"
                        type="date"
                        v-model="form.date"
                        required
                    />
                    <Input
                        labeltext="Valor"
                        name="price"
                        type="number"
                        step="0.01"
                        v-model="form.price"
                        required
                    />
                    <Input
                        labeltext="Nº de talões"
                        name="numberOfReceipts"
                        type="number"
                        v-model="form.ticket_book_number"
                        required
                    />
                    <Input
                        labeltext="Nº de rifas por talão"
                        name="numberOfRafflesByReceipts"
                        type="number"
                        v-model="form.ticket_number_by_book"
                        required
                    />
                    <div
                        v-for="(prize, index) in form.prizes"
                        :key="index"
                        class="flex w-full gap-x-2 items-center"
                    >
                        <Input
                            :labeltext="`prêmio - ${index + 1}º ganhador`"
                            type="text"
                            v-model="form.prizes[index]"
                            required
                        />
                        <button
                            type="button"
                            class="flex w-7 h-7 justify-center items-center p-0.5 rounded bg-sky-300 text-sky-600 hover:bg-sky-400"
                            @click="addPrize"
                        >
                            <PlusIcon class="w-full" />
                        </button>
                        <button
                            v-if="index > 0"
                            type="button"
                            class="flex w-7 h-7 justify-center items-center p-0.5 rounded bg-red-300 text-red-600 hover:bg-red-400"
                            @click="removePrize(index)"
                        >
                            <MinusIcon class="w-full" />
                        </button>
                    </div>
                </div>
                <div class="flex flex-col gap-y-6">
                    <Button type="submit" :hasBackground="true" color="lightSky"
                        >Criar</Button
                    >
                    <a href="/dashboard">
                        <Button type="button" :hasBackground="false" color="red"
                            >Cancelar</Button
                        >
                    </a>
                </div>
            </form>
        </div>
    </div>
</template>
