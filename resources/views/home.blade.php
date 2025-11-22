@extends('layouts.app')

@section('title', 'Putrawin Adha Muzakki - Portofolio')

@section('content')
    {{-- Hero Section --}}
    <section class="text-center py-20 md:py-32">
        <h1 class="font-display text-7xl md:text-9xl lg:text-[140px] leading-none">Putrawin Adha Muzakki</h1>
        <h2 class="mt-4 text-xl md:text-2xl max-w-3xl mx-auto font-light">
            AI Engineer | Game Developer | Mobile Developer | Web Programmer | UI/UX Designer
        </h2>
    </section>

    {{-- Showcase Section Preview --}}
    <section class="py-16 mt-32">
        <h2 class="font-display text-5xl md:text-6xl text-center mb-12">Recent Work</h2>
        
        {{-- Grid Proyek --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            @forelse ($latestProjects as $project)
                <a href="{{ route('showcase.show', $project->slug) }}" class="group block border-4 border-eggshell rounded-sm transition-transform duration-300 hover:-translate-y-1 hover:-translate-x-1 hover:shadow-[8px_8px_0_0_theme(colors.brand-blue)]">
                    <div class="overflow-hidden">
                        @if ($project->thumbnail)
                            <img src="{{ asset('storage/' . $project->thumbnail) }}" alt="Thumbnail {{ $project->title }}" class="w-full h-60 object-cover">
                        @else
                            <img src="https://placehold.co/600x400/111215/f2f7fc?text={{ urlencode($project->title) }}" alt="Thumbnail {{ $project->title }}" class="w-full h-60 object-cover">
                        @endif
                    </div>
                    <div class="p-6 border-t-4 border-eggshell">
                        <h3 class="text-2xl font-semibold">{{ $project->title }}</h3>
                        <p class="mt-2 font-light text-gray-300">{{ $project->short_description }}</p>
                    </div>
                </a>
            @empty
                <div class="md:col-span-2 lg:col-span-3 text-center py-10">
                    <p class="text-gray-400">No projects to display yet.</p>
                </div>
            @endforelse

        </div>

        {{-- Tampilkan tombol "Lihat Semua" hanya jika ada proyek --}}
        @if($latestProjects->isNotEmpty())
            <div class="text-center mt-12">
                <a href="{{ route('showcase.index') }}" class="inline-block font-medium border-2 border-eggshell rounded-sm px-8 py-3 hover:bg-eggshell hover:text-charcoal transition-colors">
                    View All Projects &gt;
                </a>
            </div>
        @endif
    </section>

    {{-- Bio Section --}}
    <section id="bio" class="py-20 md:py-32">
        <div class="flex flex-col md:flex-row items-center justify-center gap-12 md:gap-16">
            
            {{-- Kolom Gambar --}}
            <div class="w-full md:w-1/3 flex-shrink-0 flex justify-center">
                {{-- Wrapper untuk efek shadow --}}
                <div class="relative group">
                    <img src="{{ asset('images/profile.jpeg') }}" 
                        alt="Foto profil" 
                        class="relative z-10 w-64 h-64 md:w-80 md:h-80 object-cover rounded-sm border-4 border-eggshell">
                    
                    {{-- Elemen untuk shadow/border tambahan yang muncul saat hover --}}
                    <div class="absolute inset-0 border-4 border-brand-blue rounded-sm transition-transform duration-300 ease-in-out
                                group-hover:translate-x-3 group-hover:translate-y-3
                                md:group-hover:translate-x-4 md:group-hover:translate-y-4">
                    </div>
                </div>
            </div>

            {{-- Kolom Teks Bio --}}
            <div class="w-full md:w-2/3 text-center md:text-left">
                <h2 class="font-display text-5xl md:text-6xl">About Me</h2>
                <p class="mt-6 text-lg leading-relaxed text-gray-300">
                    I am a versatile technologist passionate about building complete digital ecosystems. My skillset revolves around five core pillars: <span class="text-brand-pink font-medium">AI Engineering, Game Development, Mobile & Web Programming, and UI/UX Design.</span>
                    <br><br>
                    From building robust backends with Laravel to creating cross-platform apps with Flutter, I focus on delivering scalable solutions. My work in AI Engineering includes developing intelligent chatbots, while my passion for Game Development drives me to create immersive worlds in Unity. Crucially, I integrate UI/UX Design principles into every project to ensure seamless user interactions. Whether it's infrastructure—backed by my Network Administration background—or frontend aesthetics, I am dedicated to crafting high-quality software.
                </p>
                <div class="mt-8">
                    <a href="#footer" class="inline-block font-medium border-2 border-eggshell rounded-sm px-8 py-3 hover:bg-eggshell hover:text-charcoal transition-colors">
                        Get in Touch &gt;
                    </a>
                </div>
            </div>

        </div>
    </section>
@endsection