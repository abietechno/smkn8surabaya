<script setup>
import { useForm, Link } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';

const form = useForm({
    title: '',
    excerpt: '',
    content: '',
    image: null,
    status: 'draft',
});

function submit() {
    form.post('/dashboard/posts');
}
</script>

<template>
    <AdminLayout>
        <div class="mb-6">
            <Link href="/dashboard/posts" class="text-sm text-blue-600 hover:text-blue-800">&larr; Kembali ke Posts</Link>
            <h1 class="text-2xl font-bold text-gray-900 mt-2">Tambah Post Baru</h1>
        </div>

        <form @submit.prevent="submit" class="max-w-3xl rounded-xl border bg-white p-6 shadow-sm space-y-6">
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Judul</label>
                <input
                    id="title"
                    v-model="form.title"
                    type="text"
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                    required
                />
                <p v-if="form.errors.title" class="mt-1 text-sm text-red-600">{{ form.errors.title }}</p>
            </div>

            <div>
                <label for="excerpt" class="block text-sm font-medium text-gray-700">Ringkasan</label>
                <textarea
                    id="excerpt"
                    v-model="form.excerpt"
                    rows="2"
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                ></textarea>
                <p v-if="form.errors.excerpt" class="mt-1 text-sm text-red-600">{{ form.errors.excerpt }}</p>
            </div>

            <div>
                <label for="content" class="block text-sm font-medium text-gray-700">Konten</label>
                <textarea
                    id="content"
                    v-model="form.content"
                    rows="10"
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                    required
                ></textarea>
                <p v-if="form.errors.content" class="mt-1 text-sm text-red-600">{{ form.errors.content }}</p>
            </div>

            <div>
                <label for="image" class="block text-sm font-medium text-gray-700">Gambar</label>
                <input
                    id="image"
                    type="file"
                    accept="image/*"
                    @input="form.image = $event.target.files[0]"
                    class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:rounded-lg file:border-0 file:bg-blue-50 file:px-4 file:py-2 file:text-sm file:font-medium file:text-blue-700 hover:file:bg-blue-100"
                />
                <p v-if="form.errors.image" class="mt-1 text-sm text-red-600">{{ form.errors.image }}</p>
            </div>

            <div>
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <select
                    id="status"
                    v-model="form.status"
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                >
                    <option value="draft">Draft</option>
                    <option value="published">Published</option>
                </select>
                <p v-if="form.errors.status" class="mt-1 text-sm text-red-600">{{ form.errors.status }}</p>
            </div>

            <div class="flex items-center gap-3 pt-4 border-t">
                <button
                    type="submit"
                    :disabled="form.processing"
                    class="inline-flex items-center rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700 disabled:opacity-50 transition-colors"
                >
                    Simpan
                </button>
                <Link href="/dashboard/posts" class="text-sm text-gray-500 hover:text-gray-700">Batal</Link>
            </div>
        </form>
    </AdminLayout>
</template>
