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

    public function create(Request $request): Response
    {
        return view('bure.create');
    }

    public function store(BureStoreRequest $request): Response
    {
        $bure = Bure::create($request->validated());

        $request->session()->flash('bure.id', $bure->id);

        return redirect()->route('bures.index');
    }

    public function edit(Request $request, Bure $bure): Response
    {
        return view('bure.edit', [
            'bure' => $bure,
        ]);
    }

    public function update(BureUpdateRequest $request, Bure $bure): Response
    {
        $bure->update($request->validated());

        $request->session()->flash('bure.id', $bure->id);

        return redirect()->route('bures.index');
    }

    public function destroy(Request $request, Bure $bure): Response
    {
        $bure->delete();

        return redirect()->route('bures.index');
    }
}
