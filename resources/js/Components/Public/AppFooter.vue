<script setup>
import { usePage, Link } from '@inertiajs/vue3';
import { computed } from 'vue';

const props = defineProps({
    settings: Object,
});

const page = usePage();
const settings = computed(() => props.settings || page.props.settings || {});

const footerLinks = computed(() => {
    return page.props.footerLinks || [];
});

const logoUrl = computed(() => {
    const s = settings.value;
    if (s?.footer_logo) {
        return `${page.props.baseUrl}/storage/${s.footer_logo}`;
    }
    return null;
});

const footerStyle = computed(() => {
    const s = settings.value;
    const type = s.footer_bg_type || 'solid';
    const color1 = s.footer_bg_color_1 || '#000000';
    const color2 = s.footer_bg_color_2 || '#1d4ed8';
    
    if (type === 'gradient') {
        return { background: `linear-gradient(to right, ${color1}, ${color2})` };
    }
    return { backgroundColor: color1 };
});

const socials = computed(() => {
    const s = settings.value;
    return [
        { name: 'WhatsApp', url: s.social_whatsapp, color: 'text-green-500', path: 'M12.031 0C5.38 0 0 5.38 0 12.031c0 2.128.552 4.192 1.6 6.015L.23 23.479l5.578-1.464c1.758.956 3.737 1.46 5.765 1.46h.004c6.649 0 12.03-5.38 12.03-12.031A12.031 12.031 0 0012.031 0zM12.03 21.465a10.015 10.015 0 01-5.115-1.401l-.367-.218-3.8.997 1.015-3.705-.238-.38A10.023 10.023 0 012.016 12.03c0-5.524 4.498-10.02 10.02-10.02 2.677 0 5.196 1.042 7.087 2.936a10.026 10.026 0 012.935 7.087c-.004 5.518-4.5 10.01-10.024 10.032zm5.503-7.525c-.302-.151-1.789-.882-2.065-.983-.276-.1-4.782-.1-5.058.151s-1.054 1.03-1.28 1.232c-.226.201-.453.226-.755.075-.302-.15-1.277-.47-2.433-1.5-.9-.801-1.507-1.79-1.683-2.091-.176-.302-.019-.465.132-.615.136-.135.302-.352.453-.528.151-.176.201-.301.302-.502.1-.201.05-.377-.025-.528-.075-.15-.678-1.633-.93-2.235-.245-.588-.493-.509-.678-.518-.176-.008-.377-.008-.578-.008a1.114 1.114 0 00-.804.377c-.276.302-1.054 1.03-1.054 2.512s1.08 2.913 1.23 3.114c.15.201 2.124 3.243 5.144 4.545.719.31 1.28.495 1.717.633.722.23 1.38.197 1.895.12.576-.086 1.789-.73 2.04-1.432.251-.703.251-1.306.176-1.432-.075-.126-.276-.201-.578-.352z' },
        { name: 'Facebook', url: s.social_facebook, color: 'text-blue-600', path: 'M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z' },
        { name: 'Twitter', url: s.social_twitter, color: 'text-blue-400', path: 'M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z' },
        { name: 'Instagram', url: s.social_instagram, color: 'text-pink-600', path: 'M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z' },
        { name: 'YouTube', url: s.social_youtube, color: 'text-red-600', path: 'M23.498 6.186a3.016 3.016 0 00-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 002.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 002.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z' },
        { name: 'TikTok', url: s.social_tiktok, color: 'text-pink-500', path: 'M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z' }
    ].filter(i => i.url);
});
</script>

<template>
    <footer class="text-gray-200" :style="footerStyle">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
                <!-- Left Column: School Info & Socials -->
                <div class="md:col-span-2">
                    <div class="flex items-center gap-4 mb-6">
                        <img v-if="logoUrl" :src="logoUrl" alt="logo" class="max-h-16 bg-white p-2 rounded-lg shadow-sm">
                        <template v-else>
                            <div class="h-12 w-12 rounded-lg bg-white flex items-center justify-center text-primary font-bold text-xl shadow-sm">
                                S8
                            </div>
                            <div>
                                <h3 class="font-bold text-white text-xl leading-tight">{{ settings?.school_name || 'SMKN 8 Surabaya' }}</h3>
                                <p v-if="settings?.address" class="text-xs text-gray-300">{{ settings.address }}</p>
                            </div>
                        </template>
                    </div>
                    
                    <p class="text-sm text-gray-300 leading-relaxed mb-8 max-w-md">
                        {{ settings?.footer_description || 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.' }}
                    </p>

                    <div>
                        <h4 class="font-bold text-white mb-4">Sosial Media</h4>
                        <div class="flex items-center gap-3">
                            <a 
                                v-for="social in socials" 
                                :key="social.name"
                                :href="social.url" 
                                target="_blank"
                                class="w-8 h-8 rounded-full bg-white flex items-center justify-center transition-transform hover:scale-110 shadow-sm"
                                :class="social.color"
                                :title="social.name"
                            >
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path :d="social.path"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Right Columns: Dynamic Menu Links -->
                <div v-for="group in footerLinks" :key="group.id" class="md:col-span-1">
                    <h3 class="font-bold text-white text-lg mb-6">{{ group.label }}</h3>
                    <ul class="space-y-3 text-sm">
                        <li v-for="link in group.active_children" :key="link.id">
                            <Link 
                                :href="link.url.startsWith('http') ? link.url : `${$page.props.baseUrl}${link.url}`" 
                                class="text-gray-300 hover:text-white transition-colors"
                            >
                                {{ link.label }}
                            </Link>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-white/10 mt-12 pt-8 flex justify-center text-sm font-medium text-gray-300">
                <span>
                    <span v-if="settings?.footer_copyright">{{ settings.footer_copyright }}</span>
                    <span v-else>&copy; {{ new Date().getFullYear() }} {{ settings?.school_name || 'SMKN 8 Surabaya' }}. All rights reserved.</span>
                </span>
            </div>
        </div>
    </footer>
</template>
