<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $defaults = [
            'school_name' => 'SMKN 8 Surabaya',
            'phone' => '(031) 8291431',
            'email' => 'info@smkn8surabaya.sch.id',
            'address' => 'Jl. Kamboja No.18, Surabaya, Jawa Timur',
            'hero_text' => 'Selamat Datang di Website Resmi SMKN 8 Surabaya',
            'hero_subtext' => 'Mewujudkan Generasi Unggul, Berkarakter, dan Siap Kerja',
            'contact_map_iframe' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.5701763172824!2d112.74836691477521!3d-7.289650094738522!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fbcf83d2cb2f%3A0xe543db54ea3d778d!2sSMK%20Negeri%208%20Surabaya!5e0!3m2!1sen!2sid!4v167233215915!5m2!1sen!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            'social_whatsapp' => 'https://wa.me/628123456789',
            'social_instagram' => 'https://instagram.com/smkn8surabaya',
            'social_facebook' => 'https://facebook.com/smkn8surabaya',
            'social_youtube' => 'https://youtube.com/@smkn8surabaya',
            'social_tiktok' => 'https://tiktok.com/@smkn8surabaya',
            'social_twitter' => 'https://twitter.com/smkn8surabaya',
        ];

        foreach ($defaults as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value],
            );
        }
    }
}
