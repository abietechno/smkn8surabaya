<script setup>
import { ref } from 'vue';
import { Link, usePage } from '@inertiajs/vue3';
import { Carousel, Slide } from 'vue3-carousel';
import 'vue3-carousel/dist/carousel.css';

defineProps({
    extracurriculars: {
        type: Array,
        default: () => [
            { id: 1, name: 'IT Club', image: 'https://demo.sitesch.id/wp-content/uploads/2024/05/1andrew-power-y9L5-wmifaY-unsplash-386x500.jpg' },
            { id: 2, name: 'Pramuka', image: 'https://demo.sitesch.id/wp-content/uploads/2024/05/1zahir-namane-hwc7eIQiTCE-unsplash-386x500.jpg' },
            { id: 3, name: 'PMR', image: 'https://demo.sitesch.id/wp-content/uploads/2024/05/1jeremy-mcgilvrey-Mum-4dB0VsE-unsplash-386x500.jpg' },
            { id: 4, name: 'Futsal', image: 'https://demo.sitesch.id/wp-content/uploads/2024/05/1steffen-wienberg-ml-pxK0Ovmw-unsplash-386x500.jpg' },
            { id: 5, name: 'Paskibra', image: 'https://demo.sitesch.id/wp-content/uploads/2024/05/1austin-distel-7uoMmzPd2JA-unsplash-386x427.jpg' }
        ]
    }
});

const page = usePage();
const carouselRef = ref(null);

const next = () => carouselRef.value?.next();
const prev = () => carouselRef.value?.prev();

const breakpoints = {
    0: { itemsToShow: 2.2, snapAlign: 'start' },
    640: { itemsToShow: 3.2, snapAlign: 'start' },
    1024: { itemsToShow: 5, snapAlign: 'start' },
};
</script>

<template>
    <section class="py-16 bg-white border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-8 pb-4">
                <div>
                    <h3 class="text-[26px] font-bold text-text-main mb-2">Ekstrakurikuler</h3>
                    <p class="text-[16px] text-text-muted m-0">Ekstrakurikuler yang ada di {{ $page?.props?.settings?.school_name || 'Sekolah Kami' }}</p>
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
                    <Slide v-for="ekskul in extracurriculars" :key="ekskul.id">
                        <div class="px-3 w-full">
                            <Link :href="`${page.props.baseUrl}/ekskul/${ekskul.id}`" class="block w-full text-center group">
                                <div 
                                    class="w-full aspect-[4/5] rounded-[15px] bg-cover bg-center mb-4 transition-transform duration-300 group-hover:-translate-y-2 relative overflow-hidden flex flex-col justify-end p-4"
                                    :style="`background-image: url('${ekskul.image?.startsWith('http') ? ekskul.image : (ekskul.image ? page.props.baseUrl + '/storage/' + ekskul.image : 'https://demo.sitesch.id/wp-content/uploads/2024/05/1andrew-power-y9L5-wmifaY-unsplash-386x500.jpg')}')`"
                                >
                                    <!-- Dark overlay -->
                                    <div class="absolute inset-0 bg-black/40 transition-colors duration-300 group-hover:bg-black/30"></div>
                                    
                                    <h4 class="m-0 mb-2 mt-4 text-[18px] font-semibold text-white relative z-10 leading-snug">
                                        {{ ekskul.name }}
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
