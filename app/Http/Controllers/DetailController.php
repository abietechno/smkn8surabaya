<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;

class DetailController extends Controller
{
    public function index($type): Response
    {
        $modelClass = match($type) {
            'program' => \App\Models\Program::class,
            'fasilitas' => \App\Models\Facility::class,
            'ekskul' => \App\Models\Extracurricular::class,
            'guru' => \App\Models\Teacher::class,
            'staff' => \App\Models\Staff::class,
            default => abort(404),
        };

        $records = $modelClass::active()->get()->map(function($record) {
             return [
                 'id' => $record->id,
                 'title' => $record->name ?? $record->title,
                 'subtitle' => $record->subject ?? $record->role ?? null,
                 'image' => $record->image ?? $record->photo ?? null,
             ];
        });

        $titles = [
            'program' => 'Program Keahlian',
            'fasilitas' => 'Fasilitas Sekolah',
            'ekskul' => 'Ekstrakurikuler',
            'guru' => 'Daftar Guru',
            'staff' => 'Staf & Tenaga Kependidikan',
        ];

        return Inertia::render('GenericList', [
            'items' => $records,
            'pageTitle' => $titles[$type],
            'type' => $type,
        ]);
    }

    public function show($type, $id): Response
    {
        $modelClass = match($type) {
            'program' => \App\Models\Program::class,
            'fasilitas' => \App\Models\Facility::class,
            'ekskul' => \App\Models\Extracurricular::class,
            'guru' => \App\Models\Teacher::class,
            'staff' => \App\Models\Staff::class,
            default => abort(404),
        };

        $record = $modelClass::findOrFail($id);

        $titles = [
            'program' => 'Program Keahlian',
            'fasilitas' => 'Fasilitas Sekolah',
            'ekskul' => 'Ekstrakurikuler',
            'guru' => 'Profil Guru',
            'staff' => 'Profil Staf',
        ];

        $data = [
            'title' => $record->name ?? $record->title,
            'subtitle' => $record->subject ?? $record->role ?? null,
            'image' => $record->image ?? $record->photo ?? null,
            'content' => $record->description ?? '',
            'typeLabel' => $titles[$type],
            'type' => $type,
        ];

        return Inertia::render('GenericDetail', [
            'item' => $data,
        ]);
    }
}
