@extends('layouts.admin')
@section('title', 'Tambah Keahlian Baru')
@section('content')
    <h1 class="text-2xl font-bold mb-6">Tambah Keahlian Baru</h1>

    @if ($errors->any())
        <div class="bg-red-500 text-white p-4 rounded mb-6">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('admin.skills.store') }}" method="POST">
        @include('admin.skills._form')
        <div class="flex justify-end mt-6">
            <a href="{{ route('admin.skills.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded mr-2">Batal</a>
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">Simpan</button>
        </div>
    </form>
@endsection