<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Setting;
use Inertia\Inertia;
use Inertia\Response;

class AgendaController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Agendas/Index', [
            'upcoming' => Agenda::upcoming()
                ->paginate(10)
                ->through(fn ($agenda) => [
                    'id' => $agenda->id,
                    'title' => $agenda->title,
                    'date' => $agenda->date->translatedFormat('d F Y, H:i'),
                    'location' => $agenda->location,
                    'description' => $agenda->description,
                ]),
            'settings' => Setting::all()->pluck('value', 'key'),
        ]);
    }
}
