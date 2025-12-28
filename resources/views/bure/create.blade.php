{{--
    @extends('layouts.app')

    @section('content')
        bure.create template
    @endsection
--}}

<x-app-layout>
    <div class="min-h-screen py-10 px-4" style="background-color: #F5F1E9;">
        <div class="max-w-4xl mx-auto">
            
            <div class="flex justify-between items-center mb-10">
                <div class="flex items-center gap-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#D9A441" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-barrel-icon lucide-barrel"><path d="M10 3a41 41 0 0 0 0 18"/><path d="M14 3a41 41 0 0 1 0 18"/><path d="M17 3a2 2 0 0 1 1.68.92 15.25 15.25 0 0 1 0 16.16A2 2 0 0 1 17 21H7a2 2 0 0 1-1.68-.92 15.25 15.25 0 0 1 0-16.16A2 2 0 0 1 7 3z"/><path d="M3.84 17h16.32"/><path d="M3.84 7h16.32"/></svg>
                    <h1 class="text-5xl font-bold text-gray-800 italic">Novo bure</h1>
                </div>
                <a href="{{ route('bure.index') }}" class="px-6 py-2 bg-[#4A1D1D] text-white font-bold rounded-md shadow-sm">
                    < Nazad na listu
                </a>
            </div>

            <form action="{{ route('bure.store') }}" method="POST">
                @csrf
                
                <div class="bg-[#F2EBE1] border border-stone-400 rounded-3xl overflow-hidden shadow-sm mb-12">
                    
                    <div class="flex items-center p-6 border-b border-stone-400">
                        <label class="text-2xl font-medium text-gray-700 w-1/3 text-nowrap">Broj bureta:</label>
                        <input type="text" name="broj_bureta" required class="w-full bg-white border border-stone-300 rounded-md p-2 outline-none focus:ring-1 focus:ring-[#4A1D1D]">
                    </div>

                    <div class="flex items-center p-6 border-b border-stone-400">
                        <label class="text-2xl font-medium text-gray-700 w-1/3">Kapacitet (L):</label>
                        <input type="number" name="kapacitet" required class="w-full bg-white border border-stone-300 rounded-md p-2 outline-none focus:ring-1 focus:ring-[#4A1D1D]">
                    </div>

                    <div class="flex items-center p-6 border-b border-stone-400">
                        <label class="text-2xl font-medium text-gray-700 w-1/3">Tip drveta:</label>
                        <select name="tip_drveta" required class="w-full bg-white border border-stone-300 rounded-md p-2 outline-none focus:ring-1 focus:ring-[#4A1D1D]">
                            <option value="Hrast">Hrast</option>
                            <option value="Bagrem">Bagrem</option>
                            <option value="Inox">Inox</option>
                        </select>
                    </div>

                    <div class="flex items-center p-6 border-b border-stone-400">
                        <label class="text-2xl font-medium text-gray-700 w-1/3">Status:</label>
                        <select name="status" required class="w-full bg-white border border-stone-300 rounded-md p-2 outline-none focus:ring-1 focus:ring-[#4A1D1D]">
                            <option value="prazno">Prazno</option>
                            <option value="ciscenje">Ciscenje</option>
                            <option value="puno">Puno</option>
                        </select>
                    </div>

                    <div class="flex items-center p-6">
                        <label class="text-2xl font-medium text-gray-700 w-1/3">Napomena:</label>
                        <input type="text" name="napomena" class="w-full bg-white border border-stone-300 rounded-md p-2 outline-none focus:ring-1 focus:ring-[#4A1D1D]">
                    </div>

                </div>

                <div class="flex justify-center gap-32">
                    <button type="submit" class="px-16 py-4 bg-[#4A1D1D] text-white text-3xl font-medium rounded-lg shadow-md hover:bg-stone-800 transition">
                        Sacuvaj
                    </button>
                    <a href="{{ route('bure.index') }}" class="px-16 py-4 bg-[#4A1D1D] text-white text-3xl font-medium rounded-lg shadow-md hover:bg-stone-800 transition text-center">
                        Otkazi
                    </a>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>