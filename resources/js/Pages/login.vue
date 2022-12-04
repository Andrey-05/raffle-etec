<script setup>
import { Button, CSRF, Input } from "../Components";
</script>

<template>
    <div class="min-h-screen w-full flex justify-center bg-slate-100">
        <div
            class="flex flex-col max-w-xl items-center md:justify-center p-6 flex-1 md:p-0"
        >
            <img
                src="/logoEtec.jpg"
                alt="Logo da Etec da Zona Leste"
                class="h-24 rounded-xl mb-10"
            />

            <form
                action="/user"
                method="POST"
                class="flex flex-col w-full h-full md:h-auto gap-y-6 justify-between md:justify-start"
            >
                <CSRF />
                <div
                    class="flex flex-col gap-y-6"
                >
                    <Input labeltext="RM" name="rm" type="number" required />
                    <Input
                        labeltext="Senha"
                        name="password"
                        type="password"
                        required
                    />
                </div>

                <div
                    class="flex flex-col gap-y-6"
                >
                    <Button type="submit" :hasBackground="true" color="sky" @click="handleSubmit">Entrar</Button>
                    <Button type="submit" :hasBackground="false" color="sky" @click="handleSubmit">Cadastrar-se</Button>
                </div>
            </form>
        </div>
    </div>
</template>