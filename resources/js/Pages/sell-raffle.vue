<script setup>
    import { ref } from "vue"

    import { Input, Button, InputList } from "../Components"

    const option = ref(true)
    const raffles = ref([""])
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
                <h1 class="uppercase text-4xl sm:text-5xl font-bold mb-10 text-sky-600">Nova rifa</h1>
            </div>

            <form
                class="flex flex-col w-full h-full justify-between"
            >
                <div 
                    class="flex flex-col w-full gap-y-6"
                >
                    <Input
                        labeltext="Nome Completo"
                    />
                    <Input
                        labeltext="Celular"
                    />

                    <div
                        class="flex flex-col gap-y-6"
                    >
                        <div
                            class="flex gap-x-5"
                        >
                            <input type="radio" 
                                @click="() => {
                                    option = true
                                    raffles = ['']
                                }"
                                :checked="option" class="h-16"/>
                            <div
                               :class="`flex flex-col ${!option && 'grayscale'}`"
                            >
                                <p class="font-bold text-sky-600">N Talão(ões)</p>
                                <div
                                    class="flex justify-center items-end gap-x-3"
                                >
                                    <Input :disabled="!option"/> <p class="font-bold text-sky-600">AO</p> <Input :disabled="!option"/>
                                </div>
                            </div>
                        </div>
                        <div
                            class="flex w-full gap-x-5"
                        >
                            <input type="radio" @click="() => option = false" :checked="!option" class="h-16"/>
                            <div
                               :class="`flex flex-col w-full ${option && 'grayscale'} gap-y-3`"
                            >
                                <InputList :array="raffles" :disabled="option"/>
                            </div>
                        </div>
                    </div>

                    <Input
                        labeltext="Data de compra"
                    />
                    <Input
                        labeltext="Rm do vendedor"
                    />
                </div>
                <div
                    class="flex flex-col w-full"
                >
                    <Button :hasBackground="true" color="lightSky" size="auto">Vender</Button>
                    <Button :hasBackground="false" color="red" size="auto">Cancelar</Button>
                </div>
            </form>
        </div>
    </div>
</template>