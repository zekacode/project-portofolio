@extends('layouts.app')

@section('title', 'Resume - Nama Kamu')

@section('content')
<section class="py-16 md:py-24">
    {{-- ... (Bagian Header Halaman & Tombol Download tetap sama) ... --}}
    <div class="flex flex-col md:flex-row ...">
        ...
    </div>

    <div class="space-y-20">

        {{-- 1. Bagian Pengalaman Kerja (DINAMIS) --}}
        <div>
            <h2 class="font-display text-5xl border-b-4 border-brand-blue pb-4 mb-8">Pengalaman Kerja</h2>
            <div class="space-y-12">
                
                @forelse ($experiences as $experience)
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <div class="md:col-span-1">
                            <h3 class="text-xl font-semibold">{{ $experience->job_title }}</h3>
                            <p class="font-medium text-brand-pink">{{ $experience->company_name }}</p>
                            <p class="text-sm text-gray-400 mt-1">
                                {{ $experience->start_date->format('M Y') }} - 
                                {{ $experience->end_date ? $experience->end_date->format('M Y') : 'Sekarang' }}
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
                    <p class="text-gray-400">Belum ada pengalaman kerja yang ditambahkan.</p>
                @endforelse

            </div>
        </div>

        {{-- 2. Bagian Keahlian / Skills (DINAMIS) --}}
        <div>
            <h2 class="font-display text-5xl border-b-4 border-brand-blue pb-4 mb-8">Keahlian</h2>
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
                    <p class="text-gray-400 md:col-span-2">Belum ada keahlian yang ditambahkan.</p>
                @endif

            </div>
        </div>

        {{-- 3. Bagian Pendidikan (DINAMIS) --}}
        <div>
            <h2 class="font-display text-5xl border-b-4 border-brand-blue pb-4 mb-8">Pendidikan</h2>
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
                    <p class="text-gray-400">Belum ada riwayat pendidikan yang ditambahkan.</p>
                @endforelse

            </div>
        </div>

    </div>
</section>
@endsection