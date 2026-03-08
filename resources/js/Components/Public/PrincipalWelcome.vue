<script setup>
import { usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

const props = defineProps({
    settings: Object,
});

const page = usePage();
const settings = computed(() => props.settings || page.props.settings || {});

const photoUrl = computed(() => {
    if (settings.value?.principal_photo) {
        return `${page.props.baseUrl}/storage/${settings.value.principal_photo}`;
    }
    return null;
});
</script>

<template>
    <div class="relative z-10 -mt-20 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto mb-16">
        <div class="bg-white rounded-[20px] shadow-[0_10px_40px_rgba(0,0,0,0.08)] p-6 lg:p-10">
            <div class="flex flex-col lg:flex-row gap-8 lg:gap-12">
                <!-- Sambutan (Left) -->
                <div class="flex-1">
                    <div class="flex flex-col sm:flex-row gap-6 items-start">
                        <div
                            class="w-full sm:w-[140px] h-[200px] sm:h-[180px] rounded-[10px] bg-cover bg-center shrink-0 bg-gray-200"
                            :style="photoUrl ? `background-image: url('${photoUrl}');` : ''"
                        >
                            <div v-if="!photoUrl" class="w-full h-full flex items-center justify-center">
                                <svg class="w-12 h-12 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-[22px] font-bold text-text-main mb-2">Sambutan Kepala Sekolah</h3>
                            <h4 class="text-[18px] font-semibold text-primary mb-3">
                                {{ settings?.principal_name || 'Kepala Sekolah' }}
                            </h4>
                            <p class="text-[15px] text-text-muted leading-relaxed mb-4">
                                {{ settings?.principal_greeting || 'Selamat datang di website resmi sekolah kami.' }}
                            </p>
                            <a
                                :href="`${$page.props.baseUrl}${settings?.principal_url || '/profil'}`"
                                class="inline-flex items-center bg-primary text-white px-5 py-2 rounded-full text-[13px] font-semibold hover:bg-blue-800 transition-colors shadow-sm"
                            >
                                Selengkapnya
                                <svg class="ml-2 w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Divider on Desktop -->
                <div class="hidden lg:block w-px bg-gray-200"></div>

                <!-- Statistics (Right) -->
                <div class="lg:w-[40%] flex flex-col justify-center">
                    <h3 class="text-[22px] font-bold text-text-main mb-6 text-center lg:text-left">Statistik Data Sekolah</h3>
                    <div class="flex justify-between items-center text-center">
                        <div class="flex flex-col gap-1 flex-1">
                            <div class="text-4xl font-bold text-primary">{{ settings?.stat_teachers || '0' }}</div>
                            <div class="text-[15px] text-text-muted font-medium">Guru & Staf</div>
                        </div>
                        <div class="w-px h-12 bg-gray-200"></div>
                        <div class="flex flex-col gap-1 flex-1">
                            <div class="text-4xl font-bold text-primary">{{ settings?.stat_students || '0' }}</div>
                            <div class="text-[15px] text-text-muted font-medium">Siswa</div>
                        </div>
                        <div class="w-px h-12 bg-gray-200"></div>
                        <div class="flex flex-col gap-1 flex-1">
                            <div class="text-4xl font-bold text-primary">{{ settings?.stat_classes || '0' }}</div>
                            <div class="text-[15px] text-text-muted font-medium">Rombel</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
