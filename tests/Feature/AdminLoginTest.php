<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Livewire\Livewire;
use Tests\TestCase;
use Filament\Pages\Auth\Login;

class AdminLoginTest extends TestCase
{
    public function test_can_view_login_page()
    {
        $component = Livewire::test(Login::class)
            ->set('data.email', 'admin@smkn8surabaya.sch.id')
            ->set('data.password', 'password')
            ->set('data.remember', false)
            ->call('authenticate')
            ->assertHasNoErrors()
            ->assertRedirect();
            
        dump($component->errors());
        dump($component->redirectLocation());
    }
}
