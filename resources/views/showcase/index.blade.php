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
        
        {{-- Kartu Proyek 1 (Hardcoded) --}}
        <a href="/showcase/contoh-proyek-statis" class="group block border-4 border-eggshell rounded-sm transition-transform duration-300 hover:-translate-y-1 hover:-translate-x-1 hover:shadow-[8px_8px_0_0_theme(colors.brand-blue)]">
            <div class="overflow-hidden">
                <img src="https://placehold.co/600x400/111215/f2f7fc?text=Proyek+Satu" alt="Thumbnail Proyek Satu" class="w-full h-60 object-cover">
            </div>
            <div class="p-6 border-t-4 border-eggshell">
                <h3 class="text-2xl font-semibold">Sistem Manajemen Inventaris</h3>
                <p class="mt-2 font-light text-gray-300">Aplikasi web untuk mengelola stok barang, dibangun dengan Laravel dan Livewire.</p>
                <div class="mt-4 flex flex-wrap gap-2">
                    <span class="bg-navy text-eggshell text-xs font-medium px-3 py-1 rounded-full">Laravel</span>
                    <span class="bg-navy text-eggshell text-xs font-medium px-3 py-1 rounded-full">PHP</span>
                    <span class="bg-navy text-eggshell text-xs font-medium px-3 py-1 rounded-full">Livewire</span>
                </div>
            </div>
        </a>

        {{-- Kartu Proyek 2 (Hardcoded) --}}
        <a href="#" class="group block border-4 border-eggshell rounded-sm transition-transform duration-300 hover:-translate-y-1 hover:-translate-x-1 hover:shadow-[8px_8px_0_0_theme(colors.brand-blue)]">
            <div class="overflow-hidden">
                <img src="https://placehold.co/600x400/ed4723/f2f7fc?text=Proyek+Desain" alt="Thumbnail Proyek Desain" class="w-full h-60 object-cover">
            </div>
            <div class="p-6 border-t-4 border-eggshell">
                <h3 class="text-2xl font-semibold">Desain UI/UX Aplikasi Mobile</h3>
                <p class="mt-2 font-light text-gray-300">Prototipe dan desain antarmuka untuk aplikasi mobile menggunakan Figma.</p>
                <div class="mt-4 flex flex-wrap gap-2">
                    <span class="bg-brand-red text-eggshell text-xs font-medium px-3 py-1 rounded-full">Desain UI/UX</span>
                    <span class="bg-brand-red text-eggshell text-xs font-medium px-3 py-1 rounded-full">Figma</span>
                </div>
            </div>
        </a>

        {{-- Kartu Proyek 3 (Hardcoded) --}}
        <a href="#" class="group block border-4 border-eggshell rounded-sm transition-transform duration-300 hover:-translate-y-1 hover:-translate-x-1 hover:shadow-[8px_8px_0_0_theme(colors.brand-blue)]">
            <div class="overflow-hidden">
                <img src="https://placehold.co/600x400/111215/f2f7fc?text=Proyek+Tiga" alt="Thumbnail Proyek Tiga" class="w-full h-60 object-cover">
            </div>
            <div class="p-6 border-t-4 border-eggshell">
                <h3 class="text-2xl font-semibold">Website Company Profile</h3>
                <p class="mt-2 font-light text-gray-300">Desain dan pengembangan website profil perusahaan dengan sistem CMS kustom.</p>
                <div class="mt-4 flex flex-wrap gap-2">
                    <span class="bg-navy text-eggshell text-xs font-medium px-3 py-1 rounded-full">Laravel</span>
                    <span class="bg-navy text-eggshell text-xs font-medium px-3 py-1 rounded-full">Bootstrap</span>
                </div>
            </div>
        </a>

        {{-- Kartu Proyek 4, 5, 6 (Copy-paste dan modifikasi dari atas) --}}
        {{-- ... Tambahkan 3 kartu lagi di sini untuk mengisi grid ... --}}

    </div>
</section>
@endsection