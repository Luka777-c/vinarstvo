<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Stanje Podruma</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body style="background-color: #F5F1E9; font-family: sans-serif;">

    <div class="max-w-5xl mx-auto py-16 px-6 lg:px-8">
        
        <div class="flex justify-between items-center mb-16 border-b-2 border-[#4A1D1D] pb-8">
            <div class="flex items-center gap-4">
                <i class="fa-solid fa-warehouse text-5xl" style="color: #4A1D1D;"></i>
                <h1 class="text-6xl font-bold uppercase tracking-tight" style="color: #4A1D1D;">Naš Podrum</h1>
            </div>
            <a href="/" class="text-xl font-bold hover:opacity-70 transition" style="color: #4A1D1D;">&larr; Početna</a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @forelse($burad as $b)
                <div class="bg-white border-2 border-[#4A1D1D] rounded-[2.5rem] overflow-hidden shadow-md flex flex-col py-4">
                    
                    <div class="h-40 flex items-center justify-center {{ $b->status == 'prazno' ? 'bg-gray-100' : 'bg-[#4A1D1D] bg-opacity-10' }}">
                        <i class="fa-solid fa-drum text-7xl {{ $b->status == 'prazno' ? 'text-gray-300' : 'text-[#4A1D1D]' }}"></i>
                    </div>

                    <div class="p-8 text-center flex-grow">
                        <h2 class="text-2xl font-bold text-gray-400 uppercase mb-1">Bure #{{ $b->id }}</h2>
                        <div class="text-5xl font-black mb-4" style="color: #4A1D1D;">{{ $b->kapacitet }}L</div>
                        
                        <div class="inline-block px-6 py-2 rounded-full font-bold text-xl uppercase tracking-widest border-2 
                            {{ $b->status == 'prazno' ? 'border-gray-300 text-gray-400' : 'border-[#D4AF37] text-[#D4AF37]' }}">
                            {{ $b->status }}
                        </div>
                    </div>
                </div>
            @empty
                <p class="col-span-full text-center text-3xl text-gray-400 italic">Podrum je trenutno prazan.</p>
            @endforelse
        </div>
    </div>

</body>
</html>