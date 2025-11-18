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
        <h2 class="font-display text-5xl md:text-6xl text-center mb-12">Selected Work</h2>
        
        {{-- Grid Proyek --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            {{-- Kartu Proyek 1 (Hardcoded) --}}
            <a href="#" class="group block border-4 border-eggshell rounded-sm transition-transform duration-300 hover:-translate-y-1 hover:-translate-x-1 hover:shadow-[8px_8px_0_0_#368ef3]">
                <div class="overflow-hidden">
                    <img src="https://placehold.co/600x400/111215/f2f7fc?text=Proyek+Satu" alt="Thumbnail Proyek Satu" class="w-full h-60 object-cover">
                </div>
                <div class="p-6 border-t-4 border-eggshell">
                    <h3 class="text-2xl font-semibold">Sistem Manajemen Inventaris</h3>
                    <p class="mt-2 font-light text-gray-300">Aplikasi web untuk mengelola stok barang, dibangun dengan Laravel dan Livewire.</p>
                </div>
            </a>

            {{-- Kartu Proyek 2 (Hardcoded) --}}
            <a href="#" class="group block border-4 border-eggshell rounded-sm transition-transform duration-300 hover:-translate-y-1 hover:-translate-x-1 hover:shadow-[8px_8px_0_0_#368ef3]">
                <div class="overflow-hidden">
                    <img src="https://placehold.co/600x400/111215/f2f7fc?text=Proyek+Dua" alt="Thumbnail Proyek Dua" class="w-full h-60 object-cover">
                </div>
                <div class="p-6 border-t-4 border-eggshell">
                    <h3 class="text-2xl font-semibold">Website Company Profile</h3>
                    <p class="mt-2 font-light text-gray-300">Desain dan pengembangan website profil perusahaan dengan sistem CMS kustom.</p>
                </div>
            </a>

            {{-- Kartu Proyek 3 (Hardcoded) --}}
            <a href="#" class="group block border-4 border-eggshell rounded-sm transition-transform duration-300 hover:-translate-y-1 hover:-translate-x-1 hover:shadow-[8px_8px_0_0_#368ef3]">
                <div class="overflow-hidden">
                    <img src="https://placehold.co/600x400/111215/f2f7fc?text=Proyek+Tiga" alt="Thumbnail Proyek Tiga" class="w-full h-60 object-cover">
                </div>
                <div class="p-6 border-t-4 border-eggshell">
                    <h3 class="text-2xl font-semibold">Desain UI/UX Aplikasi Mobile</h3>
                    <p class="mt-2 font-light text-gray-300">Prototipe dan desain antarmuka untuk aplikasi mobile menggunakan Figma.</p>
                </div>
            </a>

        </div>
        <div class="text-center mt-12">
            <a href="/showcase" class="inline-block font-medium border-2 border-eggshell rounded-sm px-8 py-3 hover:bg-eggshell hover:text-charcoal transition-colors">
                Lihat Semua Proyek &gt;
            </a>
        </div>
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
                <h2 class="font-display text-5xl md:text-6xl">Siapa Saya?</h2>
                <p class="mt-6 text-lg leading-relaxed text-gray-300">
                    Saya adalah seorang <span class="text-brand-pink font-medium">web programmer</span> dan <span class="text-brand-pink font-medium">problem solver</span> dari Indonesia. Saat ini terbuka untuk kesempatan kerja baru dan proyek freelance.
                    <br><br>
                    Dengan pengalaman dalam membangun aplikasi dari awal hingga akhir, saya menikmati setiap proses dalam siklus pengembangan perangkat lunak. Saya sangat tertarik pada teknologi backend, terutama dalam ekosistem <span class="font-semibold">Laravel</span>, dan selalu bersemangat untuk belajar hal-hal baru.
                    <br><br>
                    Ketika tidak sedang *ngoding*, saya suka membaca buku tentang teknologi atau bermain game. Mari terhubung!
                </p>
                <div class="mt-8">
                    <a href="#footer" class="inline-block font-medium border-2 border-eggshell rounded-sm px-8 py-3 hover:bg-eggshell hover:text-charcoal transition-colors">
                        Hubungi Saya &gt;
                    </a>
                </div>
            </div>

        </div>
    </section>
@endsection