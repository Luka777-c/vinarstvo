<x-app-layout>
    <div class="min-h-screen py-10 px-4" style="background-color: #F8F8F8;">
        <div class="max-w-4xl mx-auto">
            
            <div class="flex justify-between items-center mb-12">
                <div class="flex items-center gap-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#D9A441" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-barrel-icon lucide-barrel"><path d="M10 3a41 41 0 0 0 0 18"/><path d="M14 3a41 41 0 0 1 0 18"/><path d="M17 3a2 2 0 0 1 1.68.92 15.25 15.25 0 0 1 0 16.16A2 2 0 0 1 17 21H7a2 2 0 0 1-1.68-.92 15.25 15.25 0 0 1 0-16.16A2 2 0 0 1 7 3z"/><path d="M3.84 17h16.32"/><path d="M3.84 7h16.32"/></svg>

                    <h1 style="font-weight: 500; margin: 1em 0.5em; color: #000; font-size: 3rem; line-height: 1;">
                        Partija grožđa
                    </h1>
                </div>
                <a href="{{ route('partija-grozdja.index') }}" class="px-6 py-2 bg-[#D49A3D] text-white font-bold rounded-md shadow-sm hover:opacity-90">
                    < Nazad na listu
                </a>
            </div>

            <div class="bg-white border border-stone-300 rounded-xl overflow-hidden shadow-sm mb-16">
                <div class="flex items-center p-4 border-b border-stone-200">
                    <label class="text-xl font-medium text-gray-600 w-1/3">Sorta grožđa:</label>
                    <div class="w-full bg-gray-50 border border-stone-200 rounded p-2 text-gray-800 font-mono italic">
                        {{ $partija->sorta }}
                    </div>
                </div>

                <div class="flex items-center p-4 border-b border-stone-200">
                    <label class="text-xl font-medium text-gray-600 w-1/3">Količina (kg):</label>
                    <div class="w-full bg-gray-50 border border-stone-200 rounded p-2 text-gray-800 italic">
                        {{ $partija->kolicina }} kg
                    </div>
                </div>

                <div class="flex items-center p-4 border-b border-stone-200">
                    <label class="text-xl font-medium text-gray-600 w-1/3">Datum prijema:</label>
                    <div class="w-full bg-gray-50 border border-stone-200 rounded p-2 text-gray-800">
                        {{ $partija->datum->format('d.m.Y') }}
                    </div>
                </div>

                <div class="flex items-center p-4 border-b border-stone-200">
                    <label class="text-xl font-medium text-gray-600 w-1/3">Napomena:</label>
                    <div class="w-full bg-gray-50 border border-stone-200 rounded p-2 text-gray-800">
                        {{ $partija->napomena }}
                    </div>
                </div>
                <h2 style="font-weight: 500; margin: 1em 0.5em; color: #000; font-size: 1.5rem; line-height: 1;" class="text-4xl font-bold mb-10 text-[#4A1D1D]">Timeline proizvodnje</h2>
                
                <div style="margin: 2em;">
                    @php
                        $statusi = [
                            'prijem' => 'Prijem grožđa',
                            'u_obradi' => 'Fermentacija',
                            'zavrseno' => 'Završeno / Odležavanje'
                        ];

                        $redosled = array_keys($statusi);
                        $trenutniIndex = array_search(strtolower($partija->status), $redosled);
                    @endphp

                    @foreach($statusi as $key => $label)
                        @php
                            $keyIndex = array_search($key, $redosled);
                        @endphp

                        <div class="flex items-center justify-between full-w mb-4">
                            <span class="text-2xl {{ $keyIndex === $trenutniIndex ? 'font-bold text-black' : 'text-gray-500' }}">
                                {{ $label }}
                            </span>

                            <div class="w-10 h-10 rounded-full border-2
                                {{ $keyIndex < $trenutniIndex ? 'bg-green-500 border-green-700' : '' }}
                                {{ $keyIndex === $trenutniIndex ? 'bg-yellow-400 border-yellow-600 animate-pulse' : '' }}
                                {{ $keyIndex > $trenutniIndex ? 'bg-gray-200 border-gray-400' : '' }}">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>


            <div class="flex flex-col items-start gap-4">
                <a href="{{ route('partija-grozdja.edit', $partija->id) }}" class="px-8 py-3 bg-[#D49A3D] text-white text-xl font-bold rounded-md shadow-md hover:opacity-90 transition">
                    + Ažuriraj status procesa
                </a>
                <a href="{{ route('partija-grozdja.index') }}" class="px-8 py-3 bg-[#D49A3D] text-white text-xl font-bold rounded-md shadow-md hover:opacity-90 transition">
                    < Nazad na listu
                </a>
            </div>

        </div>
    </div>
</x-app-layout>