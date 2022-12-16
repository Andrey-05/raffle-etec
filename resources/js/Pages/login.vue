<script setup>
import { Button, CSRF, Input, LogoEtec } from "../Components";
import { useForm } from "@inertiajs/inertia-vue3";
import axios from "axios";

import { getCurrentInstance } from "@vue/runtime-core";

const globals = getCurrentInstance().appContext.config.globalProperties;

const form = useForm({
    rm: null,
    password: "",
});

async function handleSubmit() {
    try {
        const res = await axios.post("/api/login", form.data());

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
                </div>

                <div class="flex flex-col gap-y-6">
                    <Button
                        type="submit"
                        :hasBackground="true"
                        color="sky"
                        @click="handleSubmit"
                        >Entrar</Button
                    >
                    <a href="/register">
                        <Button
                            type="button"
                            :hasBackground="false"
                            color="sky"
                            @click="handleSubmit"
                            >Cadastrar-se</Button
                        >
                    </a>
                    <!-- <Button type="button" @click=""
                        >teste</Button
                    > -->
                </div>
            </form>
        </div>
    </div>
</template>
