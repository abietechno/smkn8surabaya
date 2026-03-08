<script setup>
import PublicLayout from '@/Layouts/PublicLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    galleries: Object,
    settings: Object,
});
</script>

<template>
    <Head title="Galeri" />
    <PublicLayout :settings="settings">
        <div class="bg-primary py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h1 class="text-3xl sm:text-4xl font-bold text-white mb-2">Galeri</h1>
                <p class="text-blue-100 text-lg">Kumpulan Momen dan Kegiatan di {{ settings.school_name || 'Sekolah Kami' }}</p>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div v-if="galleries.data.length > 0" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <Link v-for="gallery in galleries.data" :key="gallery.slug" :href="route('galleries.show', gallery.slug)" class="group block bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-lg transition-all duration-300">
                    <div class="relative h-64 overflow-hidden bg-gray-100">
                        <img v-if="gallery.cover_image" :src="gallery.cover_image" :alt="gallery.title" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" />
                        <div v-else class="w-full h-full flex items-center justify-center text-gray-300">
                            <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                        <div class="absolute inset-0 bg-black/20 group-hover:bg-black/10 transition-colors"></div>
                        <div class="absolute bottom-4 right-4 bg-white/90 backdrop-blur-sm p-2 rounded-lg text-gray-800 shadow-sm">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 text-center group-hover:text-primary transition-colors">{{ gallery.title }}</h3>
                    </div>
                </Link>
            </div>
            
            <div v-else class="text-center py-20 bg-gray-50 rounded-2xl border border-dashed border-gray-200">
                <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                <h3 class="text-xl font-medium text-gray-700">Belum Ada Album Galeri</h3>
                <p class="text-gray-500 mt-2">Album galeri akan segera hadir.</p>
            </div>

            <div v-if="galleries.links?.length > 3" class="mt-12 flex justify-center">
                <div class="flex flex-wrap shadow-sm rounded-lg overflow-hidden border border-gray-200 bg-white">
                    <Link
                        v-for="(link, k) in galleries.links"
                        :key="k"
                        :href="link.url || '#'"
                        v-html="link.label"
                        class="px-4 py-2 text-sm border-r last:border-r-0 hover:bg-gray-50 transition-colors"
                        :class="[
                            link.active ? 'bg-primary text-white hover:bg-primary font-medium' : 'text-gray-600',
                            !link.url ? 'opacity-50 cursor-not-allowed' : ''
                        ]"
                    />
                </div>
            </div>
        </div>
    </PublicLayout>
</template>
