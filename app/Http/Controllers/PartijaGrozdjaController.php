<?php

namespace App\Http\Controllers;

use App\Http\Requests\PartijaGrozdjaStoreRequest;
use App\Http\Requests\PartijaGrozdjaUpdateRequest;
use App\Models\PartijaGrozdja;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PartijaGrozdjaController extends Controller
{
    public function index(): View
    {
        $partije = PartijaGrozdja::all();
        return view('partija-grozdja.index', compact('partije'));
    }

    public function create(): View
    {
        return view('partija-grozdja.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'sorta'    => 'required|string|max:100',
            'kolicina' => 'required|integer|min:1',
            'datum'    => 'required|date',
            'napomena' => 'nullable|string',
        ]);

        $validated['status'] = 'prijem';

        PartijaGrozdja::create($validated);

        return redirect()->route('partija-grozdja.index')->with('success', 'Partija uspešno dodata!');
    }

    public function edit(PartijaGrozdja $partija_grozdja): View
    {
        return view('partija-grozdja.edit', ['partija' => $partija_grozdja]);
    }

    public function update(Request $request, PartijaGrozdja $partija_grozdja): RedirectResponse
    {
        $validated = $request->validate([
            'sorta'    => 'required|string|max:100',
            'kolicina' => 'required|integer|min:1',
            'datum'    => 'required|date',
            'status'    => 'required|string|in:prijem,u_obradi,zavrseno',
            'napomena' => 'nullable|string',
        ]);

        $partija_grozdja->update($validated);

        return redirect()->route('partija-grozdja.index')->with('success', 'Partija uspešno izmenjena!');
    }

    public function destroy(PartijaGrozdja $partija_grozdja): RedirectResponse
    {
        $partija_grozdja->delete();
        return redirect()->route('partija-grozdja.index');
    }

    // detaljni prikaz
    public function show(PartijaGrozdja $partija_grozdja): View
    {
        return view('partija-grozdja.show', ['partija' => $partija_grozdja]);
    }
}
