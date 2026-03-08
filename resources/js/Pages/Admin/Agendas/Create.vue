<script setup>
import { useForm, Link } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';

const form = useForm({
    title: '',
    date: '',
    location: '',
    description: '',
});

function submit() {
    form.post('/dashboard/agendas');
}
</script>

<template>
    <AdminLayout>
        <div class="mb-6">
            <Link href="/dashboard/agendas" class="text-sm text-blue-600 hover:text-blue-800">&larr; Kembali ke Agendas</Link>
            <h1 class="text-2xl font-bold text-gray-900 mt-2">Tambah Agenda Baru</h1>
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
                <label for="date" class="block text-sm font-medium text-gray-700">Tanggal & Waktu</label>
                <input
                    id="date"
                    v-model="form.date"
                    type="datetime-local"
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                    required
                />
                <p v-if="form.errors.date" class="mt-1 text-sm text-red-600">{{ form.errors.date }}</p>
            </div>

            <div>
                <label for="location" class="block text-sm font-medium text-gray-700">Lokasi</label>
                <input
                    id="location"
                    v-model="form.location"
                    type="text"
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                />
                <p v-if="form.errors.location" class="mt-1 text-sm text-red-600">{{ form.errors.location }}</p>
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea
                    id="description"
                    v-model="form.description"
                    rows="4"
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                ></textarea>
                <p v-if="form.errors.description" class="mt-1 text-sm text-red-600">{{ form.errors.description }}</p>
            </div>

            <div class="flex items-center gap-3 pt-4 border-t">
                <button
                    type="submit"
                    :disabled="form.processing"
                    class="inline-flex items-center rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700 disabled:opacity-50 transition-colors"
                >
                    Simpan
                </button>
                <Link href="/dashboard/agendas" class="text-sm text-gray-500 hover:text-gray-700">Batal</Link>
            </div>
        </form>
    </AdminLayout>
</template>
