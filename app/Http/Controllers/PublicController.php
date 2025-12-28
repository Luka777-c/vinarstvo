<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index() {
        return view('welcome');
    }

    public function vinoteka() {
        $vina = \App\Models\Vino::all();
        return view('public.vinoteka', compact('vina'));
    }

    public function podrum() {
        $burad = \App\Models\Bure::all();
        return view('public.podrum', compact('burad'));
    }

    public function sortastatistika() {
        $statistika = \App\Models\PartijaGrozdja::select('sorta')
            ->selectRaw('SUM(kolicina) as ukupno_kg')
            ->groupBy('sorta')
            ->get();
        
        return view('public.sortastatistika', compact('statistika'));
    }
}
