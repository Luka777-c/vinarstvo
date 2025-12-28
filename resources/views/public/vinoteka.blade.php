<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vinoteka - Naša Ponuda</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body style="background-color: #F5F1E9; font-family: sans-serif;">

    <div class="max-w-5xl mx-auto py-16 px-6 lg:px-8 m-2">
        
        <div class="flex justify-between items-center mb-16 border-b-2 border-[#4A1D1D] pb-8">
            <div class="flex items-center gap-4">
                <i class="fa-solid fa-wine-glass text-5xl" style="color: #4A1D1D;"></i>
                <h1 class="text-6xl font-bold uppercase tracking-tight" style="color: #4A1D1D;">Vinoteka</h1>
            </div>
            <a href="/" class="text-xl font-bold hover:opacity-70 transition" style="color: #4A1D1D;">
                &larr; Nazad na početnu
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @forelse($vina as $v)
                <div class="bg-white border-2 border-[#4A1D1D] rounded-[2.5rem] flex flex-col shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">

                    <div class="h-48 flex items-center justify-center bg-[#4A1D1D] bg-opacity-5 border-b-2 border-[#4A1D1D] border-dashed">
                         <i class="fa-solid fa-wine-bottle text-7xl" style="color: #4A1D1D;"></i>
                    </div>

                    <div class="p-8 flex-grow flex flex-col items-center text-center">
                        <span class="text-sm font-bold tracking-widest uppercase text-stone-400 mb-2">
                            {{ $v->tip }}
                        </span>
                        
                        <h2 class="text-4xl font-bold mb-4" style="color: #000;">
                            {{ $v->naziv }}
                        </h2>

                        <div class="inline-block px-5 py-1 rounded-full text-white font-bold text-lg mb-6" style="background-color: #D4AF37;">
                            Proizvedeno: {{ $v->datum_proizvodnje->format('Y-m-d') }}
                        </div>

                        <p class="text-lg text-stone-600 italic leading-relaxed mb-4">
                            Vrhunsko vino sazrevalo u hrastovim buradima naše vinarije.
                        </p>
                    </div>

                    <div class="bg-[#4A1D1D] py-2 w-full"></div>
                </div>
            @empty
                <div class="col-span-full text-center py-20">
                    <p class="text-3xl text-stone-400 italic">Trenutno nema vina u ponudi.</p>
                </div>
            @endforelse
        </div>
    </div>

</body>
</html>