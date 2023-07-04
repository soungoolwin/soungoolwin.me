<template>
    <div class="toflexSignUp">
        <div class="lg:w-[800px] md:w-[500px] w-[300px] mx-auto">
            <div class="signupcard">
                <form @submit.prevent="Signup">
                    <div>
                        <label
                            class="block text-gray-300 font-bold mb-2"
                            for="Email"
                        >
                            Email
                        </label>
                        <input
                            class="signupemail_usename_pass"
                            name="email"
                            v-model="email"
                            id="email"
                            type="email"
                            placeholder="Email"
                        />
                    </div>
                    <div>
                        <label
                            class="block text-gray-300 font-bold mb-2"
                            for="Username"
                        >
                            Username
                        </label>
                        <input
                            class="signupemail_usename_pass"
                            v-model="username"
                            name="username"
                            id="username"
                            type="text"
                            placeholder="Username"
                        />
                    </div>
                    <div class="mt-4">
                        <label
                            class="block text-gray-300 font-bold mb-2"
                            for="password"
                        >
                            Password
                        </label>
                        <input
                            class="signupemail_usename_pass"
                            id="password"
                            v-model="password"
                            name="password"
                            type="password"
                            placeholder="Password"
                        />
                    </div>
                    <div class="mt-4">
                        <label
                            class="block text-gray-300 font-bold mb-2"
                            for="comfirmpassword"
                        >
                            Comfirm Password
                        </label>
                        <input
                            class="signupemail_usename_pass"
                            id="comfirmpassword"
                            v-model="password_confirmation"
                            type="password"
                            placeholder="Comfirm Password"
                            name="password_confirmation"
                        />
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
                    <router-link :to="{ name: 'login' }">Login?</router-link>
                </p>
            </div>
        </div>
    </div>
</template>

<script>
import { ref } from "vue";
import axios from "../js/axios";
import { useRouter } from "vue-router";
import { useEventBus } from "../js/eventBus";
export default {
    setup() {
        let router = useRouter();
        const eventBus = useEventBus();
        let email = ref("");
        let username = ref("");
        let password = ref("");
        let password_confirmation = ref("");
        let Signup = async () => {
            try {
                const response = await axios.post("/api/signup", {
                    username: username.value,
                    email: email.value,
                    password: password.value,
                    password_confirmation: password_confirmation.value,
                });
                if (response.status === 200) {
                    router.push("/login").then(() => {
                        eventBus.emit(
                            "flash-message",
                            "Check your email to verify"
                        );
                    });
                } else {
                    errors.value = data.message;
                    throw new Error(errors.value);
                }
            } catch (error) {
                console.log(error);
            }
        };
        return {
            Signup,
            email,
            username,
            password,
            password_confirmation,
        };
    },
};
</script>

<style></style>
