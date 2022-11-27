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
                    <Input labeltext="Nome" name="name" type="text" required />
                    <Input labeltext="RM" name="rm" type="number" required />
                    <Input
                        labeltext="Senha"
                        name="password"
                        type="password"
                        required
                    />
                    <Input
                        labeltext="Confirme a senha"
                        name="password_confirmation"
                        type="password"
                        required
                    />
                </div>

                <div
                    class="flex flex-col gap-y-6"
                >
                    <Button type="submit" :hasBackground="true" color="sky" @click="handleSubmit">Cadastrar</Button>
                    <Button type="submit" :hasBackground="false" color="sky" @click="handleSubmit">Entrar</Button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
async function handleSubmit(e) {
    e.preventDefault();

    try {
        const res = await axios.post("/user", {
            name: "Test",
            password: "123",
            password_confirmation: "1234",
        });
    } catch (error) {
        if (axios.isAxiosError(error)) {
            console.log(error.response.data.error);
        }
    }
}
</script>
