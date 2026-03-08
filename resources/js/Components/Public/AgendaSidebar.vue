<script setup>
import { Link } from '@inertiajs/vue3';
import { Carousel, Slide, Navigation } from 'vue3-carousel';
import 'vue3-carousel/dist/carousel.css';

defineProps({
    agendas: {
        type: Array,
        default: () => [
            { id: 1, title: 'Kelulusan Siswa Kelas 12 Tahun Pelajaran 2023/2024', date: '10 Juni 2024' },
            { id: 2, title: 'Rapat Orang Tua Siswa Kelas 12', date: '11 Mei 2024' },
            { id: 3, title: 'Libur Umum (Tahun Baru Islam 1446 H)', date: '19 Juli 2024' },
            { id: 4, title: 'Masa Pengenalan Lingkungan Sekolah (MPLS)', date: '10 - 21 Juli 2024' },
            { id: 5, title: 'Hari Pertama Sekolah (HP)', date: '10 Juli 2024' }
        ]
    }
});

const breakpoints = {
    0: { itemsToShow: 1.2, snapAlign: 'start' },
    640: { itemsToShow: 2.2, snapAlign: 'start' },
    1024: { itemsToShow: 4, snapAlign: 'start' },
};
</script>

<template>
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-8 pb-4">
                <div>
                    <h3 class="text-[26px] font-bold text-text-main mb-2">Agenda</h3>
                    <p class="text-[16px] text-text-muted m-0">Agenda kegiatan dan aktifitas sesuai dengan kalender pendidikan</p>
                </div>
                <div class="mt-4 md:mt-0 flex shrink-0">
                    <Link :href="`${$page.props.baseUrl}/agenda`" class="inline-flex items-center bg-primary text-white px-5 py-2 rounded-full text-[14px] font-medium hover:bg-blue-800 transition-colors shadow-sm">
                        <span class="hidden sm:inline mr-2">Selengkapnya</span>
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </Link>
                </div>
            </div>

            <!-- List / Carousel -->
            <div class="mx-[-10px]">
                <Carousel :breakpoints="breakpoints">
                    <Slide v-for="agenda in agendas" :key="agenda.id" class="px-[10px]">
                        <div class="w-full bg-[#E8F5FF] p-6 rounded-[15px] border border-transparent hover:border-primary transition-colors text-left flex flex-col h-full min-h-[160px]">
                            <div class="flex-1">
                                <svg class="w-8 h-8 text-primary mb-4" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                </svg>
                                <h5 class="text-[17px] font-semibold text-text-main leading-snug mb-0 line-clamp-3">
                                    {{ agenda.title }}
                                </h5>
                            </div>
                            <p class="text-[14px] font-medium text-text-muted mt-4 pt-4 border-t border-blue-100 mb-0">
                                {{ agenda.date }}
                            </p>
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
