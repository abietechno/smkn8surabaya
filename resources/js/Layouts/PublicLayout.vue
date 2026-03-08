<script setup>
import AppTopbar from '@/Components/Public/AppTopbar.vue';
import AppNavbar from '@/Components/Public/AppNavbar.vue';
import AppFooter from '@/Components/Public/AppFooter.vue';
import { usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

const props = defineProps({
    settings: Object,
});

const page = usePage();
const settings = computed(() => props.settings || page.props.settings || {});
</script>

<template>
    <div class="min-h-screen flex flex-col">
        <AppTopbar :settings="settings" />
        <AppNavbar :settings="settings" />
        <main class="flex-1">
            <slot />
        </main>
        <AppFooter :settings="settings" />
    </div>
</template>
