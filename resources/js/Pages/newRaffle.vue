<script setup>
    import { ref } from "vue"

    import { Button, CSRF, Input } from "../Components";
    import { PlusIcon, MinusIcon } from "@heroicons/vue/20/solid";

    const awards = ref([''])
</script>

<template>
    <div class="min-h-screen w-full flex justify-center bg-slate-100">
        <div
            class="flex flex-col max-w-3xl items-center md:justify-center p-6 flex-1 md:p-0"
        >
            <img
                src="/logoEtec.jpg"
                alt="Logo da Etec da Zona Leste"
                class="h-24 rounded-xl mb-10"
            />

            <div
                class="flex w-full justify-center items-center"
            >
                <h1 class="uppercase text-4xl sm:text-5xl font-bold mb-10 text-sky-600">Nova rifa</h1>
            </div>

            <form
                action="/user"
                method="POST"
                class="flex flex-col w-full h-full md:h-auto gap-y-6 justify-between md:justify-start"
            >
                <CSRF />
                <div
                    class="flex flex-col gap-y-6"
                >
                    <Input 
                        labeltext="Título"
                        name="title"
                        type="text"
                        required
                    />
                    <Input 
                        labeltext="Descrição"
                        name="decription"
                        type="text"
                    />
                    <Input 
                        labeltext="Data de conclusão"
                        name="conclusionDate"
                        type="text"
                        required
                    />
                    <Input 
                        labeltext="Valor"
                        name="price"
                        type="number"
                        required
                    />
                    <Input 
                        labeltext="Nº de talões"
                        name="numberOfReceipts"
                        type="number"
                        required
                    />
                    <Input
                        labeltext="Nº de rifas p/ talão"
                        name="numberOfRafflesByReceipts"
                        type="number"
                        required
                    />
                    <div
                        v-for="(award, index) in awards"
                        :key="index"
                        class="flex w-full gap-x-2 items-center"
                    >
                        <Input
                            :labeltext="`prêmio - ${index+1}º ganhador`"
                            name="numberOfRafflesByReceipts"
                            type="text"
                            :value="award"
                            @change="text => awards[index] = text.target.value.toString()"
                            required
                        />
                        <button
                            type="button"
                            @click="() => awards.push('')"
                            class="flex w-7 h-7 justify-center items-center p-0.5 rounded bg-sky-300 text-sky-600 hover:bg-sky-400"
                        >
                            <PlusIcon class="w-full"/>
                        </button>
                        <button
                            v-if="index > 0"
                            type="button"
                            @click="() => awards = awards.slice(0,index).concat(awards.slice(index+1))"
                            class="flex w-7 h-7 justify-center items-center p-0.5 rounded bg-red-300 text-red-600 hover:bg-red-400"
                        >
                            <MinusIcon class="w-full"/>
                        </button>

                    </div>
                    
                </div>
                <div
                    class="flex flex-col gap-y-6"
                >
                    <Button type="submit" :hasBackground="true" color="lightSky">Criar</Button>
                    <Button type="submit" :hasBackground="false" color="red">Cancelar</Button>
                </div>
            </form>
        </div>
    </div>
</template>