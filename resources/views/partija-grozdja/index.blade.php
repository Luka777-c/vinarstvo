{{--
    @extends('layouts.app')

    @section('content')
        partija-grozdja.index template
    @endsection
--}}

<x-app-layout>
    <div class="min-h-screen py-10 px-4" style="background-color: #F5F1E9;">
        <div class="max-w-5xl mx-auto">
            
            <div class="flex justify-between items-start mb-10">
                <div class="flex items-center gap-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#4C1C24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-barrel-icon lucide-barrel"><path d="M10 3a41 41 0 0 0 0 18"/><path d="M14 3a41 41 0 0 1 0 18"/><path d="M17 3a2 2 0 0 1 1.68.92 15.25 15.25 0 0 1 0 16.16A2 2 0 0 1 17 21H7a2 2 0 0 1-1.68-.92 15.25 15.25 0 0 1 0-16.16A2 2 0 0 1 7 3z"/><path d="M3.84 17h16.32"/><path d="M3.84 7h16.32"/></svg>
                    <h1 class="text-5xl font-bold text-gray-800">Partija grožđa</h1>
                </div>
                <div class="flex gap-3">
                    <a href="{{ route('partija-grozdja.create') }}" class="px-6 py-2 bg-[#D49A3D] text-white font-bold rounded-md shadow-sm hover:opacity-90">+ Nova</a>
                    <a href="/" class="px-6 py-2 bg-[#4A1D1D] text-white font-bold rounded-md shadow-sm hover:opacity-90">Nazad</a>
                </div>
            </div>

            <div class="mb-8 flex items-center gap-4">
                <span class="text-2xl font-medium text-gray-700">Pretraga po sorti:</span>
                <input type="text" class="border-b border-gray-300 bg-transparent focus:border-[#4A1D1D] outline-none text-xl p-1 w-64">
            </div>

            <div class="bg-white rounded-lg shadow-sm overflow-hidden border border-gray-200">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr class="text-gray-600 font-bold uppercase text-sm italic">
                            <th class="p-4">ID</th>
                            <th class="p-4">Sorta grožđa</th>
                            <th class="p-4 text-center">Količina</th>
                            <th class="p-4 text-center">Datum prijema</th>
                            <th class="p-4 text-center">Status</th>
                            <th class="p-4 text-right">Akcije</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach($partije as $p)
                        <tr class="border-b border-gray-100 hover:bg-gray-50 transition">
                            <td class="p-4">{{ str_pad($p->id, 2, '0', STR_PAD_LEFT) }}</td>
                            <td class="p-4 font-bold text-[#4A1D1D]">{{ $p->sorta }}</td>
                            <td class="p-4 text-center">{{ number_format($p->kolicina, 0, ',', '.') }} kg</td>
                            <td class="p-4 text-center">{{ \Carbon\Carbon::parse($p->datum)->format('d.m.Y.') }}</td>
                            <td class="p-4 font-bold text-[#4A1D1D]">{{ $p->status }}</td>
                            <td class="p-4 text-right">
                                <div class="flex justify-end items-center gap-4">
                                    <a href="{{ route('partija-grozdja.show', $p->id) }}" class="text-[#D49A3D] underline font-medium hover:text-[#4A1D1D] transition">Details</a>
                                    
                                    <a href="{{ route('partija-grozdja.edit', $p->id) }}" class="text-blue-600 hover:text-blue-800 transition" title="Izmeni">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>

                                    <form action="{{ route('partija-grozdja.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Da li ste sigurni da želite da obrišete ovu partiju?')">
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