<script setup>
import { defineProps, computed } from 'vue';
import { usePage } from '@inertiajs/vue3';
import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel';
import 'vue3-carousel/dist/carousel.css';

const props = defineProps({
    sliders: {
        type: Array,
        default: () => [],
    },
    heroText: {
        type: String,
        default: 'Selamat Datang di Website Resmi SMKN 8 Surabaya',
    },
    heroSubtext: {
        type: String,
        default: 'Mewujudkan Generasi Unggul, Berkarakter, dan Siap Kerja',
    },
});

const page = usePage();

const slides = computed(() => {
    if (props.sliders.length > 0) {
        return props.sliders.map(s => ({
            title: s.title,
            desc: s.description || '',
            image: `${page.props.baseUrl}/storage/${s.image}`,
            link: s.button_url || '#',
            buttonText: s.button_text || 'Selengkapnya',
            showText: s.show_text ?? true,
        }));
    }
    return [
        {
            title: 'Pengalaman Belajar di Luar Negeri bagi Siswa',
            desc: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            image: 'https://demo.sitesch.id/wp-content/uploads/2024/05/ed-us-td71Lq7uAhA-unsplash-scaled-1-1200x845.jpg',
            link: '#',
            buttonText: 'Selengkapnya',
            showText: true,
        },
    ];
});
</script>

<template>
    <div class="relative w-full overflow-hidden">
        <Carousel :autoplay="4000" :wrap-around="true" :transition="500">
            <Slide v-for="(slide, index) in slides" :key="index">
                <div
                    class="w-full relative flex items-center justify-center bg-cover bg-center"
                    :style="`background-image: url('${slide.image}'); padding: 250px 0 250px 0;`"
                >
                    <!-- Gradient Overlay -->
                    <div class="absolute inset-0 bg-black/50"></div>

                    <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
                        <template v-if="slide.showText">
                            <h3 class="text-3xl sm:text-4xl lg:text-[42px] font-bold leading-tight mb-4">
                                {{ slide.title }}
                            </h3>
                            <p class="text-[15px] sm:text-[16px] font-light leading-relaxed mb-12 max-w-3xl mx-auto">
                                {{ slide.desc }}
                            </p>
                        </template>
                        <a
                            :href="slide.link"
                            :class="[
                                'inline-flex items-center bg-primary text-white px-8 py-3 rounded-full font-semibold text-[15px] hover:bg-[#005a9b] transition-colors',
                                slide.showText ? 'mt-8' : 'mt-[100px]'
                            ]"
                        >
                            {{ slide.buttonText }}
                            <svg class="ml-2 w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </Slide>

            <template #addons>
                <div class="hidden">
                    <Pagination />
                </div>
            </template>
        </Carousel>
    </div>
</template>

<style>
.carousel__slide {
    padding: 0;
}
</style>
