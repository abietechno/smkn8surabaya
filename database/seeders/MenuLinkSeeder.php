<?php

namespace Database\Seeders;

use App\Models\MenuLink;
use Illuminate\Database\Seeder;

class MenuLinkSeeder extends Seeder
{
    public function run(): void
    {
        $navbarLinks = [
            ['label' => 'Beranda', 'url' => '/', 'children' => []],
            ['label' => 'Profil Kami', 'url' => '#', 'children' => [
                ['label' => 'Sejarah & Visi Misi', 'url' => '/profil', 'description' => 'Mengenal lebih dekat sejarah, visi, dan misi sekolah.', 'icon' => 'academic'],
                ['label' => 'Identitas Sekolah', 'url' => '/identitas', 'description' => 'Informasi detail terkait identitas dan legalitas sekolah.', 'icon' => 'globe'],
                ['label' => 'Staf Pengajar (Guru)', 'url' => '/guru', 'description' => 'Daftar pendidik profesional di sekolah kami.', 'icon' => 'users'],
                ['label' => 'Staf Tenaga Kependidikan', 'url' => '/staff', 'description' => 'Staf administratif dan penunjang.', 'icon' => 'users'],
            ]],
            ['label' => 'Unit Kerja', 'url' => '#', 'children' => [
                ['label' => 'Hubin & BKK', 'url' => '/unit-kerja', 'description' => 'Hubungan Industri dan Bursa Kerja Khusus.', 'icon' => 'server'],
                ['label' => 'Kurikulum', 'url' => '/unit-kerja', 'description' => 'Unit Kurikulum dan Pembelajaran.', 'icon' => 'book'],
                ['label' => 'Kesiswaan', 'url' => '/unit-kerja', 'description' => 'Unit pembinaan siswa dan tata tertib.', 'icon' => 'users'],
                ['label' => 'Sarana Prasarana', 'url' => '/unit-kerja', 'description' => 'Unit Sarana dan Prasarana.', 'icon' => 'device'],
            ]],
            ['label' => 'Agenda', 'url' => '/agenda', 'children' => []],
            ['label' => 'Fasilitas', 'url' => '/fasilitas-unggulan', 'children' => []], // Link edited to match PageSeeder's slug
            ['label' => 'Informasi', 'url' => '/informasi', 'children' => []],
            ['label' => 'Ekstrakurikuler', 'url' => '/ekskul', 'children' => []],
            ['label' => 'Galeri', 'url' => '/galeri', 'children' => []],
            ['label' => 'Kontak', 'url' => '/kontak', 'children' => []],
            ['label' => 'Kelulusan', 'url' => '/kelulusan', 'children' => []],
        ];

        foreach ($navbarLinks as $i => $link) {
            $children = $link['children'] ?? [];
            unset($link['children']);

            $parent = MenuLink::create(array_merge($link, [
                'group' => 'navbar',
                'sort_order' => $i,
                'is_active' => true,
            ]));

            foreach ($children as $j => $child) {
                MenuLink::create(array_merge($child, [
                    'group' => 'navbar',
                    'parent_id' => $parent->id,
                    'sort_order' => $j,
                    'is_active' => true,
                ]));
            }
        }

        $footerLinks = [
            ['label' => 'Profil Sekolah', 'url' => '#', 'children' => [
                ['label' => 'Sejarah & Visi Misi', 'url' => '/profil'],
                ['label' => 'Identitas Sekolah', 'url' => '/identitas'],
                ['label' => 'Fasilitas Unggulan', 'url' => '/fasilitas-unggulan'],
                ['label' => 'Staf Pengajar', 'url' => '/guru'],
                ['label' => 'Tenaga Kependidikan', 'url' => '/staff'],
            ]],
            ['label' => 'Informasi & Layanan', 'url' => '#', 'children' => [
                ['label' => 'Pendaftaran Siswa Baru', 'url' => '/psb'],
                ['label' => 'Agenda Kegiatan', 'url' => '/agenda'],
                ['label' => 'Berita Terbaru', 'url' => '/berita'],
                ['label' => 'Galeri Foto', 'url' => '/galeri'],
                ['label' => 'Hubungi Kami', 'url' => '/kontak'],
            ]],
            ['label' => 'Link Penting', 'url' => '#', 'children' => [
                ['label' => 'Dapodikdasmen', 'url' => 'https://dapo.kemdikbud.go.id/'],
                ['label' => 'Info GTK', 'url' => 'https://info.gtk.kemdikbud.go.id/'],
                ['label' => 'Portal BOS', 'url' => 'https://bos.kemdikbud.go.id/'],
                ['label' => 'Website Kemdikbud', 'url' => 'https://www.kemdikbud.go.id/'],
            ]],
        ];

        foreach ($footerLinks as $i => $link) {
            $children = $link['children'] ?? [];
            unset($link['children']);

            $parent = MenuLink::create(array_merge($link, [
                'group' => 'footer',
                'sort_order' => $i,
                'is_active' => true,
            ]));

            foreach ($children as $j => $child) {
                MenuLink::create(array_merge($child, [
                    'group' => 'footer',
                    'parent_id' => $parent->id,
                    'sort_order' => $j,
                    'is_active' => true,
                ]));
            }
        }
    }
}
