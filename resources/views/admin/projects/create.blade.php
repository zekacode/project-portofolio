@extends('layouts.admin')

@section('title', 'Tambah Proyek Baru')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Tambah Proyek Baru</h1>

    {{-- Menampilkan error validasi jika ada --}}
    @if ($errors->any())
        <div class="bg-red-500 text-white p-4 rounded mb-6">
            <strong class="font-bold">Oops! Ada beberapa masalah dengan input Anda.</strong>
            <ul class="mt-2 list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        {{-- Judul Proyek --}}
        <div>
            <label for="title" class="block text-sm font-medium text-gray-300">Judul Proyek</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" required
                   class="mt-1 block w-full bg-gray-700 border border-gray-600 rounded-md shadow-sm py-2 px-3 text-white focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        {{-- Slug (URL) --}}
        <div>
            <label for="slug" class="block text-sm font-medium text-gray-300">Slug (URL)</label>
            <input type="text" name="slug" id="slug" value="{{ old('slug') }}" required
                   class="mt-1 block w-full bg-gray-700 border border-gray-600 rounded-md shadow-sm py-2 px-3 text-white focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                   placeholder="contoh: sistem-manajemen-inventaris">
            <p class="mt-2 text-sm text-gray-400">Gunakan huruf kecil, angka, dan tanda hubung (-). Akan digunakan untuk URL.</p>
        </div>

        {{-- Thumbnail --}}
        <div>
            <label for="thumbnail" class="block text-sm font-medium text-gray-300">Thumbnail Proyek</label>
            <input type="file" name="thumbnail" id="thumbnail"
                class="mt-1 block w-full text-sm text-gray-400
                        file:mr-4 file:py-2 file:px-4
                        file:rounded-full file:border-0
                        file:text-sm file:font-semibold
                        file:bg-indigo-50 file:text-indigo-700
                        hover:file:bg-indigo-100">
            <p class="mt-2 text-sm text-gray-400">Format yang didukung: JPG, PNG, WEBP. Maksimal 2MB.</p>
        </div>

        {{-- Tanggal Proyek --}}
        <div>
            <label for="project_date" class="block text-sm font-medium text-gray-300">Tanggal Proyek</label>
            <input type="date" name="project_date" id="project_date" value="{{ old('project_date') }}" required
                   class="mt-1 block w-full bg-gray-700 border border-gray-600 rounded-md shadow-sm py-2 px-3 text-white focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        {{-- Deskripsi Singkat --}}
        <div>
            <label for="short_description" class="block text-sm font-medium text-gray-300">Deskripsi Singkat</label>
            <textarea name="short_description" id="short_description" rows="3" required
                      class="mt-1 block w-full bg-gray-700 border border-gray-600 rounded-md shadow-sm py-2 px-3 text-white focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">{{ old('short_description') }}</textarea>
        </div>

        {{-- Konten / Deskripsi Lengkap --}}
        <div>
            <label for="content" class="block text-sm font-medium text-gray-300">Konten / Deskripsi Lengkap</label>
            <textarea name="content" id="content" rows="10" required
                      class="mt-1 block w-full bg-gray-700 border border-gray-600 rounded-md shadow-sm py-2 px-3 text-white focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">{{ old('content') }}</textarea>
            <p class="mt-2 text-sm text-gray-400">Anda bisa menggunakan tag HTML di sini.</p>
        </div>
        
        {{-- Link-link (GitHub, Live Demo) --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="link_github" class="block text-sm font-medium text-gray-300">Link GitHub</label>
                <input type="url" name="links[github]" id="link_github" value="{{ old('links.github') }}"
                       class="mt-1 block w-full bg-gray-700 border border-gray-600 rounded-md shadow-sm py-2 px-3 text-white focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                       placeholder="https://github.com/user/repo">
            </div>
            <div>
                <label for="link_demo" class="block text-sm font-medium text-gray-300">Link Live Demo</label>
                <input type="url" name="links[demo]" id="link_demo" value="{{ old('links.demo') }}"
                       class="mt-1 block w-full bg-gray-700 border border-gray-600 rounded-md shadow-sm py-2 px-3 text-white focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                       placeholder="https://proyek-anda.com">
            </div>
        </div>

        {{-- Tombol Submit --}}
        <div class="flex justify-end">
            <a href="{{ route('admin.projects.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded mr-2">
                Batal
            </a>
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                Simpan Proyek
            </button>
        </div>
    </form>
@endsection