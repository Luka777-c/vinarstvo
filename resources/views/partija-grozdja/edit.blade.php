{{--
    @extends('layouts.app')

    @section('content')
        partijaGrozdja.edit template
    @endsection
--}}

<x-app-layout>
    <div class="min-h-screen w-full" style="background-color: #F5F1E9;">
        <div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
            
            <div class="flex justify-between items-center mb-16">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#4C1C24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-barrel-icon lucide-barrel"><path d="M10 3a41 41 0 0 0 0 18"/><path d="M14 3a41 41 0 0 1 0 18"/><path d="M17 3a2 2 0 0 1 1.68.92 15.25 15.25 0 0 1 0 16.16A2 2 0 0 1 17 21H7a2 2 0 0 1-1.68-.92 15.25 15.25 0 0 1 0-16.16A2 2 0 0 1 7 3z"/><path d="M3.84 17h16.32"/><path d="M3.84 7h16.32"/></svg>

                    <h1 style="font-weight: 500; margin: 1em 0.5em; color: #000; font-size: 3rem; line-height: 1;">
                        Partija grožđa
                    </h1>
                </div>
                <a href="{{ route('partija-grozdja.index') }}" 
                   class="p-2 text-white text-2xl font-semibold rounded-lg" 
                   style="margin-right: 1rem; background-color: #4A1D1D;">
                    < Nazad na listu
                </a>
            </div>

            <div class="max-w-5xl mx-auto bg-[#F5F1E9] overflow-hidden">
                <form action="{{ route('partija-grozdja.update', $partija->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="flex items-center p-8">
                        <label class="text-3xl font-medium w-1/3">Sorta grožđa:</label>

                        <select name="sorta" class="w-2/3 bg-white rounded-lg h-12 text-2xl px-4">
                            <option value="Vranac" {{ $partija->sorta == 'Vranac' ? 'selected' : '' }}>Vranac</option>
                            <option value="Chardonnay" {{ $partija->sorta == 'Chardonnay' ? 'selected' : '' }}>Chardonnay</option>
                            <option value="Tamjanika" {{ $partija->sorta == 'Tamjanika' ? 'selected' : '' }}>Tamjanika</option>
                            <option value="Cabernet Sauvignon" {{ $partija->sorta == 'Cabernet Sauvignon' ? 'selected' : '' }}>Cabernet Sauvignon</option>
                            <option value="Merlot" {{ $partija->sorta == 'Merlot' ? 'selected' : '' }}>Merlot</option>
                        </select>
                    </div>

                    <div class="flex mt-2 items-center p-8">
                        <label class="text-3xl font-medium w-1/3">Količina (kg):</label>
                        <input type="number" name="kolicina" value="{{ $partija->kolicina }}" class="w-48 bg-white rounded-lg h-12 text-2xl px-4">
                    </div>

                    <div class="flex mt-2 items-center p-8">
                        <label class="text-3xl font-medium w-1/3">Datum prijema:</label>
                        <input type="date" name="datum" value="{{ $partija->datum->format('Y-m-d') }}" class="w-64 bg-white border rounded-lg h-12 text-2xl px-4">
                    </div>

                    <div class="flex mt-2 items-center p-8">
                        <label class="text-3xl font-medium w-1/3">Status:</label>
                        <input type="text" name="status" value="{{ $partija->status }}" class="w-2/3 bg-white rounded-lg h-12 text-2xl px-4">
                    </div>

                    <div class="flex mt-2 items-center p-8">
                        <label class="text-3xl font-medium w-1/3">Napomene:</label>
                        <input type="text" name="napomena" value="{{ $partija->napomena }}" class="w-2/3 bg-white rounded-lg h-12 text-2xl px-4">
                    </div>

                    <div class="flex justify-center gap-20 py-12 bg-transparent gap-2">
                        <button type="submit" class="p-4 text-white text-3xl font-bold rounded-lg shadow-lg" style="background-color: #4A1D1D;">
                            Ažuriraj
                        </button>
                        <a href="{{ route('partija-grozdja.index') }}" class="p-4 text-white text-3xl font-bold rounded-lg shadow-lg" style="background-color: #4A1D1D;">
                            Otkaži
                        </a>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>