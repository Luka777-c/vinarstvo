{{--
    @extends('layouts.app')

    @section('content')
        partijaGrozdja.index template
    @endsection
--}}

<x-app-layout>
    <div class="min-h-screen" style="background-color: #F5F1E9;">
        <div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
            
            <div class="flex justify-between items-center mb-12">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#4C1C24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-barrel-icon lucide-barrel"><path d="M10 3a41 41 0 0 0 0 18"/><path d="M14 3a41 41 0 0 1 0 18"/><path d="M17 3a2 2 0 0 1 1.68.92 15.25 15.25 0 0 1 0 16.16A2 2 0 0 1 17 21H7a2 2 0 0 1-1.68-.92 15.25 15.25 0 0 1 0-16.16A2 2 0 0 1 7 3z"/><path d="M3.84 17h16.32"/><path d="M3.84 7h16.32"/></svg>

                    <h1 style="font-weight: 500; margin: 1em 0.5em; color: #000; font-size: 3rem; line-height: 1;">
                        Partija grožđa
                    </h1>
                </div>
                <div class="flex space-x-4 gap-3">
                    <a href="{{ route('partija-grozdja.create') }}" class="px-6 py-2 text-white font-semibold rounded-md" style="background-color: #4A1D1D;">+ Nova</a>
                    <a href="{{ route('dashboard') }}" class="px-6 py-2 text-white font-semibold rounded-md" style="background-color: #4A1D1D;">Nazad</a>
                </div>
            </div>

            <div class="flex items-center mb-8 text-3xl gap-2">
                <span class="mr-4">Pretraga:</span>
                <input type="text" class="border-none rounded-full px-4 h-10 w-64 shadow-inner" style="background-color: #FFFFFF;">
            </div>

            <div class="w-full overflow-x-auto">
                <table class="w-full text-left border-collapse" style="width: 100% !important;">
                    <thead>
                        <tr class="border-b-4 border-black">
                            <th class="py-6 px-4 font-bold text-3xl">ID</th>
                            <th class="py-6 px-4 font-bold text-3xl">Sorta</th>
                            <th class="py-6 px-4 font-bold text-3xl">Kolicina</th>
                            <th class="py-6 px-4 font-bold text-3xl">Status</th>
                            <th class="py-6 px-4 font-bold text-3xl">Datum</th>
                            <th class="py-6 px-4 font-bold text-3xl">Opcije</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y-2 divide-gray-400">
                        @foreach($partije as $p)
                        <tr class="text-2xl hover:bg-stone-100 transition">
                            <td class="py-8 px-4">{{ $p->id }}</td>
                            <td class="py-8 px-4">{{ $p->sorta }}</td>
                            <td class="py-8 px-4">{{ $p->kolicina }} kg</td>
                            <td class="py-8 px-4">{{ $p->status }}</td>
                            <td class="py-8 px-4">{{ $p->datum->format('d/m/Y') }}</td>
                            <td class="flex justify-center">
                                <div class="flex items-center justify-end gap-3">
                                    <a href="{{ route('partija-grozdja.show', $p->id) }}" 
                                    class="font-bold underline hover:text-stone-600 transition" 
                                    style="color: #D4AF37;">
                                        Details
                                    </a>

                                    <a href="{{ route('partija-grozdja.edit', $p->id) }}" 
                                    class="font-bold underline hover:text-stone-600 transition" 
                                    style="color: #4A1D1D;">
                                        Izmeni
                                    </a>

                                    <form action="{{ route('partija-grozdja.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Da li ste sigurni da želite da obrišete ovu partiju?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="font-bold underline text-red-700 hover:text-red-900 transition">
                                            Obriši
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