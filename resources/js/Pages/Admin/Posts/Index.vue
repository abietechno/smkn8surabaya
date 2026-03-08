<script setup>
import { Link, router } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';

defineProps({
    posts: Object,
});

function destroy(id) {
    if (confirm('Yakin ingin menghapus post ini?')) {
        router.delete(`/dashboard/posts/${id}`);
    }
}
</script>

<template>
    <AdminLayout>
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Posts</h1>
                <p class="text-sm text-gray-500 mt-1">Kelola artikel dan berita</p>
            </div>
            <Link
                href="/dashboard/posts/create"
                class="inline-flex items-center gap-2 rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700 transition-colors"
            >
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Post
            </Link>
        </div>

        <div class="rounded-xl border bg-white shadow-sm overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Judul</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Penulis</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Tanggal</th>
                        <th class="px-6 py-3 text-right text-xs font-medium uppercase tracking-wider text-gray-500">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <tr v-for="post in posts.data" :key="post.id" class="hover:bg-gray-50">
                        <td class="px-6 py-4">
                            <div class="text-sm font-medium text-gray-900">{{ post.title }}</div>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ post.author }}</td>
                        <td class="px-6 py-4">
                            <span
                                :class="[
                                    post.status === 'published'
                                        ? 'bg-green-100 text-green-800'
                                        : 'bg-yellow-100 text-yellow-800',
                                    'inline-flex rounded-full px-2 py-1 text-xs font-semibold'
                                ]"
                            >
                                {{ post.status_label }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ post.published_at || post.created_at }}</td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <Link
                                :href="`/dashboard/posts/${post.id}/edit`"
                                class="text-sm text-blue-600 hover:text-blue-800"
                            >
                                Edit
                            </Link>
                            <button
                                @click="destroy(post.id)"
                                class="text-sm text-red-600 hover:text-red-800"
                            >
                                Hapus
                            </button>
                        </td>
                    </tr>
                    <tr v-if="posts.data.length === 0">
                        <td colspan="5" class="px-6 py-8 text-center text-sm text-gray-500">
                            Belum ada post.
                        </td>
                    </tr>
                </tbody>
            </table>

            <!-- Pagination -->
            <div v-if="posts.links.length > 3" class="border-t px-6 py-3 flex items-center justify-between">
                <div class="text-sm text-gray-500">
                    Menampilkan {{ posts.from }} - {{ posts.to }} dari {{ posts.total }}
                </div>
                <div class="flex gap-1">
                    <Link
                        v-for="link in posts.links"
                        :key="link.label"
                        :href="link.url || '#'"
                        :class="[
                            link.active ? 'bg-blue-600 text-white' : 'text-gray-700 hover:bg-gray-100',
                            !link.url ? 'opacity-50 cursor-not-allowed' : '',
                            'rounded px-3 py-1 text-sm'
                        ]"
                        v-html="link.label"
                    />
                </div>
            </div>
        </div>
    </AdminLayout>
</template>
