{{--
    @extends('layouts.app')

    @section('content')
        partija-grozdja.edit template
    @endsection
--}}

<x-app-layout>
    <div class="min-h-screen py-10 px-4" style="background-color: #F5F1E9;">
        <div class="max-w-4xl mx-auto">
            
            <div class="flex justify-between items-center mb-10">
                <div class="flex items-center gap-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#4C1C24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-barrel-icon lucide-barrel"><path d="M10 3a41 41 0 0 0 0 18"/><path d="M14 3a41 41 0 0 1 0 18"/><path d="M17 3a2 2 0 0 1 1.68.92 15.25 15.25 0 0 1 0 16.16A2 2 0 0 1 17 21H7a2 2 0 0 1-1.68-.92 15.25 15.25 0 0 1 0-16.16A2 2 0 0 1 7 3z"/><path d="M3.84 17h16.32"/><path d="M3.84 7h16.32"/></svg>
                    <h1 class="text-5xl font-bold text-gray-800 italic">Izmena partije grožđa</h1>
                </div>
                <a href="{{ route('partija-grozdja.index') }}" class="px-6 py-2 bg-[#4A1D1D] text-white font-bold rounded-md shadow-sm">
                    < Nazad na listu
                </a>
            </div>

            @if ($errors->any())
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-8 rounded shadow-md" role="alert">
                    <p class="font-bold">Ups! Došlo je do greške:</p>
                    <ul class="mt-2 ml-4 list-disc">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('partija-grozdja.update', $partija->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="bg-[#F2EBE1] border border-stone-400 rounded-3xl overflow-hidden shadow-sm mb-12">
                    
                    <div class="flex items-center p-6 border-b border-stone-400">
                        <label class="text-2xl font-medium text-gray-700 w-1/3">Sorta grožđa:</label>
                        <select name="sorta" required class="w-full bg-white border border-stone-300 rounded-md p-2 outline-none focus:ring-1 focus:ring-[#4A1D1D]">
                            <option value="Vranac" {{ $partija->sorta == 'Vranac' ? 'selected' : '' }}>Vranac</option>
                            <option value="Chardonnay" {{ $partija->sorta == 'Chardonnay' ? 'selected' : '' }}>Chardonnay</option>
                            <option value="Tamjanika" {{ $partija->sorta == 'Tamjanika' ? 'selected' : '' }}>Tamjanika</option>
                            <option value="Cabernet Sauvignon" {{ $partija->sorta == 'Cabernet Sauvignon' ? 'selected' : '' }}>Cabernet Sauvignon</option>
                            <option value="Merlot" {{ $partija->sorta == 'Merlot' ? 'selected' : '' }}>Merlot</option>
                        </select>
                    </div>

                    <div class="flex items-center p-6 border-b border-stone-400">
                        <label class="text-2xl font-medium text-gray-700 w-1/3">Količina (kg):</label>
                        <input type="number" name="kolicina" value="{{ $partija->kolicina }}" required placeholder="Npr. 1200"
                               class="w-full bg-white border border-stone-300 rounded-md p-2 outline-none focus:ring-1 focus:ring-[#4A1D1D]">
                    </div>

                    <div class="flex items-center p-6 border-b border-stone-400">
                        <label class="text-2xl font-medium text-gray-700 w-1/3">Datum prijema:</label>
                        <input type="date" name="datum" required value="{{ $partija->datum->format('Y-m-d') }}"
                               class="w-full bg-white border border-stone-300 rounded-md p-2 outline-none focus:ring-1 focus:ring-[#4A1D1D]">
                    </div>

                    <div class="flex items-center p-6 border-b border-stone-400">
                        <label class="text-2xl font-medium text-gray-700 w-1/3">Status:</label>
                        <input type="text" name="status" value="{{ $partija->status }}"
                               class="w-full bg-white border border-stone-300 rounded-md p-2 outline-none focus:ring-1 focus:ring-[#4A1D1D]">
                    </div>

                    <div class="flex items-center p-6">
                        <label class="text-2xl font-medium text-gray-700 w-1/3">Napomena:</label>
                        <input type="text" name="napomena" value="{{ $partija->napomena }}" placeholder="Npr. Odličan kvalitet, visok šećer"
                               class="w-full bg-white border border-stone-300 rounded-md p-2 outline-none focus:ring-1 focus:ring-[#4A1D1D]">
                    </div>

                </div>

                <div class="flex justify-center gap-32">
                    <button type="submit" class="px-16 py-4 bg-[#4A1D1D] text-white text-3xl font-medium rounded-lg shadow-md hover:bg-stone-800 transition">
                        Sačuvaj
                    </button>
                    <a href="{{ route('partija-grozdja.index') }}" class="px-16 py-4 bg-[#4A1D1D] text-white text-3xl font-medium rounded-lg shadow-md hover:bg-stone-800 transition text-center">
                        Otkaži
                    </a>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>