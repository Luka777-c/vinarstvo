<x-app-layout>
    <div class="min-h-screen w-full" style="background-color: #FFFFFF; font-family: sans-serif;">
        <div class="max-w-7xl mx-auto py-12 px-6">
            
            <div class="flex justify-between items-center mb-10">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#4C1C24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-barrel-icon lucide-barrel"><path d="M10 3a41 41 0 0 0 0 18"/><path d="M14 3a41 41 0 0 1 0 18"/><path d="M17 3a2 2 0 0 1 1.68.92 15.25 15.25 0 0 1 0 16.16A2 2 0 0 1 17 21H7a2 2 0 0 1-1.68-.92 15.25 15.25 0 0 1 0-16.16A2 2 0 0 1 7 3z"/><path d="M3.84 17h16.32"/><path d="M3.84 7h16.32"/></svg>

                    <h1 style="font-weight: 500; margin: 1em 0.5em; color: #000; font-size: 3rem; line-height: 1;">
                        Partija grožđa
                    </h1>
                </div>
                <a href="{{ route('partija-grozdja.index') }}" 
                   class="p-2 text-white text-xl font-semibold rounded-lg shadow-md hover:opacity-90 transition" 
                   style="background-color: #D9A441;">
                    < Nazad na listu
                </a>
            </div>

            <div class="bg-white border-2 border-[#4A1D1D] rounded-[2rem] overflow-hidden mb-12 shadow-sm">
                <div class="divide-y divide-[#4A1D1D]">
                    <div class="flex p-6">
                        <span class="text-2xl font-bold w-1/3 text-gray-700">Sorta grožđa:</span>
                        <span class="text-2xl w-2/3">{{ $partija->sorta }}</span>
                    </div>
                    <div class="flex p-6">
                        <span class="text-2xl font-bold w-1/3 text-gray-700">Količina (kg):</span>
                        <span class="text-2xl w-2/3">{{ $partija->kolicina }} kg</span>
                    </div>
                    <div class="flex p-6">
                        <span class="text-2xl font-bold w-1/3 text-gray-700">Datum prijema:</span>
                        <span class="text-2xl w-2/3">{{ $partija->datum->format('d.m.Y.') }}</span>
                    </div>
                    <div class="flex p-6">
                        <span class="text-2xl font-bold w-1/3 text-gray-700">Napomena:</span>
                        <span class="text-2xl w-2/3">{{ $partija->napomena }} kg</span>
                    </div>
                </div>
            </div>

            <div class="mb-12 bg-white p-10 rounded-[2rem]">
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

                        <div class="flex items-center justify-between max-w-lg mb-4">
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

            <div class="flex flex-col gap-2">
                <a href="{{ route('partija-grozdja.edit', $partija->id) }}" 
                   class="w-full p-2 text-white text-3xl font-bold rounded-2xl shadow-lg text-center hover:scale-[1.01] transition" 
                   style="background-color: #D9A441;">
                    + Ažuriraj status procesa
                </a>
                
                <a href="{{ route('partija-grozdja.index') }}" 
                   class="w-full p-2 text-white text-3xl font-bold rounded-2xl shadow-lg text-center hover:scale-[1.01] transition" 
                   style="background-color: #D9A441;">
                    < Nazad na listu
                </a>
            </div>

        </div>
    </div>
</x-app-layout>