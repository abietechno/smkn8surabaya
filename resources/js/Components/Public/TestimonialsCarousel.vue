<script setup>
defineProps({
    testimonials: Array,
});
</script>

<template>
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10">
                <span class="inline-block rounded-full bg-rose-100 px-4 py-1 text-sm font-medium text-rose-700 mb-3">
                    Testimoni
                </span>
                <h2 class="text-2xl sm:text-3xl font-bold text-gray-900">Apa Kata Mereka</h2>
                <p class="mt-2 text-gray-500">Testimoni dari alumni, orang tua, dan mitra kerja</p>
            </div>

            <div v-if="testimonials.length > 0" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div
                    v-for="testimonial in testimonials"
                    :key="testimonial.id"
                    class="rounded-xl border bg-white p-6 shadow-sm"
                >
                    <!-- Quote icon -->
                    <svg class="h-8 w-8 text-rose-200 mb-4" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10H14.017zM0 21v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151C7.563 6.068 6 8.789 6 11h4v10H0z" />
                    </svg>

                    <p class="text-gray-600 text-sm leading-relaxed mb-4">
                        {{ testimonial.content }}
                    </p>

                    <div class="flex items-center gap-3 border-t pt-4">
                        <div class="h-10 w-10 rounded-full bg-gradient-to-br from-rose-100 to-rose-200 overflow-hidden flex-shrink-0">
                            <img
                                v-if="testimonial.photo"
                                :src="`/storage/${testimonial.photo}`"
                                :alt="testimonial.name"
                                class="h-full w-full object-cover"
                            />
                            <div v-else class="h-full w-full flex items-center justify-center">
                                <svg class="h-5 w-5 text-rose-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-900 text-sm">{{ testimonial.name }}</p>
                            <p v-if="testimonial.role" class="text-xs text-gray-500">{{ testimonial.role }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div v-else class="text-center py-12 text-gray-500">
                <p>Belum ada testimoni.</p>
            </div>
        </div>
    </section>
</template>
