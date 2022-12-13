<script setup>
    import { ref } from "vue"

    import { PencilIcon, ShoppingCartIcon, PlusIcon, MagnifyingGlassIcon } from '@heroicons/vue/24/outline'
    import { Button, InfoRaffle, RaffleList} from "../Components"

    const raffles = ref([
        {
            numBead: 1,
            numRaffle: 3,
            name: "Andrey Lucas Rodrigues",
            sellerRm: "123123",
            numPhone: "(11)91234-1234",
            purchaseDate: "05/04/2005"
        },{
            numBead: 1,
            numRaffle: 3,
            name: "Andrey Lucas Rodrigues",
            sellerRm: "123123",
            numPhone: "(11)91234-1234",
            purchaseDate: "05/04/2005"
        },{
            numBead: 1,
            numRaffle: 3,
            name: "Andrey Lucas Rodrigues",
            sellerRm: "123123",
            numPhone: "(11)91234-1234",
            purchaseDate: "05/04/2005"
        },{
            numBead: 1,
            numRaffle: 3,
            name: "Andrey Lucas Rodrigues",
            sellerRm: "123123",
            numPhone: "(11)91234-1234",
            purchaseDate: "05/04/2005"
        },{
            numBead: 1,
            numRaffle: 3,
            name: "Andrey Lucas Rodrigues",
            sellerRm: "123123",
            numPhone: "(11)91234-1234",
            purchaseDate: "05/04/2005"
        },
    ])
</script>

<template>
    <div class="min-h-screen w-full flex justify-center bg-slate-100">
        <div
            class="flex flex-col max-w-5xl items-center md:justify-center p-6 flex-1 md:p-0"
        >
            <img
                src="/logoEtec.jpg"
                alt="Logo da Etec da Zona Leste"
                class="h-24 rounded-xl mb-10"
            />

            <div
                class="flex w-full justify-center items-center"
            >
                <h1 class="uppercase text-4xl sm:text-5xl font-bold mb-10 text-sky-600">nome da rifa</h1>
            </div>
            <div
                class="flex gap-x-2 items-center mb-10"
            >
                <p class="text-neutral-500">Descrição da rifa ficar aqui aparentemente.</p>
                <Button :hasBackground="false" size="auto">
                    <PencilIcon class="w-5 text-neutral-500"/>
                </Button>
            </div>
            <div
                class="w-full flex border-b-2 border-neutral-300 py-8"
            >
                <div
                    class="flex  w-2/3"
                >
                    <div
                        class="flex flex-col w-full gap-y-5"
                    >
                        <InfoRaffle
                            titleText="Data de conclusão"
                            text="Iphone XR"
                        />
                        <InfoRaffle
                            titleText="nº de talões"
                            text="Iphone XR"
                        />
                    </div>
                    <div
                        class="flex flex-col w-full gap-y-5"
                    >
                        <InfoRaffle
                            titleText="valor"
                            text="Iphone XR"
                        />
                        <InfoRaffle
                            titleText="nº de rifas"
                            text="Iphone XR"
                        />
                    </div>
                </div>
                <div
                    class="flex flex-col w-1/3"
                >
                    <InfoRaffle
                        titleText="Prêmio"
                        text="Iphone XR"
                    />
                </div>
            </div>
            <div
                class="flex w-full justify-between mt-4"
            >
                <Button :hasBackground="true" color="lightSky" size="auto">
                    Vender Rifa
                    <ShoppingCartIcon class="h-6"/>
                    <PlusIcon class="h-6"/>
                </Button>
                <div
                    class="flex justify-center items-center h-full border-2 rounded-lg px-2 gap-x-2"
                >
                    <MagnifyingGlassIcon class="h-6 text-neutral-400"/>
                    <input placeholder="Buscar" class="h-10 bg-transparent outline-none placeholder:text-neutral-400"/>
                </div>
            </div>
            <div
                class="w-full mt-4"
            >
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
                <RaffleList v-for="(info, index) in raffles" :key="info.id" :info="info" :index="index"/>
            </div>
        </div>
    </div>
</template>