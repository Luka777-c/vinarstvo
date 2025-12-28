<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aktuelna Berba</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body style="background-color: #F5F1E9; font-family: sans-serif;">

    <div class="max-w-5xl mx-auto py-16 px-6 lg:px-8">
        
        <div class="flex justify-between items-center mb-16 border-b-2 border-[#4A1D1D] pb-8">
            <div class="flex items-center gap-4">
                <i class="fa-solid fa-leaf text-5xl" style="color: #4A1D1D;"></i>
                <h1 class="text-6xl font-bold uppercase tracking-tight" style="color: #4A1D1D;">Dnevnik Berbe</h1>
            </div>
            <a href="/" class="text-xl font-bold hover:opacity-70 transition" style="color: #4A1D1D;">&larr; Početna</a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @forelse($statistika as $s)
                <div class="bg-white border-2 border-[#4A1D1D] rounded-[2.5rem] overflow-hidden shadow-md flex flex-col hover:shadow-xl transition">
                    
                    <div class="p-10 text-center flex-grow">
                        <i class="fa-solid fa-grapes text-4xl mb-4" style="color: #4A1D1D;"></i>
                        <h2 class="text-4xl font-black mb-4 uppercase" style="color: #000;">{{ $s->sorta }}</h2>
                        
                        <p class="text-xl text-stone-500 italic mb-6">
                            Ova sorta predstavlja srce naše ovogodišnje proizvodnje.
                        </p>

                        <div class="h-40 flex flex-col items-center justify-center bg-[#D4AF37] text-white" style="margin: 1rem 0;">
                            <p class="font-regular" style="color: #000;">Ukupno primljeno: {{ $s->ukupno_kg }} kg</p>
                        </div>

                        <div class="pt-6 border-t border-stone-100 font-bold text-[#4A1D1D] text-2xl">
                            Berba 2024.
                        </div>
                    </div>
                </div>
            @empty
                <p class="col-span-full text-center text-3xl text-gray-400 italic">Još uvek nismo započeli prijem grožđa.</p>
            @endforelse
        </div>
    </div>

</body>
</html>