@extends('layouts.admin')

@section('title', 'Daftar Proyek')

@section('content')
    @if (session('success'))
        <div class="bg-green-500 text-white p-4 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Daftar Proyek</h1>
        <a href="{{ route('admin.projects.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            + Tambah Proyek Baru
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-gray-800 border border-gray-600">
            <thead>
                <tr class="bg-gray-700">
                    <th class="py-3 px-4 text-left">Judul</th>
                    <th class="py-3 px-4 text-left">Slug</th>
                    <th class="py-3 px-4 text-left">Thumbnail</th>
                    <th class="py-3 px-4 text-left">Tags</th>
                    <th class="py-3 px-4 text-left">Tanggal</th>
                    <th class="py-3 px-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($projects as $project)
                    <tr class="border-b border-gray-600">
                        <td class="py-3 px-4">{{ $project->title }}</td>
                        <td class="py-3 px-4 font-mono text-sm">{{ $project->slug }}</td>
                        <td class="py-3 px-4">
                            @if ($project->thumbnail)
                                <img src="{{ asset('storage/' . $project->thumbnail) }}" alt="Thumbnail" class="h-12 w-20 object-cover rounded">
                            @else
                                <span class="text-gray-500 text-xs">No Image</span>
                            @endif
                        </td>
                        <td class="py-3 px-4">
                            @foreach ($project->tags as $tag)
                                <span class="inline-block bg-gray-600 text-gray-300 rounded-full px-3 py-1 text-xs font-semibold mr-2">{{ $tag->name }}</span>
                            @endforeach
                        </td>
                        <td class="py-3 px-4">{{ $project->project_date }}</td>
                        <td class="py-3 px-4 text-center">
                            {{-- Tombol Edit --}}
                            <a href="{{ route('admin.projects.edit', $project->id) }}" class="text-yellow-400 hover:text-yellow-600 font-semibold">Edit</a>
                            
                            <span class="text-gray-500 mx-2">|</span>

                            {{-- Tombol Hapus (menggunakan form) --}}
                            <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus proyek ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-400 hover:text-red-600 font-semibold">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan=5" class="py-4 px-4 text-center text-gray-400">
                            Belum ada proyek. Silakan tambah proyek baru.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection