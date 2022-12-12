<script setup>
import { Button, CSRF, Input } from "../Components";
import { Inertia } from "@inertiajs/inertia";
import { useForm } from "@inertiajs/inertia-vue3";
import axios from "axios";

const form = useForm({
    name: "",
    rm: null,
    password: "",
    password_confirmation: "",
});

async function handleSubmit() {
    try {
        if (form.password !== form.password_confirmation) {
            throw new Error("Senhas não correspondem");
        }

        const res = await axios.post("/api/user", form.data());
    } catch (error) {
        console.error(error.message);
    }
}
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
                class="flex flex-col w-full h-full md:h-auto gap-y-6 justify-between md:justify-start"
                @submit.prevent="handleSubmit"
            >
                <CSRF />
                <div class="flex flex-col gap-y-6">
                    <Input
                        labeltext="Nome"
                        name="name"
                        type="text"
                        v-model="form.name"
                        required
                    />
                    <Input
                        labeltext="RM"
                        name="rm"
                        type="number"
                        v-model="form.rm"
                        required
                    />
                    <Input
                        labeltext="Senha"
                        name="password"
                        type="password"
                        v-model="form.password"
                        required
                    />
                    <Input
                        labeltext="Confirme a senha"
                        name="password_confirmation"
                        type="password"
                        v-model="form.password_confirmation"
                        required
                    />
                </div>

                <div class="flex flex-col gap-y-6">
                    <Button type="submit" :hasBackground="true" color="sky"
                        >Cadastrar</Button
                    >
                    <Button type="button" :hasBackground="false" color="sky"
                        >Entrar</Button
                    >
                </div>
            </form>
        </div>
    </div>
</template>
