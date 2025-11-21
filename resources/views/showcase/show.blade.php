@extends('layouts.app')

{{-- Judul halaman dinamis --}}
@section('title', 'Proyek: ' . $project->title)

@section('content')
<section class="py-16 md:py-24">
    <div class="max-w-4xl mx-auto">
        
        {{-- Header Proyek --}}
        <div class="text-center">
            <h1 class="font-display text-6xl md:text-7xl">{{ $project->title }}</h1>
            <p class="mt-4 text-lg text-gray-300">{{ $project->short_description }}</p>
        </div>

        {{-- Gambar Utama Proyek --}}
        <div class="mt-12 md:mt-16">
            @if ($project->thumbnail)
                <img src="{{ asset('storage/' . $project->thumbnail) }}" alt="Tampilan utama {{ $project->title }}"
                     class="w-full h-auto rounded-md border-4 border-gray-700">
            @endif
        </div>

        {{-- Konten Detail Proyek --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12 mt-12 md:mt-16">
            
            {{-- Kolom Kiri: Deskripsi Lengkap --}}
            <div class="md:col-span-2 prose prose-invert prose-lg max-w-none">
                {{-- Gunakan {!! !!} untuk merender HTML dari database --}}
                {!! $project->content !!}
            </div>

            {{-- Kolom Kanan: Info Tambahan --}}
            <div class="md:col-span-1">
                <div class="sticky top-24 bg-charcoal p-6 rounded-md border border-gray-700">
                    <h3 class="text-xl font-semibold border-b border-gray-600 pb-3">Info Proyek</h3>
                    
                    <div class="mt-4 space-y-4">
                        {{-- Tampilkan Tags --}}
                        @if ($project->tags->isNotEmpty())
                            <div>
                                <h4 class="text-sm font-bold text-gray-400 uppercase tracking-wider">Teknologi</h4>
                                <div class="mt-2 flex flex-wrap gap-2">
                                    @foreach ($project->tags as $tag)
                                        <span class="bg-navy text-eggshell text-xs font-medium px-3 py-1 rounded-full">{{ $tag->name }}</span>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        {{-- Tampilkan Tanggal --}}
                        <div>
                            <h4 class="text-sm font-bold text-gray-400 uppercase tracking-wider">Tanggal</h4>
                            <p class="text-gray-300">{{ $project->project_date->format('F Y') }}</p>
                        </div>
                    </div>

                    {{-- Tampilkan Links jika ada --}}
                    @if (!empty($project->links['github']) || !empty($project->links['demo']))
                        <div class="mt-6 pt-4 border-t border-gray-600 space-y-3">
                            @if (!empty($project->links['github']))
                                <a href="{{ $project->links['github'] }}" target="_blank" rel="noopener noreferrer" class="flex items-center gap-2 font-semibold text-brand-blue hover:underline">
                                    <svg ...>...</svg> {{-- (SVG GitHub) --}}
                                    <span>Lihat di GitHub</span>
                                </a>
                            @endif
                            @if (!empty($project->links['demo']))
                                <a href="{{ $project->links['demo'] }}" target="_blank" rel="noopener noreferrer" class="flex items-center gap-2 font-semibold text-brand-blue hover:underline">
                                    <svg ...>...</svg> {{-- (SVG Live Demo) --}}
                                    <span>Kunjungi Live Demo</span>
                                </a>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- Tombol Navigasi Kembali --}}
        <div class="text-center mt-20">
            <a href="{{ route('showcase.index') }}" class="inline-block font-medium border-2 border-eggshell rounded-sm px-8 py-3 hover:bg-eggshell hover:text-charcoal transition-colors">
                &lt; Kembali ke Semua Proyek
            </a>
        </div>
    </div>
</section>
@endsection