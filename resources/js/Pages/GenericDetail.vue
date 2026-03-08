<script setup>
import { Head, Link } from '@inertiajs/vue3';
import PublicLayout from '@/Layouts/PublicLayout.vue';

defineProps({
    item: Object,
});
</script>

<template>
    <Head :title="item.title" />
    <PublicLayout>
        <!-- Header -->
        <div class="bg-primary pt-24 pb-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h1 class="text-3xl font-bold text-white mb-4">{{ item.title }}</h1>
                <div class="flex items-center justify-center space-x-2 text-white/80 text-sm">
                    <Link :href="`${$page.props.baseUrl}`" class="hover:text-white transition-colors">Beranda</Link>
                    <span>/</span>
                    <Link :href="`${$page.props.baseUrl}/${item.type}`" class="hover:text-white transition-colors">{{ item.typeLabel }}</Link>
                    <span>/</span>
                    <span class="text-white">{{ item.title }}</span>
                </div>
            </div>
        </div>

        <!-- Content -->
        <section class="py-16 bg-white min-h-[50vh]">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <div v-if="item.image" class="w-full aspect-video bg-gray-100">
                        <img 
                            :src="item.image.startsWith('http') ? item.image : `${$page.props.baseUrl}/storage/${item.image}`" 
                            :alt="item.title"
                            class="w-full h-full object-cover"
                        />
                    </div>
                    
                    <div class="p-8 md:p-12">
                        <div class="mb-8 border-b border-gray-100 pb-8 text-center">
                            <h2 class="text-3xl font-bold text-gray-900 mb-2">{{ item.title }}</h2>
                            <p v-if="item.subtitle" class="text-lg font-medium text-primary">{{ item.subtitle }}</p>
                        </div>
                        
                        <div v-if="item.content" class="prose prose-lg max-w-none prose-blue" v-html="item.content"></div>
                        <div v-else class="text-center text-gray-500 italic py-8">
                            Belum ada deskripsi mendetail untuk halaman ini.
                        </div>
                        
                        <div class="mt-12 pt-8 border-t border-gray-100 text-center">
                            <Link :href="`${$page.props.baseUrl}/${item.type}`" class="inline-flex items-center text-primary font-medium hover:text-blue-800 transition-colors">
                                <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                </svg>
                                Kembali ke {{ item.typeLabel }}
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </PublicLayout>
</template>
