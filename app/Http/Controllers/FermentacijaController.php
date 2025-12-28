<?php

namespace App\Http\Controllers;

use App\Models\Fermentacija;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FermentacijaController extends Controller
{
    public function index(): View
    {
        $fermentacije = Fermentacija::with('partijaGrozdja')->orderBy('datum', 'desc')->get();

        return view('fermentacija.index', compact('fermentacije'));
    }

    public function create(Request $request): View
    {
        $partije = \App\Models\PartijaGrozdja::all();

        return view('fermentacija.create', compact('partije'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'partija_grozdja_id' => 'required|exists:partija_grozdjas,id',
            'datum' => 'required|date',
            'temperatura' => 'required|numeric',
            'secer' => 'required|numeric',
            'faza' => 'required|string',
            'napomena' => 'nullable|string',
        ]);

        Fermentacija::create($validated);

        return redirect()->route('fermentacija.index')
            ->with('success', 'Zapis fermentacije je uspešno dodat!');
    }

    public function edit(Request $request, Fermentacija $fermentacija): View
    {
        $partije = \App\Models\PartijaGrozdja::all();

        return view('fermentacija.edit', compact('fermentacija', 'partije'));
    }

    public function update(Request $request, Fermentacija $fermentacija): RedirectResponse
    {
        $validated = $request->validate([
            'partija_grozdja_id' => 'required|exists:partija_grozdjas,id',
            'datum' => 'required|date',
            'temperatura' => 'required|numeric',
            'secer' => 'required|numeric',
            'faza' => 'required|string',
            'napomena' => 'nullable|string',
        ]);

        $fermentacija->update($validated);

        return redirect()->route('fermentacija.index')
            ->with('success', 'Zapis fermentacije je uspešno izmenjen.');
    }

    public function destroy(Request $request, Fermentacija $fermentacija): RedirectResponse
    {
        $fermentacija->delete();

        return redirect()->route('fermentacijas.index');
    }
}
