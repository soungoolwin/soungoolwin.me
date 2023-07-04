<template>
    <div v-if="flashMessage" class="flash-message">
        {{ flashMessage }}
    </div>
    <div class="toflexLogin">
        <div class="lg:w-[800px] md:w-[500px] w-[300px] mx-auto">
            <div class="logincard">
                <form @submit.prevent="submitForm">
                    <div>
                        <label
                            class="block text-gray-300 font-bold mb-2"
                            for="Email"
                        >
                            Email
                        </label>
                        <input
                            class="loginemail_pass"
                            name="email"
                            v-model="email"
                            id="email"
                            type="email"
                            placeholder="Email"
                        />

                        <div v-if="errors" class="bg-red-500 text-red p-2">
                            {{ errors }}
                        </div>
                    </div>
                    <div class="mt-4">
                        <label
                            class="block text-gray-300 font-bold mb-2"
                            for="password"
                        >
                        </label>
                        <input
                            class="loginemail_pass"
                            v-model="password"
                            name="password"
                            id="password"
                            type="password"
                            placeholder="Password"
                        />

                        <div v-if="errors" class="bg-red-500 text-red p-2">
                            {{ errors }}
                        </div>
                    </div>
                    <div class="mt-4">
                        <button
                            class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            type="submit"
                        >
                            Sign In
                        </button>
                    </div>
                </form>
                <p class="pt-5">
                    <router-link :to="{ name: 'signup' }"
                        >Create Account?</router-link
                    >
                </p>
            </div>
        </div>
    </div>
</template>

<script>
import { onMounted, ref } from "vue";
import { useRouter } from "vue-router";
import axios from "../js/axios";
import eventBus from "../js/eventBus";

export default {
    setup() {
        const router = useRouter();

        const csrfToken = ref("");

        let email = ref("");
        let password = ref("");
        let errors = ref("");
        let flashMessage = ref("");

        onMounted(() => {
            csrfToken.value = document.querySelector(
                'meta[name="csrf-token"]'
            ).content;
            eventBus.on("flash-message", (message) => {
                flashMessage.value = message;
            });
        });

        let submitForm = async () => {
            try {
                await axios.get("/sanctum/csrf-cookie");
                const response = await axios.post("/api/login", {
                    email: email.value,
                    password: password.value,
                });

                if (response.status === 200) {
                    let flashMessage = "Welcome " + response.data.user.username;

                    router.push("/").then(() => {
                        eventBus.emit("flash-message", flashMessage);
                    });
                } else {
                    errors.value = data.message;
                    throw new Error(errors.value);
                }
            } catch (error) {
                email.value = email.value;
                password.value = "";
                console.log(error);
            }
        };
        return {
            email,
            password,
            submitForm,
            errors,
            csrfToken,
            flashMessage,
        };
    },
};
</script>

<style></style>
