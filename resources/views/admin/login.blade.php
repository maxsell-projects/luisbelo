<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acesso Privado | Luís Belo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&family=Playfair+Display:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Montserrat', 'sans-serif'],
                        serif: ['Playfair Display', 'serif'],
                    }
                }
            }
        }
    </script>
    <style>
        @keyframes kenburns {
            0% { transform: scale(1); }
            100% { transform: scale(1.1); }
        }
        .animate-ken-burns {
            animation: kenburns 30s ease-in-out infinite alternate;
        }
    </style>
</head>
<body class="bg-slate-900 font-sans antialiased text-white h-screen flex items-center justify-center relative overflow-hidden">

    <div class="absolute inset-0 z-0">
        <img src="{{ asset('img/photo.jpeg') }}" class="w-full h-full object-cover opacity-30 animate-ken-burns">
        <div class="absolute inset-0 bg-slate-900/60 backdrop-blur-[2px]"></div>
    </div>

    <div class="w-full max-w-md bg-white/5 border border-white/10 p-12 backdrop-blur-xl relative z-10 shadow-[0_0_50px_rgba(0,0,0,0.5)]" data-aos="fade-up">
        <div class="text-center mb-12">
            <h1 class="font-serif text-3xl mb-2 tracking-[0.3em] uppercase text-white">
                LUÍS<span class="font-light text-slate-400">BELO</span>
            </h1>
            <div class="w-8 h-px bg-white/20 mx-auto my-4"></div>
            <p class="text-[10px] uppercase tracking-[0.4em] text-slate-400">Curadoria Administrativa</p>
        </div>

        <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-10">
            @csrf
            
            <div class="relative group">
                <label for="email" class="block text-[9px] uppercase tracking-[0.3em] text-slate-400 mb-2 font-bold transition-colors group-focus-within:text-white">Email</label>
                <input type="email" name="email" id="email" required autofocus
                       class="w-full bg-transparent border-b border-white/10 px-0 py-3 text-sm text-white focus:outline-none focus:border-white transition-all placeholder-white/10">
                @error('email')
                    <span class="text-red-400 text-[10px] mt-2 block tracking-wide italic">{{ $message }}</span>
                @enderror
            </div>

            <div class="relative group">
                <label for="password" class="block text-[9px] uppercase tracking-[0.3em] text-slate-400 mb-2 font-bold transition-colors group-focus-within:text-white">Senha</label>
                <input type="password" name="password" id="password" required
                       class="w-full bg-transparent border-b border-white/10 px-0 py-3 text-sm text-white focus:outline-none focus:border-white transition-all placeholder-white/10">
            </div>

            <div class="flex items-center justify-between">
                <label class="flex items-center gap-3 cursor-pointer group">
                    <input type="checkbox" name="remember" class="accent-white w-3 h-3 bg-transparent border-white/20 rounded">
                    <span class="text-[10px] uppercase tracking-widest text-slate-500 group-hover:text-slate-300 transition-colors">Lembrar acesso</span>
                </label>
            </div>

            <button type="submit" class="group relative w-full py-5 bg-white overflow-hidden transition-all duration-500">
                <span class="relative z-10 text-slate-900 text-[10px] uppercase tracking-[0.4em] font-bold">Autenticar</span>
                <div class="absolute inset-0 bg-slate-100 translate-y-full group-hover:translate-y-0 transition-transform duration-500"></div>
            </button>
        </form>

        <div class="mt-12 text-center">
            <a href="{{ route('home') }}" class="text-[9px] uppercase tracking-[0.3em] text-slate-500 hover:text-white transition-colors">
                ← Voltar ao Portal
            </a>
        </div>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 1500, once: true });
    </script>
</body>
</html>