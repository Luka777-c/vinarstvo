<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vinarija - Dobrodošli</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body style="background-color: #F5F1E9; font-family: sans-serif;">

    <div class="min-h-screen flex flex-col items-center justify-center py-12 px-6">
        
        <div class="text-center mb-20">
            <i class="fa-solid fa-wine-glass-empty text-[6rem] mb-6" style="color: #4A1D1D;"></i>
            <h1 class="text-7xl font-black uppercase tracking-widest" style="color: #4A1D1D;">
                Vinarija
            </h1>
            <p class="text-2xl text-stone-600 mt-4 italic">Od vinograda do vaše čaše - pratite svaki korak.</p>
        </div>

        <div class="max-w-7xl w-full grid grid-cols-1 md:grid-cols-3 gap-10">
            
            <a href="{{ route('public.vinoteka') }}" class="group">
                <div class="bg-white border-2 border-[#4A1D1D] rounded-[3rem] p-12 text-center h-full transition-all duration-500 group-hover:shadow-2xl group-hover:-translate-y-2">
                    <div class="w-24 h-24 bg-[#4A1D1D] rounded-full flex items-center justify-center mx-auto mb-8">
                        <i class="fa-solid fa-wine-bottle text-4xl text-white"></i>
                    </div>
                    <h2 class="text-4xl font-bold mb-4" style="color: #4A1D1D;">Vinoteka</h2>
                    <p class="text-xl text-stone-500">Istražite našu ponudu vrhunskih flaširanih vina.</p>
                </div>
            </a>

            <a href="{{ route('public.podrum') }}" class="group">
                <div class="bg-white border-2 border-[#4A1D1D] rounded-[3rem] p-12 text-center h-full transition-all duration-500 group-hover:shadow-2xl group-hover:-translate-y-2">
                    <div class="w-24 h-24 bg-[#D4AF37] rounded-full flex items-center justify-center mx-auto mb-8">
                        <i class="fa-solid fa-warehouse text-4xl text-white"></i>
                    </div>
                    <h2 class="text-4xl font-bold mb-4" style="color: #4A1D1D;">Mapa Podruma</h2>
                    <p class="text-xl text-stone-500">Pogledajte raspored i popunjenost naših buradi.</p>
                </div>
            </a>

            <a href="{{ route('public.sortastatistika') }}" class="group">
                <div class="bg-white border-2 border-[#4A1D1D] rounded-[3rem] p-12 text-center h-full transition-all duration-500 group-hover:shadow-2xl group-hover:-translate-y-2">
                    <div class="w-24 h-24 bg-[#4A1D1D] rounded-full flex items-center justify-center mx-auto mb-8">
                        <i class="fa-solid fa-grapes text-4xl text-white"></i>
                    </div>
                    <h2 class="text-4xl font-bold mb-4" style="color: #4A1D1D;">Dnevnik Berbe</h2>
                    <p class="text-xl text-stone-500">Pratite količine grožđa primljene u vinariju.</p>
                </div>
            </a>

        </div>

        <div class="mt-24">
            <a href="{{ route('login') }}" class="text-xl font-bold px-10 py-4 border-2 border-[#4A1D1D] rounded-full hover:bg-[#4A1D1D] hover:text-white transition-colors duration-300" style="color: #4A1D1D;">
                Administratorski pristup &rarr;
            </a>
        </div>

    </div>

</body>
</html>