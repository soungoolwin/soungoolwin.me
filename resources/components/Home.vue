<template>
    <Hero></Hero>
    <Media></Media>
    <BlogSection></BlogSection>
    <Subscribe></Subscribe>
    <Footer></Footer>
</template>

<script>
import Footer from "./Footer.vue";
import Subscribe from "./Subscribe.vue";
import BlogSection from "./BlogSection.vue";
import Media from "./Media.vue";
import Hero from "./Hero.vue";
export default {
    components: {
        Footer,
        Subscribe,
        BlogSection,
        Media,
        Hero,
    },
};
</script>

<style></style>
