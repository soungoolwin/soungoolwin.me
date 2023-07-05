<template>
    <!-- hero section -->

    <main id="about-me">
        <div class="bg-[#313345]">
            <div class="toflexforhero">
                <section class="static">
                    <h1 class="Myname">
                        Soung <br />
                        Oo Lwin
                        <hr class="yellowLine" />
                    </h1>
                    <div class="socialsection">
                        <a href="https://github.com/soungoolwin"
                            ><i class="fa-brands fa-github socialmedia_logo"></i
                        ></a>
                        <a href="https://web.facebook.com/soung.lwin.75"
                            ><i
                                class="fa-brands fa-facebook socialmedia_logo"
                            ></i
                        ></a>
                        <a
                            href="https://www.linkedin.com/in/soung-oo-lwin-vito-126998224/"
                        >
                            <i
                                class="fa-brands fa-linkedin socialmedia_logo"
                            ></i
                        ></a>
                    </div>
                </section>
                <section class="static">
                    <nav class="bigscreennav">
                        <a href="#about-me" class="navlogo">About Me</a>
                        <a href="#media-library" class="navlogo"
                            >Media Library</a
                        >
                        <a href="#blogs" class="navlogo">Blogs</a>

                        <button
                            v-if="isLoggedIn"
                            class="navlogo"
                            @click="Logout()"
                        >
                            Logout
                        </button>

                        <router-link
                            v-if="!isLoggedIn"
                            :to="{ name: 'login' }"
                            class="navlogo"
                        >
                            Login
                        </router-link>
                    </nav>
                    <div class="relative md:top-[200px]">
                        <h1 class="font-light text-white text-[22px]">
                            ICT Student at Rangsit University and <br />
                            Junior Backend Developer
                        </h1>
                        <p class="my-3 text-[12px] text-gray-400">
                            A Programmer who enthusiast backend devloping,
                            software engineering, and software architech.
                        </p>
                        <h2 class="underline mt-8 text-yellow-400">
                            <a href="">My CV</a>
                        </h2>
                    </div>
                </section>
            </div>
        </div>
        <div v-if="showFlashMessage" class="flash-message">
            {{ flashMessage }}
        </div>

        <div class="bg-[#242734] pb-[29px]">
            <div class="toflexforabout">
                <section class="static">
                    <h3 class="titleforabout">Background</h3>
                    <p class="bodyforabout">
                        Tech and tech related enthusiast since chilhood.
                        Computer Science student at Computer University
                        Mandalay(2019-2020). Now studying ICT at Rangist
                        University.
                    </p>
                </section>
                <section class="static">
                    <h3 class="titleforabout">Skills</h3>
                    <p class="bodyforabout">
                        As I'm a web developer specialized in backend, I can
                        develope backend project with PHP, laravel and vuejs.
                    </p>
                </section>
            </div>
        </div>
    </main>
</template>

<script>
import { onMounted, onUnmounted, ref, watch } from "vue";
import axios from "../js/axios";
import eventBus from "../js/eventBus";
import { useRouter } from "vue-router";
export default {
    setup() {
        let router = useRouter();
        let isLoggedIn = ref(false);
        let flashMessage = ref("");
        let showFlashMessage = ref(false);

        let csrfToken = null;

        let setFlashMessage = (message) => {
            flashMessage.value = message;
            showFlashMessage.value = true;
            setTimeout(() => {
                showFlashMessage.value = false;
            }, 5000);
        };

        const checkLoginStatus = async () => {
            try {
                const response = await axios.get("/api/user");

                if (response.status === 200) {
                    isLoggedIn.value = true;

                    console.log("user is logged in");
                }
                if (response.status === 401) {
                    isLoggedIn.value = false;
                    console.log("user is not logged in yet");
                }
            } catch (error) {
                if (error.response && error.response.status === 401) {
                    isLoggedIn.value = false;
                    console.log("user is not logged in yet");
                } else {
                    console.error("Error checking login status:", error);
                }
            }
        };

        const Logout = async () => {
            const csrfToken = document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content");
            console.log(csrfToken);
            try {
                const response = await axios.post("/api/logout", null, {
                    headers: {
                        "X-CSRF-TOKEN": csrfToken,
                    },
                });
                let flashMessage = "Bye Bye " + response.data.username;

                isLoggedIn.value = false;
                setFlashMessage(flashMessage);
            } catch (error) {
                console.error("Logout error:", error);
            }
        };

        const handleFlashMessage = (message) => {
            setFlashMessage(message);
        };
        onMounted(() => {
            checkLoginStatus();
            eventBus.on("flash-message", handleFlashMessage);
        });

        return {
            isLoggedIn,
            checkLoginStatus,
            Logout,
            flashMessage,

            showFlashMessage,
        };
    },
};
</script>

<style>
.flash-message {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    background-color: #dcfce6;
    color: #333333;
    padding: 10px;
    text-align: center;
    font-weight: bold;
}
</style>
