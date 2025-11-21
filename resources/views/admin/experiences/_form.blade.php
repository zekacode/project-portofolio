{{-- File: resources/views/admin/experiences/_form.blade.php --}}
@csrf
<div class="space-y-6">
    <div>
        <label for="job_title" class="block text-sm font-medium text-gray-300">Jabatan</label>
        <input type="text" name="job_title" id="job_title" value="{{ old('job_title', $experience->job_title ?? '') }}" required class="mt-1 block w-full bg-gray-700 border border-gray-600 rounded-md shadow-sm py-2 px-3 text-white focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
    </div>
    <div>
        <label for="company_name" class="block text-sm font-medium text-gray-300">Nama Perusahaan</label>
        <input type="text" name="company_name" id="company_name" value="{{ old('company_name', $experience->company_name ?? '') }}" required class="mt-1 block w-full bg-gray-700 border border-gray-600 rounded-md shadow-sm py-2 px-3 text-white focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label for="start_date" class="block text-sm font-medium text-gray-300">Tanggal Mulai</label>
            <input type="date" name="start_date" id="start_date" value="{{ old('start_date', isset($experience) ? $experience->start_date->format('Y-m-d') : '') }}" required class="mt-1 block w-full bg-gray-700 border border-gray-600 rounded-md shadow-sm py-2 px-3 text-white focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
        </div>
        <div>
            <label for="end_date" class="block text-sm font-medium text-gray-300">Tanggal Selesai</label>
            <input type="date" name="end_date" id="end_date" value="{{ old('end_date', isset($experience) && $experience->end_date ? $experience->end_date->format('Y-m-d') : '') }}" class="mt-1 block w-full bg-gray-700 border border-gray-600 rounded-md shadow-sm py-2 px-3 text-white focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            <p class="mt-1 text-sm text-gray-400">Kosongkan jika masih bekerja di sini.</p>
        </div>
    </div>
    <div>
        <label for="responsibilities" class="block text-sm font-medium text-gray-300">Tanggung Jawab</label>
        <textarea name="responsibilities" id="responsibilities" rows="5" required class="mt-1 block w-full bg-gray-700 border border-gray-600 rounded-md shadow-sm py-2 px-3 text-white focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">{{ old('responsibilities', $experience->responsibilities ?? '') }}</textarea>
        <p class="mt-1 text-sm text-gray-400">Satu poin per baris.</p>
    </div>
</div>