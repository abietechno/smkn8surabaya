<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    posts: {
        type: Array,
        default: () => [
            {
                id: 1,
                title: 'Mendalami Manfaat Pentingnya Website Sekolah',
                published_at: '8 Juni 2024',
                image: '',
                slug: '#'
            },
            {
                id: 2,
                title: 'Menjelajahi Keajaiban Sains: Eksperimen Seru di Laboratorium Sekolah Kami!',
                published_at: '4 Juni 2024',
                image: '',
                slug: '#'
            },
            {
                id: 3,
                title: 'Mengasah Bakat Seni: Workshop Lukisan dan Seni Kerajinan untuk Siswa Sekolah',
                published_at: '4 Juni 2024',
                image: '',
                slug: '#'
            },
            {
                id: 4,
                title: 'Membangun Masa Depan: Panduan Karir bagi Siswa SMA',
                published_at: '4 Juni 2024',
                image: '',
                slug: '#'
            }
        ]
    }
});
</script>

<template>
    <section class="py-16 bg-[#E8F5FF]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-8 pb-4">
                <div>
                    <h3 class="text-[26px] font-bold text-text-main mb-2">Berita, Artikel & Informasi</h3>
                    <p class="text-[16px] text-text-muted m-0">Berita, artikel & informasi sekolah kami</p>
                </div>
                <div class="mt-4 md:mt-0 flex shrink-0">
                    <Link :href="`${$page.props.baseUrl}/berita`" class="inline-flex items-center bg-primary text-white px-5 py-2 rounded-full text-[14px] font-medium hover:bg-blue-800 transition-colors shadow-sm">
                        <span class="hidden sm:inline mr-2">Selengkapnya</span>
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </Link>
                </div>
            </div>

            <!-- List -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-[30px]">
                <div
                    v-for="post in posts"
                    :key="post.id"
                    class="bg-transparent"
                >
                    <div class="bg-white rounded-lg overflow-hidden h-full flex flex-col shadow-sm hover:shadow-md transition-shadow">
                        <Link :href="`${$page.props.baseUrl}/berita/${post.slug}`" class="block aspect-[5/4] bg-gray-200 overflow-hidden relative">
                            <img
                                v-if="post.image"
                                :src="post.image.startsWith('http') ? post.image : `${$page.props.baseUrl}/storage/${post.image}`"
                                :alt="post.title"
                                class="w-full h-full object-cover hover:scale-105 transition-transform duration-300"
                            />
                            <div v-else class="absolute inset-0 bg-blue-100 flex items-center justify-center">
                                <svg class="h-12 w-12 text-blue-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        </Link>

                        <div class="px-5 pt-4 pb-2">
                            <small class="text-[13px] text-text-muted font-medium">{{ post.published_at || post.created_at }}</small>
                        </div>
                        <div class="px-5 pt-2 pb-6 flex-1">
                            <h4 class="text-[18px] font-semibold text-text-main leading-snug mb-0 line-clamp-2">
                                <Link :href="`${$page.props.baseUrl}/berita/${post.slug}`" class="hover:text-primary transition-colors">
                                    {{ post.title }}
                                </Link>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
