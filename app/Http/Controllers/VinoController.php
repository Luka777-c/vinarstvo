<?php

namespace App\Http\Controllers;

use App\Models\Vino;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VinoController extends Controller
{
    public function index(): View
    {
        $vina = \App\Models\Vino::with(['partijaGrozdja', 'bure'])->latest()->get();

        return view('vino.index', compact('vina'));
    }

    public function create(Request $request): View
    {
        $partije = \App\Models\PartijaGrozdja::all();
        $burad = \App\Models\Bure::all();

        return view('vino.create', compact('partije', 'burad'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'naziv' => 'required|string|max:255',
            'tip' => 'required|string',
            'kolicina' => 'required|numeric',
            'datum_proizvodnje' => 'required|date',
            'partija_grozdja_id' => 'required|exists:partija_grozdjas,id',
            'bure_id' => 'required|exists:bures,id',
        ]);

        \App\Models\Vino::create($validated);

        return redirect()->route('vino.index')->with('success', 'Vino uspešno dodato.');
    }

    public function edit(Request $request, Vino $vino): View
    {
        $partije = \App\Models\PartijaGrozdja::all();
        $burad = \App\Models\Bure::all();

        return view('vino.edit', compact('partije', 'burad', 'vino'));
    }

    public function update(Request $request, Vino $vino): RedirectResponse
    {
        $validated = $request->validate([
            'naziv' => 'required|string|max:255',
            'tip' => 'required|string',
            'kolicina' => 'required|numeric',
            'datum_proizvodnje' => 'required|date',
            'partija_grozdja_id' => 'required|exists:partija_grozdjas,id',
            'bure_id' => 'required|exists:bures,id',
        ]);

        $vino->update($validated);

        return redirect()->route('vino.index')->with('success', 'Vino uspešno izmenjeno.');
    }

    public function destroy(Request $request, Vino $vino): RedirectResponse
    {
        $vino->delete();

        return redirect()->route('vino.index')->with('success', 'Vino obrisano iz evidencije.');
    }
}
