<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';

defineProps({
    stats: Object,
});
</script>

<template>
    <AdminLayout>
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-900">Dashboard</h1>
            <p class="text-sm text-gray-500 mt-1">Ringkasan data website SMKN 8 Surabaya</p>
        </div>

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
            <div class="rounded-xl border bg-white p-6 shadow-sm">
                <p class="text-sm font-medium text-gray-500">Total Posts</p>
                <p class="mt-2 text-3xl font-bold text-gray-900">{{ stats.total_posts }}</p>
            </div>
            <div class="rounded-xl border bg-white p-6 shadow-sm">
                <p class="text-sm font-medium text-gray-500">Published</p>
                <p class="mt-2 text-3xl font-bold text-green-600">{{ stats.published_posts }}</p>
            </div>
            <div class="rounded-xl border bg-white p-6 shadow-sm">
                <p class="text-sm font-medium text-gray-500">Draft</p>
                <p class="mt-2 text-3xl font-bold text-yellow-600">{{ stats.draft_posts }}</p>
            </div>
            <div class="rounded-xl border bg-white p-6 shadow-sm">
                <p class="text-sm font-medium text-gray-500">Agenda Mendatang</p>
                <p class="mt-2 text-3xl font-bold text-blue-600">{{ stats.upcoming_agendas }}</p>
            </div>
        </div>
    </AdminLayout>
</template>
