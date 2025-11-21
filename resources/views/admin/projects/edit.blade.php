@extends('layouts.admin')

@section('title', 'Edit Proyek: ' . $project->title)

@section('content')
    <h1 class="text-2xl font-bold mb-6">Edit Proyek: {{ $project->title }}</h1>

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

    <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        {{-- Judul Proyek --}}
        <div>
            <label for="title" class="block text-sm font-medium text-gray-300">Judul Proyek</label>
            <input type="text" name="title" id="title" value="{{ old('title', $project->title) }}" required
                   class="mt-1 block w-full bg-gray-700 border border-gray-600 rounded-md shadow-sm py-2 px-3 text-white focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        {{-- Slug (URL) --}}
        <div>
            <label for="slug" class="block text-sm font-medium text-gray-300">Slug (URL)</label>
            <input type="text" name="slug" id="slug" value="{{ old('slug', $project->slug) }}" required
                   class="mt-1 block w-full bg-gray-700 border border-gray-600 rounded-md shadow-sm py-2 px-3 text-white focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                   placeholder="contoh: sistem-manajemen-inventaris">
            <p class="mt-2 text-sm text-gray-400">Gunakan huruf kecil, angka, dan tanda hubung (-). Akan digunakan untuk URL.</p>
        </div>

        {{-- Thumbnail --}}
        <div>
            <label for="thumbnail" class="block text-sm font-medium text-gray-300">Thumbnail Proyek</label>
            <input type="file" name="thumbnail" id="thumbnail"
                class="mt-1 block w-full ..."> {{-- (class sama seperti di atas) --}}
            <p class="mt-2 text-sm text-gray-400">Kosongkan jika tidak ingin mengubah thumbnail.</p>
            
            {{-- Tampilkan thumbnail saat ini jika ada --}}
            @if ($project->thumbnail)
                <div class="mt-4">
                    <p class="text-sm text-gray-400">Thumbnail Saat Ini:</p>
                    <img src="{{ asset('storage/' . $project->thumbnail) }}" alt="Thumbnail {{ $project->title }}" class="mt-2 w-48 h-auto rounded-md border border-gray-600">
                </div>
            @endif
        </div>

        {{-- Tags --}}
        <div>
            <label class="block text-sm font-medium text-gray-300">Tags</label>
            <div class="mt-2 space-y-2">
                @foreach ($tags as $tag)
                    <div class="flex items-center">
                        <input id="tag-{{ $tag->id }}" name="tags[]" type="checkbox" value="{{ $tag->id }}"
                            @if(in_array($tag->id, $project->tags->pluck('id')->toArray())) checked @endif
                            class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        <label for="tag-{{ $tag->id }}" class="ml-3 block text-sm font-medium text-gray-300">{{ $tag->name }}</label>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Tanggal Proyek --}}
        <div>
            <label for="project_date" class="block text-sm font-medium text-gray-300">Tanggal Proyek</label>
            <input type="date" name="project_date" id="project_date" value="{{ old('project_date', $project->project_date->format('Y-m-d')) }}" required
                   class="mt-1 block w-full bg-gray-700 border border-gray-600 rounded-md shadow-sm py-2 px-3 text-white focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        {{-- Deskripsi Singkat --}}
        <div>
            <label for="short_description" class="block text-sm font-medium text-gray-300">Deskripsi Singkat</label>
            <textarea name="short_description" id="short_description" rows="3" required
                      class="mt-1 block w-full bg-gray-700 border border-gray-600 rounded-md shadow-sm py-2 px-3 text-white focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">{{ old('short_description', $project->short_description) }}</textarea>
        </div>

        {{-- Konten / Deskripsi Lengkap --}}
        <div>
            <label for="content" class="block text-sm font-medium text-gray-300">Konten / Deskripsi Lengkap</label>
            <textarea name="content" id="content" rows="10" required
                      class="mt-1 block w-full bg-gray-700 border border-gray-600 rounded-md shadow-sm py-2 px-3 text-white focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">{{ old('content', $project->content) }}</textarea>
            <p class="mt-2 text-sm text-gray-400">Anda bisa menggunakan tag HTML di sini.</p>
        </div>
        
        {{-- Link-link (GitHub, Live Demo) --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="link_github" class="block text-sm font-medium text-gray-300">Link GitHub</label>
                <input type="url" name="links[github]" id="link_github" value="{{ old('links.github', $project->links['github'] ?? '') }}"
                       class="mt-1 block w-full bg-gray-700 border border-gray-600 rounded-md shadow-sm py-2 px-3 text-white focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                       placeholder="https://github.com/user/repo">
            </div>
            <div>
                <label for="link_demo" class="block text-sm font-medium text-gray-300">Link Live Demo</label>
                <input type="url" name="links[demo]" id="link_demo" value="{{ old('links.demo', $project->links['demo'] ?? '') }}"
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
                Update Proyek
            </button>
        </div>
    </form>
@endsection