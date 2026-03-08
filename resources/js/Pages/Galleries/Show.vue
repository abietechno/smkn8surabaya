<script setup>
import PublicLayout from '@/Layouts/PublicLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { ref } from 'vue';

const props = defineProps({
    gallery: Object,
    settings: Object,
});

const isModalOpen = ref(false);
const currentImageIndex = ref(0);

const openImage = (index) => {
    currentImageIndex.value = index;
    isModalOpen.value = true;
};

const nextImage = () => {
    if (currentImageIndex.value < props.gallery.images.length - 1) {
        currentImageIndex.value++;
    }
};

const prevImage = () => {
    if (currentImageIndex.value > 0) {
        currentImageIndex.value--;
    }
};
</script>

<template>
    <Head :title="gallery.title" />
    <PublicLayout :settings="settings">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <nav class="flex mb-8" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <Link :href="route('home')" class="text-sm font-medium text-gray-500 hover:text-primary">Beranda</Link>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <span class="mx-2 text-gray-400">/</span>
                            <Link :href="route('galleries.index')" class="text-sm font-medium text-gray-500 hover:text-primary">Galeri</Link>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <span class="mx-2 text-gray-400">/</span>
                            <span class="text-sm font-medium text-gray-800">{{ gallery.title }}</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden mb-12">
                <div v-if="gallery.cover_image" class="w-full h-80 sm:h-96 relative">
                    <img :src="gallery.cover_image" :alt="gallery.title" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-8 sm:p-12">
                        <span class="inline-block bg-primary text-white text-xs font-bold px-3 py-1 rounded-full mb-4">{{ gallery.created_at }}</span>
                        <h1 class="text-3xl sm:text-5xl font-bold text-white mb-4 leading-tight">{{ gallery.title }}</h1>
                    </div>
                </div>
                
                <div v-if="gallery.description" class="p-8 sm:p-12 border-b border-gray-100 bg-gray-50/50">
                    <div class="prose prose-blue max-w-none text-gray-600 leading-relaxed text-lg" v-html="gallery.description"></div>
                </div>

                <div class="p-8 sm:p-12">
                    <h3 class="text-2xl font-bold text-gray-800 mb-8 flex items-center">
                        <svg class="w-6 h-6 mr-3 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        Koleksi Foto ({{ gallery.images ? gallery.images.length : 0 }})
                    </h3>
                    
                    <div v-if="gallery.images && gallery.images.length > 0" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 sm:gap-6">
                        <div 
                            v-for="(img, idx) in gallery.images" 
                            :key="idx"
                            @click="openImage(idx)"
                            class="group relative h-48 sm:h-64 rounded-xl overflow-hidden cursor-pointer shadow-sm border border-gray-100"
                        >
                            <img :src="img" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" loading="lazy">
                            <div class="absolute inset-0 bg-black/0 group-hover:bg-black/40 transition-colors duration-300 flex items-center justify-center">
                                <span class="text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300 transform scale-50 group-hover:scale-100">
                                    <svg class="w-10 h-10 drop-shadow-lg" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"></path></svg>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div v-else class="text-center py-12 bg-gray-50 rounded-xl border border-dashed border-gray-200">
                        <p class="text-gray-500">Belum ada foto yang diunggah dalam album ini.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Lightbox Modal -->
        <div v-if="isModalOpen" class="fixed inset-0 z-50 flex items-center justify-center bg-black/95 backdrop-blur-sm p-4">
            <button @click="isModalOpen = false" class="absolute top-6 right-6 text-white/70 hover:text-white transition-colors">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>

            <button @click="prevImage" v-if="currentImageIndex > 0" class="absolute left-6 top-1/2 -translate-y-1/2 bg-black/50 hover:bg-black text-white p-3 rounded-full transition-all backdrop-blur-md border border-white/10">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            </button>

            <img :src="gallery.images[currentImageIndex]" class="max-h-[90vh] max-w-[90vw] object-contain rounded-lg shadow-2xl" />

            <button @click="nextImage" v-if="currentImageIndex < gallery.images.length - 1" class="absolute right-6 top-1/2 -translate-y-1/2 bg-black/50 hover:bg-black text-white p-3 rounded-full transition-all backdrop-blur-md border border-white/10">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </button>
            
            <div class="absolute bottom-6 left-1/2 -translate-y-1/2 -translate-x-1/2 bg-black/60 px-4 py-2 rounded-full text-white/90 text-sm backdrop-blur-md border border-white/10">
                {{ currentImageIndex + 1 }} / {{ gallery.images.length }}
            </div>
        </div>
    </PublicLayout>
</template>
