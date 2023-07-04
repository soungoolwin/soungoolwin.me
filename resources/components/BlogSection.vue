<template>
    <!-- blog section -->

    <div class="bg-[#242734] pt-10" id="blogs">
        <h1 class="blogsectionTitle">My Blogs</h1>

        <div
            class="grid grid-cols-1 sm:grid-cols-3 gap-4 toflexblogsection justify-items-center"
        >
            <div v-for="blog in blogs" :key="blog.id">
                <router-link
                    :to="{
                        name: 'singleblog',
                        params: { slug: blog.slug },
                    }"
                >
                    <div class="blogsectioncard mx-auto text-center">
                        <div class="relative">
                            <img
                                :src="blog.image_url"
                                alt=""
                                width="200"
                                height="200"
                                class="mx-auto pt-5"
                            />
                        </div>
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl mb-2">
                                {{ blog.title }}
                            </div>
                            <p class="text-gray-700 text-base pb-10">
                                {{ blog.intro }}
                            </p>
                        </div>
                    </div>
                </router-link>
                <a :href="`/blogs/${blog.slug}`"> </a>
            </div>
        </div>

        <div class="flex justify-center pb-5">
            <button
                :class="[
                    'bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2',
                    { 'opacity-50': page === 1 },
                ]"
                :disabled="page === 1"
                @click="prevPage"
            >
                Prev
            </button>
            <button
                :class="[
                    'bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-2',
                    { 'opacity-50': page === lastPage },
                ]"
                :disabled="page === lastPage"
                @click="nextPage"
            >
                Next
            </button>
        </div>
    </div>
</template>

<script>
import { onMounted, ref } from "vue";

export default {
    setup() {
        let blogs = ref([]);
        let page = ref(1);
        let lastPage = ref(1);

        let fetchBlogs = async () => {
            try {
                const response = await fetch(
                    "http://127.0.0.1:8000/api/blogs?page=" + page.value
                );

                const data = await response.json();
                blogs.value = data.data;
                lastPage.value = data.last_page;
            } catch (error) {
                console.log(error);
            }
        };

        let nextPage = () => {
            if (page.value < lastPage.value) {
                page.value++;
                fetchBlogs();
            }
        };

        let prevPage = () => {
            if (page.value > 1) {
                page.value--;
                fetchBlogs();
            }
        };

        onMounted(() => {
            fetchBlogs();
        });

        return { blogs, nextPage, prevPage, lastPage, page };
    },
};
</script>

<style></style>
