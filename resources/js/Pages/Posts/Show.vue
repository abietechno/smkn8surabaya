<script setup>
import { Link } from '@inertiajs/vue3';
import PublicLayout from '@/Layouts/PublicLayout.vue';

defineProps({
    post: Object,
    recentPosts: Array,
    settings: Object,
});
</script>

<template>
    <PublicLayout :settings="settings">
        <!-- Header -->
        <section class="bg-blue-900 py-16">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                <Link :href="`${$page.props.baseUrl}/berita`" class="inline-flex items-center gap-1 text-sm text-blue-200 hover:text-white transition-colors mb-4">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Kembali ke Berita
                </Link>
                <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-white leading-tight">
                    {{ post.title }}
                </h1>
                <div class="flex items-center gap-3 mt-4 text-sm text-blue-200">
                    <span>{{ post.published_at }}</span>
                    <span>&middot;</span>
                    <span>{{ post.author }}</span>
                </div>
            </div>
        </section>

        <!-- Content -->
        <article class="py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                    <!-- Main Content -->
                    <div class="lg:col-span-2">
                        <!-- Featured image -->
                        <div v-if="post.image" class="mb-8 rounded-xl overflow-hidden">
                            <img
                                :src="post.image.startsWith('http') ? post.image : `${$page.props.baseUrl}/storage/${post.image}`"
                                :alt="post.title"
                                class="w-full h-auto"
                            />
                        </div>

                        <!-- Article body -->
                        <div class="prose prose-lg prose-gray max-w-none" v-html="post.content"></div>

                        <!-- Back link -->
                        <div class="mt-12 pt-6 border-t">
                            <Link
                                :href="`${$page.props.baseUrl}/berita`"
                                class="inline-flex items-center gap-2 text-sm text-blue-600 hover:text-blue-800 transition-colors"
                            >
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                </svg>
                                Kembali ke Berita
                            </Link>
                        </div>
                    </div>

                    <!-- Sidebar -->
                    <div class="lg:col-span-1 border-t lg:border-t-0 lg:border-l border-gray-100 pt-8 lg:pt-0 lg:pl-8">
                        <div class="sticky top-[100px]">
                            <h3 class="text-xl font-bold text-gray-900 mb-6 flex items-center gap-2">
                                <svg class="w-5 h-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                </svg>
                                Artikel Lainnya
                            </h3>

                            <div v-if="recentPosts && recentPosts.length > 0" class="flex flex-col gap-6">
                                <Link 
                                    v-for="recent in recentPosts" 
                                    :key="recent.id" 
                                    :href="`${$page.props.baseUrl}/berita/${recent.slug}`"
                                    class="group flex gap-4 items-start"
                                >
                                    <div class="w-24 h-24 flex-shrink-0 rounded-lg overflow-hidden bg-gray-100">
                                        <img 
                                            v-if="recent.image" 
                                            :src="recent.image.startsWith('http') ? recent.image : `${$page.props.baseUrl}/storage/${recent.image}`" 
                                            :alt="recent.title"
                                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
                                        >
                                        <div v-else class="w-full h-full flex items-center justify-center text-gray-300">
                                            <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-xs text-blue-600 font-medium mb-1">{{ recent.published_at }}</p>
                                        <h4 class="text-sm font-semibold text-gray-900 leading-snug group-hover:text-blue-600 transition-colors line-clamp-3">
                                            {{ recent.title }}
                                        </h4>
                                    </div>
                                </Link>
                            </div>
                            <div v-else class="text-sm text-gray-500 italic p-4 bg-gray-50 rounded-lg">
                                Belum ada artikel lain yang tersedia.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </PublicLayout>
</template>
