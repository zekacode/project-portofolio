@extends('layouts.app')

@section('title', 'Resume - Putrawin Adha Muzakki')

@section('content')
<section class="py-16 md:py-24">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-8 mb-16">
        <div>
            <h1 class="font-display text-7xl md:text-8xl">Resume</h1>
            <p class="mt-2 text-lg text-gray-300">An overview of my professional journey and technical expertise</p>
        </div>
        <div class="flex-shrink-0 flex flex-col sm:flex-row gap-4">
            <a href="#" class="inline-block text-center font-medium border-2 border-eggshell rounded-sm px-6 py-3 hover:bg-eggshell hover:text-charcoal transition-colors">
                Download PDF
            </a>
        </div>
    </div>

    <div class="space-y-20">

        {{-- 1. Bagian Pengalaman Kerja (DINAMIS) --}}
        <div>
            <h2 class="font-display text-5xl border-b-4 border-brand-blue pb-4 mb-8">Professional Experience</h2>
            <div class="space-y-12">
                
                @forelse ($experiences as $experience)
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <div class="md:col-span-1">
                            <h3 class="text-xl font-semibold">{{ $experience->job_title }}</h3>
                            <p class="font-medium text-brand-pink">{{ $experience->company_name }}</p>
                            <p class="text-sm text-gray-400 mt-1">
                                {{ $experience->start_date->format('M Y') }} - 
                                {{ $experience->end_date ? $experience->end_date->format('M Y') : 'Now' }}
                            </p>
                        </div>
                        <div class="md:col-span-3">
                            {{-- Menggunakan nl2br() untuk mengubah baris baru menjadi <br> --}}
                            <ul class="list-disc list-inside space-y-2 text-gray-300">
                                @foreach(explode("\n", $experience->responsibilities) as $responsibility)
                                    <li>{{ trim($responsibility) }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-400">No experience details available yet.</p>
                @endforelse

            </div>
        </div>

        {{-- 2. Bagian Keahlian / Skills (DINAMIS) --}}
        <div>
            <h2 class="font-display text-5xl border-b-4 border-brand-blue pb-4 mb-8">Skills</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                
                {{-- Loop melalui kategori skill --}}
                @foreach ($skills as $category => $skillList)
                    <div>
                        <h3 class="text-2xl font-semibold mb-4">{{ $category }}</h3>
                        <ul class="list-disc list-inside space-y-2 text-gray-300">
                            {{-- Loop melalui skill di dalam kategori --}}
                            @foreach ($skillList as $skill)
                                <li>{{ $skill->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
                
                {{-- Jika tidak ada skill sama sekali --}}
                @if($skills->isEmpty())
                    <p class="text-gray-400 md:col-span-2">No skills listed yet.</p>
                @endif

            </div>
        </div>

        {{-- 3. Bagian Pendidikan (DINAMIS) --}}
        <div>
            <h2 class="font-display text-5xl border-b-4 border-brand-blue pb-4 mb-8">Education</h2>
            <div class="space-y-8">
                
                @forelse ($educations as $education)
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <div class="md:col-span-1">
                            <h3 class="text-xl font-semibold">{{ $education->degree }}</h3>
                            <p class="font-medium text-brand-pink">{{ $education->institution_name }}</p>
                            <p class="text-sm text-gray-400 mt-1">
                                {{ $education->start_date->format('Y') }} - {{ $education->end_date->format('Y') }}
                            </p>
                        </div>
                        <div class="md:col-span-3">
                            <p class="text-gray-300">{{ $education->description }}</p>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-400">No education details added yet.</p>
                @endforelse

            </div>
        </div>

    </div>
</section>
@endsection