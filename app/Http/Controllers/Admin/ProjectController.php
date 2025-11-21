<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Tag;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua proyek dari database
        $projects = Project::latest()->get(); // `latest()` untuk mengurutkan dari yang terbaru

        // Kirim data projects ke view
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tag::orderBy('name')->get(); // Ambil semua tag, urutkan berdasarkan nama
        return view('admin.projects.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validasi Input
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:projects,slug', // slug harus unik di tabel projects
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'project_date' => 'required|date',
            'short_description' => 'required|string',
            'content' => 'required|string',
            'links.github' => 'nullable|url', // Boleh kosong, tapi jika diisi harus URL valid
            'links.demo' => 'nullable|url',
            'tags' => 'nullable|array', // Boleh kosong, tapi jika ada harus berupa array
            'tags.*' => 'exists:tags,id', // Setiap item di dalam array tags harus ada di tabel tags
        ]);

        $thumbnailPath = null;
        // 2. Proses Upload Gambar jika ada
        if ($request->hasFile('thumbnail')) {
            // Simpan file di folder 'public/thumbnails' dan dapatkan path-nya
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        // 3. Buat Proyek Baru di Database
        Project::create([
            'title' => $validated['title'],
            'slug' => $validated['slug'],
            'thumbnail' => $thumbnailPath,
            'project_date' => $validated['project_date'],
            'short_description' => $validated['short_description'],
            'content' => $validated['content'],
            'links' => [
                'github' => $validated['links']['github'] ?? null,
                'demo' => $validated['links']['demo'] ?? null,
            ],
        ]);

        // Jika ada tag yang dipilih, lampirkan ke proyek
        if (!empty($validated['tags'])) {
            $project->tags()->attach($validated['tags']);
        }

        // 4. Redirect ke Halaman Index dengan Pesan Sukses
        return redirect()->route('admin.projects.index')->with('success', 'Proyek baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $tags = Tag::orderBy('name')->get();
        return view('admin.projects.edit', compact('project', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        // 1. Validasi Input
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            // Validasi slug unik, tapi abaikan slug dari proyek ini sendiri
            'slug' => 'required|string|max:255|unique:projects,slug,' . $project->id,
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'project_date' => 'required|date',
            'short_description' => 'required|string',
            'content' => 'required|string',
            'links.github' => 'nullable|url',
            'links.demo' => 'nullable|url',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
        ]);

        $thumbnailPath = $project->thumbnail; // Ambil path lama sebagai default
        // 2. Proses Upload Gambar Baru jika ada
        if ($request->hasFile('thumbnail')) {
            // Hapus gambar lama jika ada
            if ($project->thumbnail) {
                Storage::disk('public')->delete($project->thumbnail);
            }
            // Simpan gambar baru
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        // 3. Update Proyek di Database
        $project->update([
            'title' => $validated['title'],
            'slug' => $validated['slug'],
            'thumbnail' => $thumbnailPath,
            'project_date' => $validated['project_date'],
            'short_description' => $validated['short_description'],
            'content' => $validated['content'],
            'links' => [
                'github' => $validated['links']['github'] ?? null,
                'demo' => $validated['links']['demo'] ?? null,
            ],
        ]);

        // Method sync() akan otomatis menambah/menghapus relasi sesuai array yang diberikan
        $project->tags()->sync($validated['tags'] ?? []);

        // 4. Redirect ke Halaman Index dengan Pesan Sukses
        return redirect()->route('admin.projects.index')->with('success', 'Proyek berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if ($project->thumbnail) {
            Storage::disk('public')->delete($project->thumbnail);
        }
        
        // Hapus proyek dari database
        $project->delete();

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('admin.projects.index')->with('success', 'Proyek berhasil dihapus!');
    }
}
