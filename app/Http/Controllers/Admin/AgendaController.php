<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class AgendaController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Admin/Agendas/Index', [
            'agendas' => Agenda::latest('date')
                ->paginate(10)
                ->through(fn ($agenda) => [
                    'id' => $agenda->id,
                    'title' => $agenda->title,
                    'date' => $agenda->date->translatedFormat('d F Y, H:i'),
                    'location' => $agenda->location,
                    'created_at' => $agenda->created_at->translatedFormat('d F Y'),
                ]),
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Admin/Agendas/Create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'location' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        Agenda::create($validated);

        return redirect()->route('admin.agendas.index')->with('success', 'Agenda berhasil dibuat.');
    }

    public function edit(Agenda $agenda): Response
    {
        return Inertia::render('Admin/Agendas/Edit', [
            'agenda' => [
                'id' => $agenda->id,
                'title' => $agenda->title,
                'date' => $agenda->date->format('Y-m-d\TH:i'),
                'location' => $agenda->location,
                'description' => $agenda->description,
            ],
        ]);
    }

    public function update(Request $request, Agenda $agenda): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'location' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $agenda->update($validated);

        return redirect()->route('admin.agendas.index')->with('success', 'Agenda berhasil diperbarui.');
    }

    public function destroy(Agenda $agenda): RedirectResponse
    {
        $agenda->delete();

        return redirect()->route('admin.agendas.index')->with('success', 'Agenda berhasil dihapus.');
    }
}
