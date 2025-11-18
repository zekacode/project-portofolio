@extends('layouts.app')

@section('title', 'Resume - Nama Kamu')

@section('content')
<section class="py-16 md:py-24">
    {{-- Header Halaman & Tombol Download --}}
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-8 mb-16">
        <div>
            <h1 class="font-display text-7xl md:text-8xl">Resume</h1>
            <p class="mt-2 text-lg text-gray-300">Ringkasan perjalanan profesional dan keahlian teknis saya.</p>
        </div>
        <div class="flex-shrink-0 flex flex-col sm:flex-row gap-4">
            {{-- Ganti '#' dengan link ke file PDF CV-mu nanti --}}
            <a href="#" class="inline-block text-center font-medium border-2 border-eggshell rounded-sm px-6 py-3 hover:bg-eggshell hover:text-charcoal transition-colors">
                Download PDF
            </a>
        </div>
    </div>

    {{-- Konten Utama Resume --}}
    <div class="space-y-20">

        {{-- 1. Bagian Pengalaman Kerja --}}
        <div>
            <h2 class="font-display text-5xl border-b-4 border-brand-blue pb-4 mb-8">Pengalaman Kerja</h2>
            <div class="space-y-12">
                
                {{-- Contoh Pengalaman 1 (Hardcoded) --}}
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div class="md:col-span-1">
                        <h3 class="text-xl font-semibold">Full-Stack Web Developer</h3>
                        <p class="font-medium text-brand-pink">Startup Keren, Jakarta</p>
                        <p class="text-sm text-gray-400 mt-1">Jan 2022 - Sekarang</p>
                    </div>
                    <div class="md:col-span-3">
                        <ul class="list-disc list-inside space-y-2 text-gray-300">
                            <li>Mengembangkan dan memelihara fitur utama aplikasi SaaS menggunakan Laravel dan Vue.js.</li>
                            <li>Merancang dan mengimplementasikan skema database MySQL yang efisien.</li>
                            <li>Berkolaborasi dengan tim produk untuk menerjemahkan kebutuhan bisnis menjadi solusi teknis.</li>
                            <li>Mengoptimalkan query database untuk meningkatkan performa aplikasi hingga 30%.</li>
                        </ul>
                    </div>
                </div>

                {{-- Contoh Pengalaman 2 (Hardcoded) --}}
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div class="md:col-span-1">
                        <h3 class="text-xl font-semibold">Junior Web Developer</h3>
                        <p class="font-medium text-brand-pink">Agensi Digital, Bandung</p>
                        <p class="text-sm text-gray-400 mt-1">Jul 2020 - Des 2021</p>
                    </div>
                    <div class="md:col-span-3">
                        <ul class="list-disc list-inside space-y-2 text-gray-300">
                            <li>Membantu dalam pengembangan website company profile untuk berbagai klien menggunakan PHP native dan WordPress.</li>
                            <li>Mengubah desain dari Figma menjadi halaman HTML/CSS yang responsif.</li>
                            <li>Melakukan testing dan debugging untuk memastikan kualitas website sebelum diluncurkan.</li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>

        {{-- 2. Bagian Keahlian / Skills --}}
        <div>
            <h2 class="font-display text-5xl border-b-4 border-brand-blue pb-4 mb-8">Keahlian</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                
                {{-- Kolom Keahlian Teknis --}}
                <div>
                    <h3 class="text-2xl font-semibold mb-4">Teknis</h3>
                    <ul class="list-disc list-inside space-y-2 text-gray-300">
                        <li><span class="font-semibold">Bahasa:</span> PHP, JavaScript, SQL</li>
                        <li><span class="font-semibold">Framework:</span> Laravel, Livewire, Vue.js, Tailwind CSS, Bootstrap</li>
                        <li><span class="font-semibold">Database:</span> MySQL, PostgreSQL</li>
                        <li><span class="font-semibold">Tools:</span> Git, Docker, Composer, NPM, VS Code</li>
                        <li><span class="font-semibold">Lainnya:</span> REST API, OOP, MVC</li>
                    </ul>
                </div>

                {{-- Kolom Keahlian Inti / Soft Skills --}}
                <div>
                    <h3 class="text-2xl font-semibold mb-4">Inti (Core)</h3>
                    <ul class="list-disc list-inside space-y-2 text-gray-300">
                        <li>Problem Solving</li>
                        <li>Kerja Sama Tim & Kolaborasi</li>
                        <li>Manajemen Waktu</li>
                        <li>Komunikasi Teknis</li>
                        <li>Kemauan Belajar yang Tinggi</li>
                    </ul>
                </div>

            </div>
        </div>

        {{-- 3. Bagian Pendidikan --}}
        <div>
            <h2 class="font-display text-5xl border-b-4 border-brand-blue pb-4 mb-8">Pendidikan</h2>
            <div class="space-y-8">
                {{-- Contoh Pendidikan 1 (Hardcoded) --}}
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div class="md:col-span-1">
                        <h3 class="text-xl font-semibold">S1 Teknik Informatika</h3>
                        <p class="font-medium text-brand-pink">Universitas Contoh</p>
                        <p class="text-sm text-gray-400 mt-1">2016 - 2020</p>
                    </div>
                    <div class="md:col-span-3">
                        <p class="text-gray-300">Lulus dengan predikat Cum Laude, fokus pada rekayasa perangkat lunak dan pengembangan web.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection