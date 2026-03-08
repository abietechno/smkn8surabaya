<script setup>
import PublicLayout from '@/Layouts/PublicLayout.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    page: Object,
    settings: Object,
});
</script>

<template>
    <Head :title="page.title" />
    <PublicLayout :settings="settings">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 min-h-[50vh]">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-10">
                <h1 class="text-3xl font-bold text-slate-800 mb-8 border-b pb-4">{{ page.title }}</h1>
                
                <div v-if="page.content" class="prose prose-blue max-w-none prose-img:rounded-xl prose-a:text-primary" v-html="page.content">
                </div>
                
                <div v-if="page.slug === 'kontak' && settings.contact_map_iframe" class="mt-12">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6 text-center">Peta Lokasi</h3>
                    <div class="rounded-xl overflow-hidden border border-gray-200 shadow-sm" v-html="settings.contact_map_iframe"></div>
                </div>
                
                <div v-else class="text-center py-12">
                    <p class="text-gray-500 text-lg">
                        Konten halaman ini sedang dalam tahap pengembangan (Under Construction).
                    </p>
                    <div class="mt-8 flex justify-center">
                        <img src="https://cdn-icons-png.flaticon.com/512/8654/8654495.png" alt="Under Construction" class="w-48 h-48 opacity-75" />
                    </div>
                </div>
            </div>
        </div>
    </PublicLayout>
</template>
