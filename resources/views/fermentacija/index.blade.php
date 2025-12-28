{{--
    @extends('layouts.app')

    @section('content')
        fermentacija.index template
    @endsection
--}}

<x-app-layout>
    <div class="min-h-screen py-10 px-4" style="background-color: #F5F1E9;">
        <div class="max-w-6xl mx-auto">
            
            <div class="flex justify-between items-start mb-10">
                <div class="flex items-center gap-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#4C1C24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-barrel-icon lucide-barrel"><path d="M10 3a41 41 0 0 0 0 18"/><path d="M14 3a41 41 0 0 1 0 18"/><path d="M17 3a2 2 0 0 1 1.68.92 15.25 15.25 0 0 1 0 16.16A2 2 0 0 1 17 21H7a2 2 0 0 1-1.68-.92 15.25 15.25 0 0 1 0-16.16A2 2 0 0 1 7 3z"/><path d="M3.84 17h16.32"/><path d="M3.84 7h16.32"/></svg>
                    <h1 class="text-5xl font-bold text-gray-800">Fermentacija</h1>
                </div>
                <div class="flex gap-3">
                    <a href="{{ route('fermentacija.create') }}" class="px-6 py-2 bg-[#D49A3D] text-white font-bold rounded-md shadow-sm hover:opacity-90 transition">+ Nova</a>
                    <a href="/" class="px-6 py-2 bg-[#4A1D1D] text-white font-bold rounded-md shadow-sm hover:opacity-90 transition">Nazad</a>
                </div>
            </div>

            <div class="mb-8 flex items-center gap-4">
                <span class="text-2xl font-medium text-gray-700">Pretraga po fazi / partiji:</span>
                <input type="text" class="border-b border-gray-300 bg-transparent focus:border-[#4A1D1D] outline-none text-xl p-1 w-64 transition-colors">
            </div>

            <div class="bg-white rounded-lg shadow-sm overflow-hidden border border-gray-200">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr class="text-gray-600 font-bold uppercase text-sm italic">
                            <th class="p-4">ID</th>
                            <th class="p-4">Partija</th>
                            <th class="p-4 text-center">Datum</th>
                            <th class="p-4 text-center">Temp (°C)</th>
                            <th class="p-4 text-center">Šećer</th>
                            <th class="p-4">Faza</th>
                            <th class="p-4 text-right">Akcije</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach($fermentacije as $f)
                        <tr class="border-b border-gray-100 hover:bg-gray-50 transition">
                            <td class="p-4 font-mono text-sm">{{ str_pad($f->id, 2, '0', STR_PAD_LEFT) }}</td>
                            <td class="p-4 font-bold text-[#4A1D1D]">
                                {{ $f->partijaGrozdja->sorta ?? 'ID: '.$f->partija_grozdja_id }}
                            </td>
                            <td class="p-4 text-center">{{ \Carbon\Carbon::parse($f->datum)->format('d.m.Y.') }}</td>
                            <td class="p-4 text-center font-semibold text-orange-700">{{ $f->temperatura }}°C</td>
                            <td class="p-4 text-center">{{ $f->secer }}</td>
                            <td class="p-4 italic text-stone-500">{{ $f->faza }}</td>
                            <td class="p-4 text-right">
                                <div class="flex justify-end items-center gap-4">
                                    <a href="{{ route('fermentacija.edit', $f->id) }}" class="text-blue-600 hover:text-blue-800 transition" title="Izmeni">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>

                                    <form action="{{ route('fermentacija.destroy', $f->id) }}" method="POST" onsubmit="return confirm('Da li želite da obrišete ovaj zapis fermentacije?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 transition" title="Obriši">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>