{{-- File: resources/views/admin/skills/index.blade.php --}}
@extends('layouts.admin')
@section('title', 'Daftar Keahlian')

@section('content')
    @if (session('success'))
        <div class="bg-green-500 text-white p-4 rounded mb-6">{{ session('success') }}</div>
    @endif

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Daftar Keahlian</h1>
        <a href="{{ route('admin.skills.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            + Tambah Keahlian
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-gray-800 border border-gray-600">
            <thead>
                <tr class="bg-gray-700">
                    <th class="py-3 px-4 text-left">Nama Keahlian</th>
                    <th class="py-3 px-4 text-left">Kategori</th>
                    <th class="py-3 px-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($skills as $skill)
                    <tr class="border-b border-gray-600">
                        <td class="py-3 px-4">{{ $skill->name }}</td>
                        <td class="py-3 px-4">{{ $skill->category }}</td>
                        <td class="py-3 px-4 text-center">
                            <a href="{{ route('admin.skills.edit', $skill->id) }}" class="text-yellow-400 hover:text-yellow-600 font-semibold">Edit</a>
                            <span class="text-gray-500 mx-2">|</span>
                            <form action="{{ route('admin.skills.destroy', $skill->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus keahlian ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-400 hover:text-red-600 font-semibold">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="py-4 px-4 text-center text-gray-400">Belum ada keahlian.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection