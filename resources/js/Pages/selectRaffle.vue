<script setup>
import { ref } from "vue";

import {
    PencilIcon,
    ShoppingCartIcon,
    PlusIcon,
    MagnifyingGlassIcon,
} from "@heroicons/vue/24/outline";
import { Button, InfoRaffle, RaffleList, LogoEtec } from "../Components";
import { usePage } from "@inertiajs/inertia-vue3";

const raffle = usePage().props.value.raffle;
const prizes = usePage().props.value.prizes;
const purchasedTickets = usePage().props.value.purchasedTickets;

let prizesString = "";

prizes.map((prize) => {
    prizesString += `${prize.position}º - ${prize.description}\n`;
});
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
                    {{ raffle.title }}
                </h1>
            </div>
            <div class="flex gap-x-2 items-center mb-10">
                <p class="text-neutral-500">
                    {{ raffle.description }}
                </p>
                <!-- <Button :hasBackground="false" size="auto">
                    <PencilIcon class="w-5 text-neutral-500" />
                </Button> -->
            </div>
            <div class="w-full flex border-b-2 border-neutral-300 py-8">
                <div class="flex w-2/3">
                    <div class="flex flex-col w-full gap-y-5">
                        <InfoRaffle
                            titleText="Data de conclusão"
                            :text="
                                new Date(raffle.date).toLocaleDateString(
                                    'pt-br',
                                    {
                                        timeZone: 'UTC',
                                    }
                                )
                            "
                        />
                        <InfoRaffle
                            titleText="nº de talões"
                            :text="raffle.ticket_book_number.toString()"
                        />
                    </div>
                    <div class="flex flex-col w-full gap-y-5">
                        <InfoRaffle
                            titleText="valor"
                            :text="`R$ ${raffle.price}`"
                        />
                        <InfoRaffle
                            titleText="nº de rifas"
                            :text="raffle.ticket_number_by_book.toString()"
                        />
                    </div>
                </div>
                <div class="flex flex-col w-1/3">
                    <InfoRaffle titleText="Prêmio" :text="prizesString" />
                </div>
            </div>
            <div class="flex w-full justify-between mt-4">
                <a :href="'/vender-rifa/' + raffle.id">
                    <Button :hasBackground="true" color="lightSky" size="auto">
                        Vender Rifa
                        <ShoppingCartIcon class="h-6" />
                        <PlusIcon class="h-6" />
                    </Button>
                </a>
                <!-- <div
                    class="flex justify-center items-center h-full border-2 rounded-lg px-2 gap-x-2"
                >
                    <MagnifyingGlassIcon class="h-6 text-neutral-400" />
                    <input
                        placeholder="Buscar"
                        class="h-10 bg-transparent outline-none placeholder:text-neutral-400"
                    />
                </div> -->
            </div>
            <div class="w-full mt-4">
                <div
                    class="flex w-full bg-sky-600 items-center justify-center text-white font-bold h-12 rounded-t-lg"
                >
                    <p class="w-1/12 text-center">N Talão</p>
                    <p class="w-1/12 text-center">N Rifa</p>
                    <p class="w-4/12">Nome Completo</p>
                    <p class="w-2/12 text-center">RM vendedor</p>
                    <p class="w-2/12 text-center">Celular</p>
                    <p class="w-2/12 text-center">Data Compra</p>
                </div>
                <RaffleList
                    v-for="(ticket, index) in purchasedTickets"
                    :key="ticket.id"
                    :info="{
                        numBead: Math.ceil(
                            parseInt(ticket.ticket_number) /
                                parseInt(raffle.ticket_number_by_book)
                        ),
                        numRaffle: ticket.ticket_number,
                        name: ticket.buyer_name,
                        sellerRm: ticket.seller.rm,
                        numPhone: ticket.buyer_phone,
                        purchaseDate: new Date(
                            ticket.purchase_date
                        ).toLocaleDateString('pt-br', {
                            timeZone: 'UTC',
                        }),
                    }"
                    :index="index"
                />
            </div>
        </div>
    </div>
</template>
