{{-- File: resources/views/admin/tags/edit.blade.php --}}
@extends('layouts.admin')
@section('title', 'Edit Tag')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Edit Tag: {{ $tag->name }}</h1>

    @if ($errors->any())
        <div class="bg-red-500 text-white p-4 rounded mb-6">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.tags.update', $tag->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')
        <div>
            <label for="name" class="block text-sm font-medium text-gray-300">Nama Tag</label>
            <input type="text" name="name" id="name" value="{{ old('name', $tag->name) }}" required class="mt-1 block w-full bg-gray-700 border border-gray-600 rounded-md shadow-sm py-2 px-3 text-white focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
        </div>
        <div class="flex justify-end">
            <a href="{{ route('admin.tags.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded mr-2">Batal</a>
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">Update Tag</button>
        </div>
    </form>
@endsection