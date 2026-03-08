<script setup>
import { ref, onMounted } from 'vue';

const props = defineProps({
    settings: Object,
});

const stats = [
    { key: 'stat_teachers', label: 'Guru & Staff', icon: 'users', default: '75' },
    { key: 'stat_students', label: 'Siswa', icon: 'academic', default: '1250' },
    { key: 'stat_classes', label: 'Rombongan Belajar', icon: 'building', default: '45' },
];

const counters = ref(stats.map(() => 0));
const observed = ref(false);

function animateCounters() {
    stats.forEach((stat, i) => {
        const target = parseInt(props.settings?.[stat.key] || stat.default);
        const duration = 2000;
        const step = target / (duration / 16);
        let current = 0;
        const timer = setInterval(() => {
            current += step;
            if (current >= target) {
                counters.value[i] = target;
                clearInterval(timer);
            } else {
                counters.value[i] = Math.floor(current);
            }
        }, 16);
    });
}

onMounted(() => {
    const observer = new IntersectionObserver((entries) => {
        if (entries[0].isIntersecting && !observed.value) {
            observed.value = true;
            animateCounters();
        }
    }, { threshold: 0.3 });
    const el = document.getElementById('school-stats');
    if (el) observer.observe(el);
});
</script>

<template>
    <section id="school-stats" class="py-16 bg-gradient-to-r from-blue-700 to-blue-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                <div v-for="(stat, index) in stats" :key="stat.key" class="flex flex-col items-center">
                    <!-- Icon -->
                    <div class="w-16 h-16 rounded-full bg-white/10 flex items-center justify-center mb-4">
                        <svg v-if="stat.icon === 'users'" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <svg v-else-if="stat.icon === 'academic'" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 14l9-5-9-5-9 5 9 5z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                        </svg>
                        <svg v-else class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <span class="text-4xl sm:text-5xl font-bold">{{ counters[index] }}</span>
                    <span class="mt-2 text-blue-200 text-sm sm:text-base">{{ stat.label }}</span>
                </div>
            </div>
        </div>
    </section>
</template>
