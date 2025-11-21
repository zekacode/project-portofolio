{{-- File: resources/views/admin/educations/_form.blade.php --}}

@csrf
<div class="space-y-6">
    {{-- Nama Institusi --}}
    <div>
        <label for="institution_name" class="block text-sm font-medium text-gray-300">Nama Institusi</label>
        <input type="text" name="institution_name" id="institution_name" value="{{ old('institution_name', $education->institution_name ?? '') }}" required
               class="mt-1 block w-full bg-gray-700 border border-gray-600 rounded-md shadow-sm py-2 px-3 text-white focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
               placeholder="Contoh: Universitas Contoh">
    </div>

    {{-- Gelar & Jurusan --}}
    <div>
        <label for="degree" class="block text-sm font-medium text-gray-300">Gelar & Jurusan</label>
        <input type="text" name="degree" id="degree" value="{{ old('degree', $education->degree ?? '') }}" required
               class="mt-1 block w-full bg-gray-700 border border-gray-600 rounded-md shadow-sm py-2 px-3 text-white focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
               placeholder="Contoh: S1 Teknik Informatika">
    </div>

    {{-- Periode Waktu --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label for="start_date" class="block text-sm font-medium text-gray-300">Tanggal Mulai</p>
            <input type="date" name="start_date" id="start_date" value="{{ old('start_date', isset($education) ? $education->start_date->format('Y-m-d') : '') }}" required
                   class="mt-1 block w-full bg-gray-700 border border-gray-600 rounded-md shadow-sm py-2 px-3 text-white focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
        </div>
        <div>
            <label for="end_date" class="block text-sm font-medium text-gray-300">Tanggal Selesai</p>
            <input type="date" name="end_date" id="end_date" value="{{ old('end_date', isset($education) ? $education->end_date->format('Y-m-d') : '') }}" required
                   class="mt-1 block w-full bg-gray-700 border border-gray-600 rounded-md shadow-sm py-2 px-3 text-white focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
        </div>
    </div>

    {{-- Deskripsi Singkat --}}
    <div>
        <label for="description" class="block text-sm font-medium text-gray-300">Deskripsi Singkat (Opsional)</label>
        <textarea name="description" id="description" rows="3"
                  class="mt-1 block w-full bg-gray-700 border border-gray-600 rounded-md shadow-sm py-2 px-3 text-white focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">{{ old('description', $education->description ?? '') }}</textarea>
        <p class="mt-1 text-sm text-gray-400">Contoh: Lulus dengan IPK 3.8, judul skripsi tentang...</p>
    </div>
</div>