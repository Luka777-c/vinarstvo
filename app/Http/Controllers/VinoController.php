<?php

namespace App\Http\Controllers;

use App\Http\Requests\VinoStoreRequest;
use App\Http\Requests\VinoUpdateRequest;
use App\Models\Vino;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VinoController extends Controller
{
    public function index(): View
    {
        $vinos = \App\Models\Vino::with(['partijaGrozdja', 'bure'])->get();
        return view('vino.index', compact('vinos'));
    }

    public function create(Request $request): View
    {
        return view('vino.create');
    }

    public function store(VinoStoreRequest $request): RedirectResponse
    {
        $vino = Vino::create($request->validated());

        $request->session()->flash('vino.id', $vino->id);

        return redirect()->route('vinos.index');
    }

    public function edit(Request $request, Vino $vino): View
    {
        return view('vino.edit', [
            'vino' => $vino,
        ]);
    }

    public function update(VinoUpdateRequest $request, Vino $vino): RedirectResponse
    {
        $vino->update($request->validated());

        $request->session()->flash('vino.id', $vino->id);

        return redirect()->route('vinos.index');
    }

    public function destroy(Request $request, Vino $vino): RedirectResponse
    {
        $vino->delete();

        return redirect()->route('vinos.index');
    }
}
