<script setup>
import { Head, router, useForm, usePage } from '@inertiajs/vue3'
import Main from '@/Layouts/Main.vue';
import axios from 'axios';
import { onMounted } from 'vue';

const props = defineProps({
    gallery: Object,
    image_url: String,
})

const form = useForm({})

onMounted(() => {
    console.log(usePage().props.timing);
    setTimeout(() => {
        getNewImage();
    }, usePage().props.timing);  //4 hours
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