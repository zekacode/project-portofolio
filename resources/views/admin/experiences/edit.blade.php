@extends('layouts.admin')
@section('title', 'Edit Pengalaman')
@section('content')
    <h1 class="text-2xl font-bold mb-6">Edit Pengalaman</h1>
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
    
    <form action="{{ route('admin.experiences.update', $experience->id) }}" method="POST">
        @method('PUT')
        @include('admin.experiences._form')
        <div class="flex justify-end mt-6">
            <a href="{{ route('admin.experiences.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded mr-2">Batal</a>
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">Update</button>
        </div>
    </form>
@endsection