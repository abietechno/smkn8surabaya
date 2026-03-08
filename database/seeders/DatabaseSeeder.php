<?php

namespace Database\Seeders;

use App\Models\Agenda;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $admin = User::factory()->create([
            'name' => 'Admin SMKN 8',
            'email' => 'admin@smkn8surabaya.sch.id',
        ]);

        $this->call(SettingSeeder::class);
        $this->call(PageSeeder::class);
        $this->call(GallerySeeder::class);
        $this->call(MenuLinkSeeder::class);

        Post::factory(10)->published()->for($admin, 'author')->create();
        Post::factory(3)->draft()->for($admin, 'author')->create();

        Agenda::factory(5)->upcoming()->create();
        Agenda::factory(5)->past()->create();
    }
}
