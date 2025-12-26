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
        $partije = \App\Models\PartijaGrozdja::all();
        return view('partijaGrozdja.index', compact('partije'));
    }

    public function create(Request $request): Response
    {
        return view('partijaGrozdja.create');
    }

    public function store(PartijaGrozdjaStoreRequest $request): Response
    {
        $partijaGrozdja = PartijaGrozdja::create($request->validated());

        $request->session()->flash('partijaGrozdja.id', $partijaGrozdja->id);

        return redirect()->route('partijaGrozdjas.index');
    }

    public function edit(Request $request, PartijaGrozdja $partijaGrozdja): Response
    {
        return view('partijaGrozdja.edit', [
            'partijaGrozdja' => $partijaGrozdja,
        ]);
    }

    public function update(PartijaGrozdjaUpdateRequest $request, PartijaGrozdja $partijaGrozdja): Response
    {
        $partijaGrozdja->update($request->validated());

        $request->session()->flash('partijaGrozdja.id', $partijaGrozdja->id);

        return redirect()->route('partijaGrozdjas.index');
    }

    public function destroy(Request $request, PartijaGrozdja $partijaGrozdja): Response
    {
        $partijaGrozdja->delete();

        return redirect()->route('partijaGrozdjas.index');
    }
}
