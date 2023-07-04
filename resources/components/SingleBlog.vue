<template>
    <div
        class="bg-gray-700 text-white py-8 flex flex-col justify-center items-center"
        v-if="blog"
    >
        <div class="lg:w-[1000px] md:w-[800px] sm:w-[600px] w-[300px] mx-auto">
            <div class="bg-[#242734] p-6 rounded">
                <img :src="blog.image_url" alt="" class="mx-auto" />
                <h1 class="pt-5 text-center text-[30px] my-10">
                    {{ blog.title }}
                </h1>
                <p class="text-[18px]"></p>
            </div>
        </div>
    </div>
</template>

<script>
import { onMounted, ref } from "vue";
export default {
    props: ["slug"],
    setup(props) {
        let blog = ref(null);

        let fetchBlogs = async () => {
            try {
                const response = await fetch(
                    "http://127.0.0.1:8000/api/blogs/" + props.slug
                );

                const datas = await response.json();

                blog.value = datas;
            } catch (error) {
                console.log(error.message);
            }
        };

        onMounted(() => {
            fetchBlogs();
        });
        return { blog };
    },
};
</script>

<style></style>
