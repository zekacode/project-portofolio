@extends('layouts.app')

{{-- Judul halaman akan kita isi dengan judul proyek --}}
@section('title', 'Detail Proyek: Sistem Manajemen Inventaris')

@section('content')
<section class="py-16 md:py-24">
    <div class="max-w-4xl mx-auto">
        
        {{-- Header Proyek --}}
        <div class="text-center">
            <h1 class="font-display text-6xl md:text-7xl">Sistem Manajemen Inventaris</h1>
            <p class="mt-4 text-lg text-gray-300">Aplikasi web untuk mengelola stok barang, dibangun dengan Laravel dan Livewire.</p>
        </div>

        {{-- Gambar Utama Proyek --}}
        <div class="mt-12 md:mt-16">
            <img src="https://placehold.co/1200x600/111215/f2f7fc?text=Gambar+Utama+Proyek" 
                 alt="Tampilan utama Sistem Manajemen Inventaris"
                 class="w-full h-auto rounded-md border-4 border-gray-700">
        </div>

        {{-- Konten Detail Proyek --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12 mt-12 md:mt-16">
            
            {{-- Kolom Kiri: Deskripsi Lengkap --}}
            <div class="md:col-span-2 prose prose-invert prose-lg max-w-none">
                <h2>Tentang Proyek</h2>
                <p>
                    Proyek ini adalah sebuah aplikasi berbasis web yang dirancang untuk membantu usaha kecil dan menengah (UKM) dalam melacak dan mengelola inventaris produk mereka. Tujuannya adalah untuk menyediakan solusi yang sederhana, intuitif, namun kuat untuk menggantikan pencatatan manual yang rentan terhadap kesalahan.
                </p>
                
                <h3>Tantangan</h3>
                <p>
                    Tantangan utama adalah menciptakan sistem yang *real-time* dan mudah digunakan oleh pengguna yang mungkin tidak terlalu akrab dengan teknologi. Aplikasi harus mampu menangani penambahan produk, pembaruan stok, pencatatan barang masuk dan keluar, serta menyediakan laporan sederhana.
                </p>

                <h3>Solusi & Fitur Utama</h3>
                <ul>
                    <li><strong>Dashboard Interaktif:</strong> Menampilkan ringkasan stok, produk terlaris, dan notifikasi stok rendah.</li>
                    <li><strong>Manajemen Produk (CRUD):</strong> Fungsionalitas penuh untuk membuat, membaca, memperbarui, dan menghapus data produk.</li>
                    <li><strong>Pencatatan Transaksi:</strong> Mencatat setiap barang yang masuk dan keluar untuk audit.</li>
                    <li><strong>Pencarian Cepat:</strong> Fitur pencarian *real-time* untuk menemukan produk dengan cepat, dibangun menggunakan Livewire.</li>
                    <li><strong>Ekspor Laporan:</strong> Kemampuan untuk mengunduh laporan stok dalam format CSV.</li>
                </ul>
            </div>

            {{-- Kolom Kanan: Info Tambahan --}}
            <div class="md:col-span-1">
                <div class="sticky top-24 bg-charcoal p-6 rounded-md border border-gray-700">
                    <h3 class="text-xl font-semibold border-b border-gray-600 pb-3">Info Proyek</h3>
                    
                    <div class="mt-4 space-y-4">
                        <div>
                            <h4 class="text-sm font-bold text-gray-400 uppercase tracking-wider">Teknologi</h4>
                            <div class="mt-2 flex flex-wrap gap-2">
                                <span class="bg-navy text-eggshell text-xs font-medium px-3 py-1 rounded-full">Laravel</span>
                                <span class="bg-navy text-eggshell text-xs font-medium px-3 py-1 rounded-full">PHP</span>
                                <span class="bg-navy text-eggshell text-xs font-medium px-3 py-1 rounded-full">Livewire</span>
                                <span class="bg-navy text-eggshell text-xs font-medium px-3 py-1 rounded-full">Alpine.js</span>
                                <span class="bg-navy text-eggshell text-xs font-medium px-3 py-1 rounded-full">MySQL</span>
                                <span class="bg-navy text-eggshell text-xs font-medium px-3 py-1 rounded-full">Tailwind CSS</span>
                            </div>
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-gray-400 uppercase tracking-wider">Tanggal</h4>
                            <p class="text-gray-300">Maret 2023</p>
                        </div>
                    </div>

                    <div class="mt-6 pt-4 border-t border-gray-600 space-y-3">
                        {{-- Ganti '#' dengan link asli nanti --}}
                        <a href="#" class="flex items-center gap-2 font-semibold text-brand-blue hover:underline">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 0C4.477 0 0 4.477 0 10c0 4.418 2.865 8.166 6.839 9.489.5.092.682-.217.682-.482 0-.237-.009-.868-.014-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.031-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0110 4.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.203 2.398.1 2.651.64.7 1.03 1.595 1.03 2.688 0 3.848-2.338 4.695-4.566 4.942.359.308.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.001 10.001 0 0020 10c0-5.523-4.477-10-10-10z" clip-rule="evenodd" /></svg>
                            <span>Lihat di GitHub</span>
                        </a>
                        <a href="#" class="flex items-center gap-2 font-semibold text-brand-blue hover:underline">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 001.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z" /><path d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z" /></svg>
                            <span>Kunjungi Live Demo</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Tombol Navigasi Kembali --}}
        <div class="text-center mt-20">
            <a href="/showcase" class="inline-block font-medium border-2 border-eggshell rounded-sm px-8 py-3 hover:bg-eggshell hover:text-charcoal transition-colors">
                &lt; Kembali ke Semua Proyek
            </a>
        </div>
    </div>
</section>
@endsection