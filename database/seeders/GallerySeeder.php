<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $galleries = [
            [
                'title' => 'Kegiatan Sekolah 2024',
                'slug' => 'kegiatan-sekolah-2024',
                'description' => '<p>Dokumentasi berbagai kegiatan akademik dan non-akademik siswa-siswi sepanjang tahun 2024 yang penuh inspirasi dan prestasi.</p>',
                'is_active' => true,
                'cover_image' => null,
                'images' => json_encode([
                    'https://images.unsplash.com/photo-1577896851231-70ef18881754?q=80&w=2670&auto=format&fit=crop',
                    'https://images.unsplash.com/photo-1509062522246-3755977927d7?q=80&w=2664&auto=format&fit=crop',
                    'https://images.unsplash.com/photo-1544207936-2580dfaa3257?q=80&w=2574&auto=format&fit=crop',
                ]),
            ],
            [
                'title' => 'Perkemahan Siswa',
                'slug' => 'perkemahan-siswa',
                'description' => '<p>Potret keseruan acara perkemahan tahunan kepramukaan yang melatih kemandirian, kekompakan, dan kecintaan pada alam sekitar.</p>',
                'is_active' => true,
                'cover_image' => null,
                'images' => json_encode([
                    'https://images.unsplash.com/photo-1523987355523-c7b5b0dd90a7?q=80&w=2670&auto=format&fit=crop',
                    'https://images.unsplash.com/photo-1478131143081-80f7f84ca84d?q=80&w=2670&auto=format&fit=crop',
                    'https://images.unsplash.com/photo-1533514114760-4389f572ae26?q=80&w=2752&auto=format&fit=crop',
                ]),
            ],
            [
                'title' => 'Kegiatan Sekolah 2023',
                'slug' => 'kegiatan-sekolah-2023',
                'description' => '<p>Arsip kegiatan edukatif inspiratif yang diselenggarakan selama tahun pelajaran 2023.</p>',
                'is_active' => true,
                'cover_image' => null,
                'images' => json_encode([
                    'https://images.unsplash.com/photo-1427504494785-3a9ca7044f45?q=80&w=2670&auto=format&fit=crop',
                    'https://images.unsplash.com/photo-1497633762265-9d179a990aa6?q=80&w=2673&auto=format&fit=crop',
                ]),
            ],
            [
                'title' => 'Kegiatan Sekolah 2022',
                'slug' => 'kegiatan-sekolah-2022',
                'description' => '<p>Kilas balik pencapaian dan semarak kegiatan sekolah pada masa transisi pasca pandemi di tahun 2022.</p>',
                'is_active' => true,
                'cover_image' => null,
                'images' => json_encode([
                    'https://images.unsplash.com/photo-1453728013993-6d66e9c9123a?q=80&w=2670&auto=format&fit=crop',
                    'https://images.unsplash.com/photo-1511629091441-ee46146481b6?q=80&w=2670&auto=format&fit=crop',
                ]),
            ],
        ];

        foreach ($galleries as $gallery) {
            \App\Models\Gallery::updateOrCreate(
                ['slug' => $gallery['slug']],
                $gallery
            );
        }
    }
}
