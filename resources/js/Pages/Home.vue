<script setup>
import PublicLayout from '@/Layouts/PublicLayout.vue';
import HeroSlider from '@/Components/Public/HeroSlider.vue';
import PrincipalWelcome from '@/Components/Public/PrincipalWelcome.vue';
import NewsGrid from '@/Components/Public/NewsGrid.vue';
import AgendaSidebar from '@/Components/Public/AgendaSidebar.vue';
import TeachersGrid from '@/Components/Public/TeachersGrid.vue';
import StaffList from '@/Components/Public/StaffList.vue';
import ProgramsGrid from '@/Components/Public/ProgramsGrid.vue';
import FacilitiesGrid from '@/Components/Public/FacilitiesGrid.vue';
import ExtracurricularsGrid from '@/Components/Public/ExtracurricularsGrid.vue';

defineProps({
    sliders: { type: Array, default: () => [] },
    posts: Array,
    agendas: Array,
    teachers: { type: Array, default: () => [] },
    staff: { type: Array, default: () => [] },
    programs: { type: Array, default: () => [] },
    facilities: { type: Array, default: () => [] },
    extracurriculars: { type: Array, default: () => [] },
    settings: Object,
});
</script>

<template>
    <PublicLayout :settings="settings">
        <HeroSlider
            :sliders="sliders"
            :hero-text="settings?.hero_text"
            :hero-subtext="settings?.hero_subtext"
        />
        <PrincipalWelcome :settings="settings" />
        <AgendaSidebar :agendas="agendas" />
        <NewsGrid :posts="posts" />
        <TeachersGrid :teachers="teachers" />
        <StaffList :staff="staff" />
        <ProgramsGrid :programs="programs" />
        <FacilitiesGrid :facilities="facilities" />
        <ExtracurricularsGrid :extracurriculars="extracurriculars" />
    </PublicLayout>
</template>
