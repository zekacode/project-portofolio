{{-- File: resources/views/admin/skills/_form.blade.php --}}
@csrf
<div class="space-y-6">
    <div>
        <label for="name" class="block text-sm font-medium text-gray-300">Nama Keahlian</label>
        <input type="text" name="name" id="name" value="{{ old('name', $skill->name ?? '') }}" required class="mt-1 block w-full bg-gray-700 border border-gray-600 rounded-md shadow-sm py-2 px-3 text-white focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
    </div>
    <div>
        <label for="category" class="block text-sm font-medium text-gray-300">Kategori</label>
        <input type="text" name="category" id="category" value="{{ old('category', $skill->category ?? '') }}" required class="mt-1 block w-full bg-gray-700 border border-gray-600 rounded-md shadow-sm py-2 px-3 text-white focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" placeholder="Contoh: Bahasa, Framework, Tools, Inti">
    </div>
</div>