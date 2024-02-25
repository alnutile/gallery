<script setup>
import { Head, router, useForm } from '@inertiajs/vue3'
import Main from '@/Layouts/Main.vue';
import axios from 'axios';
import { onMounted } from 'vue';

const props = defineProps({
    gallery: Object,
    image_url: String,
})

const form = useForm({})

onMounted(() => {
    setTimeout(() => {
        getNewImage();
    }, 2400000);  //4 hours
})

const getNewImage = () => {
    form.get(route('generate'), {
        onSuccess: (data) => {
            router.reload();
        }
    });
}

</script>

<template>
    <Main>
        <Head :title="gallery.title"></Head>
        <img :src="image_url" />
    </Main>
</template>