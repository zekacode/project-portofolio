@extends('layouts.app')

@section('title', 'Project Showcase - Putrawin Adha Muzakki')

@section('content')
<section class="py-16 md:py-24">
    <div class="text-center">
        <h1 class="font-display text-7xl md:text-8xl">Project Showcase</h1>
        <p class="mt-4 text-lg max-w-2xl mx-auto text-gray-300">
            A collection of my recent work and experiments.
        </p>
    </div>

    {{-- Filter Buttons (DINAMIS) --}}
    <div class="flex flex-wrap justify-center items-center gap-4 my-12">
        
        {{-- Tombol "Semua" --}}
        {{-- Jika tidak ada request 'tag', maka tombol ini aktif --}}
        <a href="{{ route('showcase.index') }}" 
        class="px-5 py-2 text-sm font-semibold rounded-full transition-colors
        {{ !request('tag') ? 'bg-eggshell text-charcoal' : 'border border-gray-600 text-gray-300 hover:bg-gray-700' }}">
        Semua
        </a>

        {{-- Loop Tombol Tag --}}
        @foreach ($tags as $tag)
            <a href="{{ route('showcase.index', ['tag' => $tag->slug]) }}" 
            class="px-5 py-2 text-sm font-semibold rounded-full transition-colors
            {{ request('tag') == $tag->slug ? 'bg-eggshell text-charcoal' : 'border border-gray-600 text-gray-300 hover:bg-gray-700' }}">
            {{ $tag->name }}
            </a>
        @endforeach

    </div>

    {{-- Grid Proyek --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-16">
        @forelse ($projects as $project)
            <a href="{{ route('showcase.show', $project->slug) }}" class="group block border-4 border-eggshell rounded-sm transition-transform duration-300 hover:-translate-y-1 hover:-translate-x-1 hover:shadow-[8px_8px_0_0_theme(colors.brand-blue)]">
                <div class="overflow-hidden">
                    {{-- Tampilkan thumbnail jika ada, jika tidak tampilkan placeholder --}}
                    @if ($project->thumbnail)
                        <img src="{{ asset('storage/' . $project->thumbnail) }}" alt="Thumbnail {{ $project->title }}" class="w-full h-60 object-cover">
                    @else
                        <img src="https://placehold.co/600x400/111215/f2f7fc?text={{ urlencode($project->title) }}" alt="Thumbnail {{ $project->title }}" class="w-full h-60 object-cover">
                    @endif
                </div>
                <div class="p-6 border-t-4 border-eggshell">
                    <h3 class="text-2xl font-semibold">{{ $project->title }}</h3>
                    <p class="mt-2 font-light text-gray-300">{{ $project->short_description }}</p>
                    
                    {{-- Tampilkan tags jika ada --}}
                    @if ($project->tags->isNotEmpty())
                        <div class="mt-4 flex flex-wrap gap-2">
                            @foreach ($project->tags as $tag)
                                <span class="bg-navy text-eggshell text-xs font-medium px-3 py-1 rounded-full">{{ $tag->name }}</span>
                            @endforeach
                        </div>
                    @endif
                </div>
            </a>
        @empty
            <div class="md:col-span-2 lg:col-span-3 text-center py-16">
                <p class="text-gray-400 text-lg">More projects coming soon.</p>
            </div>
        @endforelse
    </div>
</section>
@endsection