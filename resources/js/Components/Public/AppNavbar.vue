<script setup>
import { Link, usePage } from '@inertiajs/vue3';
import { ref, computed } from 'vue';

defineProps({
    settings: Object,
});

const mobileOpen = ref(false);
const openDropdown = ref(null);
const mobileExpanded = ref(null);
const hoveredChild = ref(null);

const page = usePage();

const navLinks = computed(() => {
    const links = page.props.navLinks;
    if (links && links.length > 0) {
        return links.map(l => ({
            name: l.label,
            href: l.url,
            description: l.description || '',
            icon: l.icon || '',
            children: (l.active_children || []).map(c => ({
                name: c.label,
                href: c.url,
                description: c.description || '',
                icon: c.icon || '',
            })),
        }));
    }
    return [
        { name: 'Beranda', href: '/', children: [] },
        { name: 'Profil Kami', href: '/profil', children: [] },
        { name: 'Agenda', href: '/agenda', children: [] },
        { name: 'Kontak', href: '/kontak', children: [] },
    ];
});

const logoUrl = computed(() => {
    const settings = page.props.settings;
    if (settings?.site_logo) {
        return `${page.props.baseUrl}/storage/${settings.site_logo}`;
    }
    return null;
});

let closeTimeout = null;

function showDropdown(index) {
    clearTimeout(closeTimeout);
    openDropdown.value = index;
    hoveredChild.value = null;
}

function hideDropdown() {
    closeTimeout = setTimeout(() => {
        openDropdown.value = null;
        hoveredChild.value = null;
    }, 150);
}

function toggleMobileSubmenu(index) {
    mobileExpanded.value = mobileExpanded.value === index ? null : index;
}

// Simple icon map for common icons
const iconPaths = {
    globe: 'M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9',
    phone: 'M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z',
    server: 'M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01',
    device: 'M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z',
    code: 'M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4',
    book: 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253',
    users: 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z',
    academic: 'M12 14l9-5-9-5-9 5 9 5z M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z',
    default: 'M13 10V3L4 14h7v7l9-11h-7z',
};

function getIconPath(icon) {
    return iconPaths[icon] || iconPaths.default;
}
</script>

<template>
    <nav class="bg-white sticky top-0 z-50 shadow-sm border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex h-[80px] items-center justify-between">
                <!-- Mobile Logo text (used by default for both) -->
                <Link :href="$page.props.baseUrl + '/'" class="flex lg:hidden items-center">
                    <img v-if="logoUrl" class="h-[50px]" :src="logoUrl" alt="logo">
                    <span v-else class="font-bold text-primary text-lg">{{ $page.props.settings?.school_name || 'SMKN 8' }}</span>
                </Link>

                <!-- Desktop Nav -->
                <div class="hidden lg:flex items-center gap-1">
                    <template v-for="(link, i) in navLinks" :key="link.name">
                        <!-- Menu with children → mega menu -->
                        <div
                            v-if="link.children.length > 0"
                            class="relative"
                            @mouseenter="showDropdown(i)"
                            @mouseleave="hideDropdown()"
                        >
                            <button
                                :class="[
                                    'font-semibold text-[15px] transition-colors px-3 py-2 rounded-lg inline-flex items-center gap-1',
                                    openDropdown === i ? 'text-primary bg-blue-50' : 'text-text-main hover:text-primary'
                                ]"
                            >
                                {{ link.name }}
                                <svg class="w-4 h-4 transition-transform" :class="{ 'rotate-180': openDropdown === i }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>

                            <!-- Mega Menu Dropdown -->
                            <Transition
                                enter-active-class="transition ease-out duration-200"
                                enter-from-class="opacity-0 translate-y-1"
                                enter-to-class="opacity-100 translate-y-0"
                                leave-active-class="transition ease-in duration-150"
                                leave-from-class="opacity-100 translate-y-0"
                                leave-to-class="opacity-0 translate-y-1"
                            >
                                <div
                                    v-if="openDropdown === i"
                                    class="absolute left-0 top-full mt-1 bg-white rounded-xl shadow-xl border border-gray-100 overflow-hidden z-50"
                                    :class="link.children.some(c => c.description) ? 'w-[600px]' : 'w-[260px]'"
                                >
                                    <!-- Header -->
                                    <div class="px-5 pt-4 pb-2">
                                        <p class="text-xs font-bold text-gray-400 uppercase tracking-wider">{{ link.name }}</p>
                                    </div>

                                    <div class="flex">
                                        <!-- Left: Menu Items -->
                                        <div class="flex-1 py-2 px-2" :class="link.children.some(c => c.description) ? 'border-r border-gray-100' : ''">
                                            <a
                                                v-for="(child, ci) in link.children"
                                                :key="child.name"
                                                :href="$page.props.baseUrl + child.href"
                                                class="flex items-center gap-3 px-3 py-2.5 rounded-lg transition-colors"
                                                :class="hoveredChild === ci ? 'bg-blue-50 text-primary' : 'text-gray-700 hover:bg-gray-50'"
                                                @mouseenter="hoveredChild = ci"
                                            >
                                                <div
                                                    v-if="child.icon"
                                                    class="w-9 h-9 rounded-lg flex items-center justify-center flex-shrink-0"
                                                    :class="hoveredChild === ci ? 'bg-primary text-white' : 'bg-gray-100 text-gray-500'"
                                                >
                                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" :d="getIconPath(child.icon)" />
                                                    </svg>
                                                </div>
                                                <div>
                                                    <p class="font-semibold text-sm">{{ child.name }}</p>
                                                    <p v-if="child.description && !link.children.some(c => c.description)" class="text-xs text-gray-400 mt-0.5">{{ child.description }}</p>
                                                </div>
                                                <svg v-if="child.description && link.children.some(c => c.description)" class="w-4 h-4 ml-auto text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                                </svg>
                                            </a>
                                        </div>

                                        <!-- Right: Description Preview -->
                                        <div
                                            v-if="link.children.some(c => c.description)"
                                            class="w-[280px] p-5 bg-gray-50/50"
                                        >
                                            <template v-if="hoveredChild !== null && link.children[hoveredChild]">
                                                <div
                                                    v-if="link.children[hoveredChild].icon"
                                                    class="w-10 h-10 rounded-lg bg-primary text-white flex items-center justify-center mb-3"
                                                >
                                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" :d="getIconPath(link.children[hoveredChild].icon)" />
                                                    </svg>
                                                </div>
                                                <h4 class="font-bold text-gray-900 mb-2">{{ link.children[hoveredChild].name }}</h4>
                                                <p class="text-sm text-gray-500 leading-relaxed">{{ link.children[hoveredChild].description }}</p>
                                                <a
                                                    :href="$page.props.baseUrl + link.children[hoveredChild].href"
                                                    class="inline-flex items-center gap-1 text-primary font-semibold text-sm mt-4 hover:underline"
                                                >
                                                    Pelajari Lebih Lanjut
                                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                                    </svg>
                                                </a>
                                            </template>
                                            <template v-else>
                                                <p class="text-sm text-gray-400 italic">Arahkan ke menu untuk melihat detail</p>
                                            </template>
                                        </div>
                                    </div>
                                </div>
                            </Transition>
                        </div>

                        <!-- Menu without children → simple link -->
                        <Link
                            v-else
                            :href="$page.props.baseUrl + link.href"
                            :class="[
                                'font-semibold text-[15px] transition-colors px-3 py-2 rounded-lg',
                                i === 0 ? 'text-primary' : 'text-text-main hover:text-primary'
                            ]"
                        >
                            {{ link.name }}
                        </Link>
                    </template>
                </div>

                <div class="hidden lg:flex items-center">
                    <a :href="$page.props.settings?.header_button_url || `${$page.props.baseUrl}/psb`" class="bg-primary text-white px-6 py-2 rounded-full font-semibold text-[15px] hover:bg-blue-800 transition-colors shadow-sm">
                        {{ $page.props.settings?.header_button_text || 'PSB 2025' }}
                    </a>
                </div>

                <!-- Mobile menu button -->
                <button @click="mobileOpen = !mobileOpen" class="lg:hidden rounded-lg p-2 text-gray-500 hover:bg-gray-100 border border-gray-200">
                    <svg v-if="!mobileOpen" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg v-else class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Nav -->
        <div v-if="mobileOpen" class="lg:hidden border-t">
            <div class="px-4 py-3 space-y-1">
                <template v-for="(link, i) in navLinks" :key="link.name">
                    <!-- Menu with children → accordion -->
                    <div v-if="link.children.length > 0">
                        <button
                            @click="toggleMobileSubmenu(i)"
                            class="w-full flex items-center justify-between rounded-lg px-4 py-2.5 font-medium text-text-main hover:bg-blue-50 hover:text-primary"
                        >
                            {{ link.name }}
                            <svg
                                class="w-4 h-4 transition-transform"
                                :class="{ 'rotate-180': mobileExpanded === i }"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div v-if="mobileExpanded === i" class="pl-4 space-y-1 mt-1">
                            <a
                                v-for="child in link.children"
                                :key="child.name"
                                :href="$page.props.baseUrl + child.href"
                                class="flex items-center gap-3 rounded-lg px-4 py-2 text-sm text-gray-600 hover:bg-blue-50 hover:text-primary"
                                @click="mobileOpen = false"
                            >
                                <div v-if="child.icon" class="w-7 h-7 rounded bg-gray-100 flex items-center justify-center flex-shrink-0">
                                    <svg class="w-4 h-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" :d="getIconPath(child.icon)" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-medium">{{ child.name }}</p>
                                    <p v-if="child.description" class="text-xs text-gray-400">{{ child.description }}</p>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Menu without children → simple link -->
                    <Link
                        v-else
                        :href="$page.props.baseUrl + link.href"
                        class="block rounded-lg px-4 py-2.5 font-medium text-text-main hover:bg-blue-50 hover:text-primary"
                        @click="mobileOpen = false"
                    >
                        {{ link.name }}
                    </Link>
                </template>

                <a :href="$page.props.settings?.header_button_url || `${$page.props.baseUrl}/psb`" class="block rounded-lg px-4 py-2 font-medium text-white bg-primary text-center mt-4">
                    {{ $page.props.settings?.header_button_text || 'PSB 2025' }}
                </a>
            </div>
        </div>
    </nav>
</template>
