<script setup>
import { Link } from '@inertiajs/vue3';
import PublicLayout from '@/Layouts/PublicLayout.vue';

defineProps({
    upcoming: Object,
    settings: Object,
});
</script>

<template>
    <PublicLayout :settings="settings">
        <!-- Header -->
        <section class="bg-blue-900 py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h1 class="text-3xl sm:text-4xl font-bold text-white">Agenda Kegiatan</h1>
                <p class="mt-2 text-blue-200">Jadwal kegiatan dan acara mendatang</p>
            </div>
        </section>

        <!-- Agendas List -->
        <section class="py-12 bg-gray-50">
            <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
                <div v-if="upcoming.data.length > 0" class="space-y-4">
                    <div
                        v-for="agenda in upcoming.data"
                        :key="agenda.id"
                        class="flex gap-4 rounded-xl border bg-white p-5 shadow-sm"
                    >
                        <!-- Date badge -->
                        <div class="flex-shrink-0 w-16 h-16 rounded-xl bg-blue-600 flex flex-col items-center justify-center text-white">
                            <span class="text-lg font-bold leading-none">{{ agenda.date.split(' ')[0] }}</span>
                            <span class="text-xs mt-0.5">{{ agenda.date.split(' ')[1]?.substring(0, 3) }}</span>
                        </div>

                        <!-- Details -->
                        <div class="flex-1 min-w-0">
                            <h3 class="font-semibold text-gray-900">{{ agenda.title }}</h3>
                            <div class="flex flex-wrap items-center gap-3 mt-1 text-sm text-gray-500">
                                <span class="flex items-center gap-1">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    {{ agenda.date }}
                                </span>
                                <span v-if="agenda.location" class="flex items-center gap-1">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    {{ agenda.location }}
                                </span>
                            </div>
                            <p v-if="agenda.description" class="mt-2 text-sm text-gray-500">
                                {{ agenda.description }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Empty state -->
                <div v-else class="text-center py-16">
                    <svg class="mx-auto h-12 w-12 text-gray-300 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <p class="text-gray-500">Belum ada agenda mendatang.</p>
                </div>

                <!-- Pagination -->
                <div v-if="upcoming.links.length > 3" class="mt-10 flex justify-center gap-1">
                    <Link
                        v-for="link in upcoming.links"
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
