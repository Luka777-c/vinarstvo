<?php

namespace App\Http\Controllers;

use App\Http\Requests\FermentacijaStoreRequest;
use App\Http\Requests\FermentacijaUpdateRequest;
use App\Models\Fermentacija;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FermentacijaController extends Controller
{
    public function index(): View
    {
        $fermentacije = \App\Models\Fermentacija::with('partijaGrozdja')->get();
        return view('fermentacija.index', compact('fermentacije'));
    }

    public function create(Request $request): Response
    {
        return view('fermentacija.create');
    }

    public function store(FermentacijaStoreRequest $request): Response
    {
        $fermentacija = Fermentacija::create($request->validated());

        $request->session()->flash('fermentacija.id', $fermentacija->id);

        return redirect()->route('fermentacijas.index');
    }

    public function edit(Request $request, Fermentacija $fermentacija): Response
    {
        return view('fermentacija.edit', [
            'fermentacija' => $fermentacija,
        ]);
    }

    public function update(FermentacijaUpdateRequest $request, Fermentacija $fermentacija): Response
    {
        $fermentacija->update($request->validated());

        $request->session()->flash('fermentacija.id', $fermentacija->id);

        return redirect()->route('fermentacijas.index');
    }

    public function destroy(Request $request, Fermentacija $fermentacija): Response
    {
        $fermentacija->delete();

        return redirect()->route('fermentacijas.index');
    }
}
