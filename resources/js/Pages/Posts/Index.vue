<script setup>
import { Link } from '@inertiajs/vue3';
import PublicLayout from '@/Layouts/PublicLayout.vue';

defineProps({
    posts: Object,
    settings: Object,
});
</script>

<template>
    <PublicLayout :settings="settings">
        <!-- Header -->
        <section class="bg-blue-900 py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h1 class="text-3xl sm:text-4xl font-bold text-white">Berita & Artikel</h1>
                <p class="mt-2 text-blue-200">Informasi terbaru seputar kegiatan sekolah</p>
            </div>
        </section>

        <!-- Posts Grid -->
        <section class="py-12 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <Link
                        v-for="post in posts.data"
                        :key="post.id"
                        :href="`${$page.props.baseUrl}/berita/${post.slug}`"
                        class="group rounded-xl border bg-white shadow-sm overflow-hidden hover:shadow-md transition-shadow"
                    >
                        <div class="aspect-video bg-gradient-to-br from-blue-100 to-blue-200 overflow-hidden">
                            <img
                                v-if="post.image"
                                :src="post.image.startsWith('http') ? post.image : `${$page.props.baseUrl}/storage/${post.image}`"
                                :alt="post.title"
                                class="h-full w-full object-cover group-hover:scale-105 transition-transform duration-300"
                            />
                            <div v-else class="h-full w-full flex items-center justify-center">
                                <svg class="h-12 w-12 text-blue-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                </svg>
                            </div>
                        </div>
                        <div class="p-5">
                            <div class="flex items-center gap-2 text-xs text-gray-500 mb-2">
                                <span>{{ post.published_at }}</span>
                                <span>&middot;</span>
                                <span>{{ post.author }}</span>
                            </div>
                            <h3 class="font-semibold text-gray-900 group-hover:text-blue-600 transition-colors line-clamp-2">
                                {{ post.title }}
                            </h3>
                            <p v-if="post.excerpt" class="mt-2 text-sm text-gray-500 line-clamp-2">
                                {{ post.excerpt }}
                            </p>
                        </div>
                    </Link>
                </div>

                <!-- Empty state -->
                <div v-if="posts.data.length === 0" class="text-center py-16">
                    <svg class="mx-auto h-12 w-12 text-gray-300 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                    </svg>
                    <p class="text-gray-500">Belum ada berita.</p>
                </div>

                <!-- Pagination -->
                <div v-if="posts.links.length > 3" class="mt-10 flex justify-center gap-1">
                    <Link
                        v-for="link in posts.links"
                        :key="link.label"
                        :href="link.url || '#'"
                        :class="[
                            link.active ? 'bg-blue-600 text-white' : 'bg-white text-gray-700 hover:bg-gray-100',
                            !link.url ? 'opacity-50 cursor-not-allowed' : '',
                            'rounded-lg border px-4 py-2 text-sm'
                        ]"
                        v-html="link.label"
                    />
                </div>
            </div>
        </section>
    </PublicLayout>
</template>
