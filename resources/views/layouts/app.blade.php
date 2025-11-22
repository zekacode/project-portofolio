{{-- File: resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Putrawin Adha Muzakki')</title>

    {{-- Impor Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pirata+One&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    {{-- Impor CSS yang sudah di-compile oleh Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-charcoal text-eggshell font-sans antialiased">
    
    {{-- Container Utama dengan Padding Samping --}}
    <div class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8">

        {{-- Komponen Navigasi Publik --}}
        <header id="navigation" class="py-8">
            <nav class="flex justify-between items-center">
                <a href="{{ route('home') }}">
                    <h1 class="font-display text-4xl tracking-wider">Putrawin Adha Muzakki</h1>
                </a>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('showcase.index') }}" class="font-medium hover:text-brand-pink transition-colors">Showcase</a>
                    <a href="{{ route('resume.index') }}" class="font-medium hover:text-brand-pink transition-colors">Resume</a>
                    <a href="#footer" class="font-medium border-2 border-eggshell rounded-sm px-4 py-2 hover:bg-eggshell hover:text-charcoal transition-colors">Get In Touch</a>
                </div>
                <div class="md:hidden">
                    <button class="text-eggshell">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                        </svg>
                    </button>
                </div>
            </nav>
        </header>

        {{-- Main Content Area --}}
        <main>
            @yield('content')
        </main>

        {{-- Komponen Footer --}}
        <footer id="footer" class="py-20 mt-20 text-center">
            <h2 class="font-display text-5xl md:text-6xl">Get in Touch</h2>
            <p class="mt-4 max-w-2xl mx-auto">
                Open to new projects and collaborations. Don't be shy, say hi!
            </p>
            <div class="mt-8 flex justify-center space-x-6">
                <a href="https://github.com/zekacode" class="text-eggshell hover:text-brand-pink">GitHub</a>
                <a href="https://www.linkedin.com/in/putrawin-adha-muzakki/" class="text-eggshell hover:text-brand-pink">LinkedIn</a>
                <a href="mailto:putrawinmuzakki@gmail.com" class="text-eggshell hover:text-brand-pink">Email</a>
            </div>
            <div class="mt-16 text-sm text-gray-400">
                &copy; {{ date('Y') }} Putrawin Adha Muzakki. Built with Laravel & Tailwind CSS.
            </div>
        </footer>

    </div>

</body>
</html>