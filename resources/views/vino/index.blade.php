{{--
    @extends('layouts.app')

    @section('content')
        vino.index template
    @endsection
--}}

<x-app-layout>
    <div class="min-h-screen py-10 px-4" style="background-color: #F5F1E9;">
        <div class="max-w-6xl mx-auto">
            
            <div class="flex justify-between items-start mb-10">
                <div class="flex items-center gap-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#4C1C24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-barrel-icon lucide-barrel"><path d="M10 3a41 41 0 0 0 0 18"/><path d="M14 3a41 41 0 0 1 0 18"/><path d="M17 3a2 2 0 0 1 1.68.92 15.25 15.25 0 0 1 0 16.16A2 2 0 0 1 17 21H7a2 2 0 0 1-1.68-.92 15.25 15.25 0 0 1 0-16.16A2 2 0 0 1 7 3z"/><path d="M3.84 17h16.32"/><path d="M3.84 7h16.32"/></svg>
                    <h1 class="text-5xl font-bold text-gray-800">Vina</h1>
                </div>
                <div class="flex gap-3">
                    <a href="{{ route('vino.create') }}" class="px-6 py-2 bg-[#D49A3D] text-white font-bold rounded-md shadow-sm hover:opacity-90 transition">+ Novo</a>
                    <a href="/" class="px-6 py-2 bg-[#4A1D1D] text-white font-bold rounded-md shadow-sm hover:opacity-90 transition">Početna</a>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-sm overflow-hidden border border-gray-200">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr class="text-gray-600 font-bold uppercase text-sm italic">
                            <th class="p-4">Naziv</th>
                            <th class="p-4">Tip</th>
                            <th class="p-4">Količina</th>
                            <th class="p-4">Datum Proizv.</th>
                            <th class="p-4">Poreklo (Partija)</th>
                            <th class="p-4">Iz Bureta</th>
                            <th class="p-4 text-right">Akcije</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach($vina as $v)
                        <tr class="border-b border-gray-100 hover:bg-gray-50 transition">
                            <td class="p-4 font-bold text-[#4A1D1D]">{{ $v->naziv }}</td>
                            <td class="p-4">
                                <span class="px-3 py-1 rounded-full text-xs font-bold 
                                    {{ $v->tip == 'Crveno' ? 'bg-red-100 text-red-800' : 
                                      ($v->tip == 'Belo' ? 'bg-yellow-100 text-yellow-800' : 'bg-pink-100 text-pink-800') }}">
                                    {{ $v->tip }}
                                </span>
                            </td>
                            <td class="p-4">{{ $v->kolicina }} kom/l</td>
                            <td class="p-4 text-stone-500">{{ \Carbon\Carbon::parse($v->datum_proizvodnje)->format('d.m.Y.') }}</td>
                            <td class="p-4 text-sm">{{ $v->partijaGrozdja->sorta ?? 'N/A' }}</td>
                            <td class="p-4 text-sm italic">{{ $v->bure->broj_bureta ?? '—' }}</td>
                            
                            <td class="p-4 text-right">
                                <div class="flex justify-end items-center gap-4">
                                    <a href="{{ route('vino.edit', $v->id) }}" class="text-blue-600 hover:text-blue-800 transition">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <form action="{{ route('vino.destroy', $v->id) }}" method="POST" onsubmit="return confirm('Obriši ovo vino?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 transition">
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