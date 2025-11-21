{{-- File: resources/views/admin/tags/index.blade.php --}}
@extends('layouts.admin')
@section('title', 'Daftar Tags')

@section('content')
    @if (session('success'))
        <div class="bg-green-500 text-white p-4 rounded mb-6">{{ session('success') }}</div>
    @endif

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Daftar Tags</h1>
        <a href="{{ route('admin.tags.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            + Tambah Tag Baru
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-gray-800 border border-gray-600">
            <thead>
                <tr class="bg-gray-700">
                    <th class="py-3 px-4 text-left">Nama</th>
                    <th class="py-3 px-4 text-left">Slug</th>
                    <th class="py-3 px-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tags as $tag)
                    <tr class="border-b border-gray-600">
                        <td class="py-3 px-4">{{ $tag->name }}</td>
                        <td class="py-3 px-4 font-mono text-sm">{{ $tag->slug }}</td>
                        <td class="py-3 px-4 text-center">
                            <a href="{{ route('admin.tags.edit', $tag->id) }}" class="text-yellow-400 hover:text-yellow-600 font-semibold">Edit</a>
                            <span class="text-gray-500 mx-2">|</span>
                            <form action="{{ route('admin.tags.destroy', $tag->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus tag ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-400 hover:text-red-600 font-semibold">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="py-4 px-4 text-center text-gray-400">Belum ada tag.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection