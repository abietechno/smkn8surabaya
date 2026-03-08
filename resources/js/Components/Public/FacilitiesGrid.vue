<script setup>
import { ref } from 'vue';
import { Link, usePage } from '@inertiajs/vue3';
import { Carousel, Slide } from 'vue3-carousel';
import 'vue3-carousel/dist/carousel.css';

defineProps({
    facilities: {
        type: Array,
        default: () => [
            { id: 1, name: 'Auditorium', image: 'https://demo.sitesch.id/wp-content/uploads/2024/05/1andrew-power-y9L5-wmifaY-unsplash-386x500.jpg' },
            { id: 2, name: 'Laboratorium', image: 'https://demo.sitesch.id/wp-content/uploads/2024/05/1zahir-namane-hwc7eIQiTCE-unsplash-386x500.jpg' },
        ]
    }
});

const page = usePage();
const carouselRef = ref(null);

const next = () => carouselRef.value?.next();
const prev = () => carouselRef.value?.prev();

const breakpoints = {
    0: { itemsToShow: 1.1, snapAlign: 'start' },
    640: { itemsToShow: 1.5, snapAlign: 'start' },
    1024: { itemsToShow: 2.2, snapAlign: 'start' },
};
</script>

<template>
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-8 pb-4">
                <div>
                    <h3 class="text-[26px] font-bold text-text-main mb-2">Fasilitas Sekolah</h3>
                    <p class="text-[16px] text-text-muted m-0">Fasilitas sekolah yang kami miliki</p>
                </div>
                <div class="mt-4 md:mt-0 flex shrink-0 items-center gap-3">
                    <button @click="prev" class="w-9 h-9 flex items-center justify-center rounded-full border border-primary text-primary hover:bg-primary hover:text-white transition-colors">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                    </button>
                    <button @click="next" class="w-9 h-9 flex items-center justify-center rounded-full border border-primary text-primary hover:bg-primary hover:text-white transition-colors">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- List / Carousel -->
            <div class="mx-[-10px]">
                <Carousel ref="carouselRef" :breakpoints="breakpoints">
                    <Slide v-for="facility in facilities" :key="facility.id">
                        <div class="px-3 w-full">
                            <Link :href="`${page.props.baseUrl}/fasilitas/${facility.id}`" class="flex h-[220px] w-full rounded-2xl overflow-hidden group text-left">
                                <!-- Left: Image -->
                                <div class="w-1/2 bg-gray-200 overflow-hidden relative">
                                    <img
                                        :src="facility.image?.startsWith('http') ? facility.image : (facility.image ? `${page.props.baseUrl}/storage/${facility.image}` : 'https://demo.sitesch.id/wp-content/uploads/2024/05/1andrew-power-y9L5-wmifaY-unsplash-386x500.jpg')"
                                        :alt="facility.name"
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                    />
                                    <div class="absolute inset-0 bg-black/10 transition-colors group-hover:bg-black/0"></div>
                                </div>
                                <!-- Right: Blue Box -->
                                <div class="w-1/2 bg-[#1b6b9e] group-hover:bg-[#155a86] transition-colors p-6 sm:p-8 flex items-center justify-start pl-[10%]">
                                    <h4 class="text-xl sm:text-2xl font-bold text-white leading-tight">
                                        {{ facility.name }}
                                    </h4>
                                </div>
                            </Link>
                        </div>
                    </Slide>
                </Carousel>
            </div>
        </div>
    </section>
</template>
