<?php

namespace App\Http\Controllers;

use App\Http\Requests\BureStoreRequest;
use App\Http\Requests\BureUpdateRequest;
use App\Models\Bure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BureController extends Controller
{
    public function index(): View
    {
        $burad = \App\Models\Bure::all();
        return view('bure.index', compact('burad'));
    }

    public function create(Request $request): View
    {
        return view('bure.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'broj_bureta' => 'required|unique:bures,broj_bureta',
            'kapacitet' => 'required|numeric',
            'tip_drveta' => 'required',
            'status' => 'required',
            'napomena' => 'nullable'
        ]);
        Bure::create($validated);

        return redirect()->route('bure.index')->with('success', 'Bure uspešno dodato!');
    }

    public function edit(Request $request, Bure $bure): View
    {
        return view('bure.edit', compact('bure'));
    }

    public function update(Request $request, Bure $bure): RedirectResponse
    {
        $validated = $request->validate([
            'broj_bureta' => 'required|unique:bures,broj_bureta,' . $bure->id,
            'kapacitet' => 'required|numeric',
            'tip_drveta' => 'required',
            'status' => 'required',
            'napomena' => 'nullable'
        ]);

        $bure->update($validated);
        return redirect()->route('bure.index')->with('success', 'Bure uspešno izmenjeno!');
    }

    public function destroy(Request $request, Bure $bure): RedirectResponse
    {
        $bure->delete();

        return redirect()->route('bure.index');
    }

    // detaljni prikaz
    public function show(Bure $bure): View 
    {
        return view('bure.show', compact('bure'));
    }
}
