<?php

namespace App\Filament\Admin\Pages;

use App\Models\Setting;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\ColorPicker;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class ManageSettings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCog6Tooth;

    protected static ?string $navigationLabel = 'Settings';

    protected static ?string $title = 'Manage Settings';

    protected static ?int $navigationSort = 100;

    protected string $view = 'filament.admin.pages.manage-settings';

    public ?array $data = [];

    public function mount(): void
    {
        $settings = Setting::all()->pluck('value', 'key')->toArray();

        $this->form->fill($settings);
    }

    public function form(Schema $form): Schema
    {
        return $form
            ->schema([
                Section::make('Informasi Sekolah')
                    ->schema([
                        TextInput::make('school_name')
                            ->label('Nama Sekolah')
                            ->required(),
                        TextInput::make('phone')
                            ->label('Telepon'),
                        TextInput::make('email')
                            ->label('Email')
                            ->email(),
                        Textarea::make('address')
                            ->label('Alamat'),
                        Textarea::make('footer_description')
                            ->label('Deskripsi Singkat Footer')
                            ->rows(3)
                            ->placeholder('Sekolah kebanggaan kita bersama...'),
                        TextInput::make('footer_copyright')
                            ->label('Teks Copyright Footer')
                            ->placeholder('© 2026 NM. All rights reserved.'),
                    ]),
                Section::make('Logo')
                    ->schema([
                        FileUpload::make('site_logo')
                            ->label('Logo Header')
                            ->image()
                            ->disk('public')
                            ->directory('settings'),
                        FileUpload::make('footer_logo')
                            ->label('Logo Footer')
                            ->image()
                            ->disk('public')
                            ->directory('settings'),
                    ]),
                Section::make('Desain Footer')
                    ->schema([
                        Select::make('footer_bg_type')
                            ->label('Tipe Latar Belakang')
                            ->options([
                                'solid' => 'Warna Solid',
                                'gradient' => 'Gradasi (Gradient)',
                            ])
                            ->default('solid')
                            ->required()
                            ->live(),
                        ColorPicker::make('footer_bg_color_1')
                            ->label('Warna 1 (Utama)')
                            ->default('#1e3a8a') // blue-900 equivalent
                            ->required(),
                        ColorPicker::make('footer_bg_color_2')
                            ->label('Warna 2 (Untuk Gradasi)')
                            ->default('#1d4ed8') // blue-700 equivalent
                            ->visible(fn (Get $get) => $get('footer_bg_type') === 'gradient'),
                    ])->columns(3),
                Section::make('Sambutan Kepala Sekolah')
                    ->schema([
                        TextInput::make('principal_name')
                            ->label('Nama Kepala Sekolah')
                            ->placeholder('Ahmad Hidayat Ali, M.Pd'),
                        TextInput::make('principal_title')
                            ->label('Jabatan')
                            ->placeholder('Kepala Sekolah'),
                        FileUpload::make('principal_photo')
                            ->label('Foto Kepala Sekolah')
                            ->image()
                            ->disk('public')
                            ->directory('settings'),
                        Textarea::make('principal_greeting')
                            ->label('Teks Sambutan')
                            ->rows(4),
                        TextInput::make('principal_url')
                            ->label('URL Selengkapnya')
                            ->placeholder('/profil'),
                    ]),
                Section::make('Statistik Sekolah')
                    ->schema([
                        TextInput::make('stat_teachers')
                            ->label('Jumlah Guru & Staf')
                            ->numeric()
                            ->placeholder('75'),
                        TextInput::make('stat_students')
                            ->label('Jumlah Siswa')
                            ->numeric()
                            ->placeholder('1250'),
                        TextInput::make('stat_classes')
                            ->label('Jumlah Rombel')
                            ->numeric()
                            ->placeholder('45'),
                    ]),
                Section::make('Tombol Header (CTA)')
                    ->schema([
                        TextInput::make('header_button_text')
                            ->label('Teks Tombol (Contoh: PSB 2025)')
                            ->placeholder('PSB 2025'),
                        TextInput::make('header_button_url')
                            ->label('Link/URL Tujuan')
                            ->placeholder('/psb atau https://...'),
                    ]),
                Section::make('Hero Section')
                    ->schema([
                        TextInput::make('hero_text')
                            ->label('Hero Text'),
                        TextInput::make('hero_subtext')
                            ->label('Hero Subtext'),
                    ]),
                Section::make('Social Media')
                    ->schema([
                        TextInput::make('social_whatsapp')
                            ->label('WhatsApp URL')
                            ->url()
                            ->placeholder('https://wa.me/628xxx'),
                        TextInput::make('social_instagram')
                            ->label('Instagram URL')
                            ->url()
                            ->placeholder('https://instagram.com/...'),
                        TextInput::make('social_facebook')
                            ->label('Facebook URL')
                            ->url()
                            ->placeholder('https://facebook.com/...'),
                        TextInput::make('social_twitter')
                            ->label('Twitter / X URL')
                            ->url()
                            ->placeholder('https://twitter.com/...'),
                        TextInput::make('social_youtube')
                            ->label('YouTube URL')
                            ->url()
                            ->placeholder('https://youtube.com/...'),
                        TextInput::make('social_tiktok')
                            ->label('TikTok URL')
                            ->url()
                            ->placeholder('https://tiktok.com/...'),
                    ]),
                Section::make('Kontak & Lokasi')
                    ->description('Pengaturan lokasi peta Google Maps untuk halaman Kontak.')
                    ->schema([
                        Textarea::make('contact_map_iframe')
                            ->label('Iframe Embed Google Maps')
                            ->rows(5)
                            ->placeholder('<iframe src="https://www.google.com/maps/embed?pb=..." width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>')
                            ->columnSpanFull(),
                    ]),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        foreach ($data as $key => $value) {
            Setting::set($key, $value);
        }

        \Illuminate\Support\Facades\Cache::forget('homepage_data');
        \Illuminate\Support\Facades\Cache::forget('global_settings');

        Notification::make()
            ->title('Settings berhasil disimpan')
            ->success()
            ->send();
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label('Simpan')
                ->submit('save'),
        ];
    }
}
