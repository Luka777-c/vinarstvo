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
    public function index(Request $request): Response
    {
        $vinos = Vino::all();

        return view('vino.index', [
            'vinos' => $vinos,
        ]);
    }

    public function create(Request $request): Response
    {
        return view('vino.create');
    }

    public function store(VinoStoreRequest $request): Response
    {
        $vino = Vino::create($request->validated());

        $request->session()->flash('vino.id', $vino->id);

        return redirect()->route('vinos.index');
    }

    public function edit(Request $request, Vino $vino): Response
    {
        return view('vino.edit', [
            'vino' => $vino,
        ]);
    }

    public function update(VinoUpdateRequest $request, Vino $vino): Response
    {
        $vino->update($request->validated());

        $request->session()->flash('vino.id', $vino->id);

        return redirect()->route('vinos.index');
    }

    public function destroy(Request $request, Vino $vino): Response
    {
        $vino->delete();

        return redirect()->route('vinos.index');
    }
}
