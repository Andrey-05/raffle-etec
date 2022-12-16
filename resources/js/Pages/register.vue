<script setup>
import { Button, CSRF, Input, LogoEtec } from "../Components";
import { useForm } from "@inertiajs/inertia-vue3";
import axios from "axios";

import { getCurrentInstance } from "@vue/runtime-core";

const globals = getCurrentInstance().appContext.config.globalProperties;

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

        const res = await axios.post("/api/register", form.data());

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
            class="flex flex-col max-w-xl items-center md:justify-center p-6 flex-1 md:p-0"
        >
            <LogoEtec />

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
                    <a href="/login">
                        <Button type="button" :hasBackground="false" color="sky"
                            >Entrar</Button
                        >
                    </a>
                </div>
            </form>
        </div>
    </div>
</template>
