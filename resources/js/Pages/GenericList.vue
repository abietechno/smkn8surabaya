<script setup>
import { Head, Link } from '@inertiajs/vue3';
import PublicLayout from '@/Layouts/PublicLayout.vue';

defineProps({
    items: Array,
    pageTitle: String,
    type: String,
});
</script>

<template>
    <Head :title="pageTitle" />
    <PublicLayout>
        <!-- Header -->
        <div class="bg-primary pt-24 pb-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h1 class="text-3xl font-bold text-white mb-4">{{ pageTitle }}</h1>
                <div class="flex items-center justify-center space-x-2 text-white/80 text-sm">
                    <Link :href="`${$page.props.baseUrl}`" class="hover:text-white transition-colors">Beranda</Link>
                    <span>/</span>
                    <span class="text-white">{{ pageTitle }}</span>
                </div>
            </div>
        </div>

        <!-- Content -->
        <section class="py-16 bg-white min-h-[50vh]">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div v-if="items.length === 0" class="text-center py-12">
                    <p class="text-gray-500">Belum ada data untuk kategori ini.</p>
                </div>
                
                <div v-else class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                    <Link 
                        v-for="item in items" 
                        :key="item.id" 
                        :href="`${$page.props.baseUrl}/${type}/${item.id}`"
                        class="block group"
                    >
                        <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition-all duration-300 border border-gray-100 h-full flex flex-col">
                            <div class="aspect-[4/3] w-full overflow-hidden bg-gray-100 relative">
                                <img 
                                    v-if="item.image"
                                    :src="item.image.startsWith('http') ? item.image : `${$page.props.baseUrl}/storage/${item.image}`" 
                                    :alt="item.title"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                />
                                <div v-else class="w-full h-full flex items-center justify-center bg-gray-200 text-gray-400">
                                    <svg class="w-12 h-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="p-6 flex-1 flex flex-col">
                                <h3 class="text-lg font-bold text-gray-900 group-hover:text-primary transition-colors mb-2 line-clamp-2">{{ item.title }}</h3>
                                <p v-if="item.subtitle" class="text-sm font-medium text-gray-500 mt-auto">{{ item.subtitle }}</p>
                            </div>
                        </div>
                    </Link>
                </div>
            </div>
        </section>
    </PublicLayout>
</template>
