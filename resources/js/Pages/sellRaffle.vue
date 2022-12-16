<script setup>
import { useForm, usePage } from "@inertiajs/inertia-vue3";
import { ref } from "vue";

import { Input, Button, InputList, LogoEtec } from "../Components";
import { PlusIcon, MinusIcon } from "@heroicons/vue/20/solid";
import axios from "axios";

import { getCurrentInstance } from "@vue/runtime-core";

const globals = getCurrentInstance().appContext.config.globalProperties;

const raffle = usePage().props.value.raffle;

const form = useForm({
    buyer_name: "",
    buyer_phone: "",
    rm: "",
    purchase_date: "",

    ticket_numbers: [""],
});

function addNumber() {
    console.log(form.ticket_numbers);
    const lastValue = form.ticket_numbers[form.ticket_numbers.length - 1];

    if (
        lastValue !== "" &&
        parseInt(lastValue) + 1 <=
            raffle.ticket_book_number * raffle.ticket_number_by_book
    ) {
        form.ticket_numbers[form.ticket_numbers.length] = (
            parseInt(lastValue) + 1
        ).toString();
    }
}

function removeNumber(indexToRemove) {
    console.log(form.ticket_numbers);

    form.ticket_numbers = form.ticket_numbers.filter((prize, index) => {
        return index !== indexToRemove;
    });
}

async function handleSubmit() {
    try {
        const res = await axios.post("/api/ticket", {
            raffle_id: raffle.id,
            rm: form.rm,
            buyer_name: form.buyer_name,
            buyer_phone: form.buyer_phone,
            ticket_numbers: form.ticket_numbers,
            purchase_date: form.purchase_date,
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
            class="flex flex-col max-w-5xl items-center md:justify-center p-6 flex-1 md:p-0"
        >
            <LogoEtec />

            <div class="flex w-full justify-center items-center">
                <h1
                    class="uppercase text-4xl sm:text-5xl font-bold mb-10 text-sky-600"
                >
                    vender rifa
                </h1>
            </div>

            <form
                class="flex flex-col w-full h-full justify-between"
                @submit.prevent="handleSubmit"
            >
                <div class="flex flex-col w-full gap-y-6">
                    <Input
                        labeltext="Nome do comprador"
                        v-model="form.buyer_name"
                        required
                    />
                    <Input
                        labeltext="Celular"
                        v-model="form.buyer_phone"
                        required
                    />
                    <Input
                        labeltext="Data de compra"
                        type="date"
                        v-model="form.purchase_date"
                        required
                    />
                    <Input labeltext="Rm do vendedor" v-model="form.rm" />

                    <div class="flex flex-col gap-y-6">
                        <div class="flex w-full gap-x-5">
                            <div :class="`flex flex-col w-full gap-y-3`">
                                <div
                                    v-for="(
                                        number, index
                                    ) in form.ticket_numbers"
                                    :key="index"
                                    class="flex w-full gap-x-2 items-center"
                                >
                                    <Input
                                        :labeltext="`Nº Rifa`"
                                        type="number"
                                        min="1"
                                        :max="
                                            raffle.ticket_book_number *
                                            raffle.ticket_number_by_book
                                        "
                                        v-model="form.ticket_numbers[index]"
                                        required
                                    />
                                    <button
                                        type="button"
                                        class="flex w-7 h-7 justify-center items-center p-0.5 rounded bg-sky-300 text-sky-600 hover:bg-sky-400"
                                        @click="addNumber"
                                    >
                                        <PlusIcon class="w-full" />
                                    </button>
                                    <button
                                        v-if="index > 0"
                                        type="button"
                                        class="flex w-7 h-7 justify-center items-center p-0.5 rounded bg-red-300 text-red-600 hover:bg-red-400"
                                        @click="removeNumber(index)"
                                    >
                                        <MinusIcon class="w-full" />
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col w-full">
                    <Button
                        type="submit"
                        :hasBackground="true"
                        color="lightSky"
                        size="auto"
                        >Vender</Button
                    >
                    <a href="/dashboard">
                        <Button
                            type="button"
                            :hasBackground="false"
                            color="red"
                            size="w-full"
                            >Cancelar</Button
                        >
                    </a>
                </div>
            </form>
        </div>
    </div>
</template>
