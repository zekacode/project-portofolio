@extends('layouts.app')

@section('title', 'Selected Work - Nama Kamu')

@section('content')
<section class="py-16 md:py-24">
    <div class="text-center">
        <h1 class="font-display text-7xl md:text-8xl">Selected Work</h1>
        <p class="mt-4 text-lg max-w-2xl mx-auto text-gray-300">
            Berikut adalah beberapa proyek yang pernah saya kerjakan, mencakup pengembangan web dan sedikit desain.
        </p>
    </div>

    {{-- Filter Buttons (Statis, belum fungsional) --}}
    <div class="flex justify-center items-center gap-4 my-12">
        <button class="bg-eggshell text-charcoal rounded-full px-5 py-2 text-sm font-semibold">Semua</button>
        <button class="border border-gray-600 text-gray-300 rounded-full px-5 py-2 text-sm font-semibold hover:bg-gray-700 transition-colors">Kode</button>
        <button class="border border-gray-600 text-gray-300 rounded-full px-5 py-2 text-sm font-semibold hover:bg-gray-700 transition-colors">Desain</button>
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
                <p class="text-gray-400 text-lg">Belum ada proyek yang ditambahkan.</p>
            </div>
        @endforelse
    </div>
</section>
@endsection