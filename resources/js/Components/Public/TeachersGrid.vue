<script setup>
import { Link, usePage } from '@inertiajs/vue3';
import { Carousel, Slide, Navigation } from 'vue3-carousel';
import 'vue3-carousel/dist/carousel.css';

defineProps({
    teachers: {
        type: Array,
        default: () => [
            { id: 1, name: 'Agus Salim S.Pd', subject: 'Bahasa Inggris', photo: 'https://demo.sitesch.id/wp-content/uploads/2024/05/1steffen-wienberg-ml-pxK0Ovmw-unsplash-386x500.jpg' },
            { id: 2, name: 'Ahmad Rafiq S.Pd', subject: 'Matematika', photo: 'https://demo.sitesch.id/wp-content/uploads/2024/05/1jeremy-mcgilvrey-Mum-4dB0VsE-unsplash-386x500.jpg' },
            { id: 3, name: 'Alif Fadlan S.Pd', subject: 'TIK', photo: 'https://demo.sitesch.id/wp-content/uploads/2024/05/1andrew-power-y9L5-wmifaY-unsplash-386x500.jpg' },
            { id: 4, name: 'Dedi Kurniawan S.Pd', subject: 'Bahasa Inggris', photo: 'https://demo.sitesch.id/wp-content/uploads/2024/05/1austin-distel-7uoMmzPd2JA-unsplash-386x427.jpg' },
            { id: 5, name: 'Dedi Supriatna S.Pd', subject: 'Matematika', photo: 'https://demo.sitesch.id/wp-content/uploads/2024/05/1zahir-namane-hwc7eIQiTCE-unsplash-386x500.jpg' },
        ]
    }
});

const page = usePage();

const breakpoints = {
    0: { itemsToShow: 2.2, snapAlign: 'start' },
    640: { itemsToShow: 3.2, snapAlign: 'start' },
    1024: { itemsToShow: 5, snapAlign: 'start' },
};
</script>

<template>
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-8 pb-4">
                <div>
                    <h3 class="text-[26px] font-bold text-text-main mb-2">Guru</h3>
                    <p class="text-[16px] text-text-muted m-0">Guru di {{ $page?.props?.settings?.school_name || 'SMK Daarul Uluum' }}</p>
                </div>
                <div class="mt-4 md:mt-0 flex shrink-0">
                    <Link :href="`${page.props.baseUrl}/guru`" class="inline-flex items-center bg-primary text-white px-5 py-2 rounded-full text-[14px] font-medium hover:bg-blue-800 transition-colors shadow-sm">
                        <span class="hidden sm:inline mr-2">Semua Guru</span>
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </Link>
                </div>
            </div>

            <!-- List / Carousel -->
            <div class="mx-[-10px]">
                <Carousel :breakpoints="breakpoints">
                    <Slide v-for="teacher in teachers" :key="teacher.id">
                        <div class="px-3 sm:px-4 w-full">
                            <Link :href="`${page.props.baseUrl}/guru/${teacher.id}`" class="block w-full text-center group">
                                <div 
                                    class="w-full aspect-[3/4] rounded-[15px] bg-cover bg-center mb-4 transition-transform duration-300 group-hover:-translate-y-2 relative overflow-hidden"
                                >
                                    <img 
                                        :src="teacher.photo?.startsWith('http') ? teacher.photo : (teacher.photo ? `${page.props.baseUrl}/storage/${teacher.photo}` : 'https://demo.sitesch.id/wp-content/uploads/2024/05/1steffen-wienberg-ml-pxK0Ovmw-unsplash-386x500.jpg')" 
                                        :alt="teacher.name" 
                                        class="w-full h-full object-cover rounded-[15px]" 
                                    />
                                    <!-- Hover overlay -->
                                    <div class="absolute inset-0 bg-primary/0 group-hover:bg-primary/20 transition-colors duration-300 rounded-[15px]"></div>
                                </div>
                                <h5 class="text-[17px] font-semibold text-text-main leading-snug mb-1">
                                    {{ teacher.name }}
                                </h5>
                                <p class="text-[14px] font-medium text-text-muted mb-0">
                                    {{ teacher.subject }}
                                </p>
                            </Link>
                        </div>
                    </Slide>
                    
                    <template #addons>
                        <Navigation />
                    </template>
                </Carousel>
            </div>
        </div>
    </section>
</template>

<style scoped>
.carousel__prev,
.carousel__next {
    background-color: #15639b;
    color: white;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
}
.carousel__prev:hover,
.carousel__next:hover {
    background-color: #005a9b;
}
</style>
