<script setup>
import { Button, Input } from "../Components";
</script>

<template>
    <div class="min-h-screen w-full flex justify-center bg-slate-100">
        <div
            class="flex flex-col max-w-xl items-center md:justify-center p-6 flex-1 md:p-0"
        >
            <img
                src="/logoEtec.jpg"
                alt="Logo da Etec da Zona Leste"
                class="h-24 rounded-xl mb-6"
            />

            <h1 class="uppercase text-2xl font-bold mb-8">
                Gerenciamento de Rifas
            </h1>

            <form action="" class="flex flex-col w-full gap-y-6">
                <Input labeltext="Nome" type="text" required />
                <Input labeltext="RM" type="number" required />
                <Input labeltext="Senha" type="password" required />
                <Input labeltext="Confirme a senha" type="password" required />

                <Button>Cadastrar</Button>
            </form>
        </div>
    </div>
</template>
