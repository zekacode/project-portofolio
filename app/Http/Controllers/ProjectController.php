<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\Tag;

class ProjectController extends Controller
{
    /**
     * Menampilkan daftar semua proyek.
     */
    public function index()
    {
        // 1. Ambil semua tag untuk ditampilkan sebagai tombol filter
        // 'whereHas' memastikan hanya tag yang memiliki setidaknya satu proyek yang diambil
        $tags = Tag::whereHas('projects')->orderBy('name')->get();

        // 2. Query Proyek dengan Filter
        $projects = Project::with('tags')
            ->latest('project_date')
            // Jika ada parameter 'tag' di URL (misal: ?tag=laravel)
            ->when(request('tag'), function ($query) {
                $slug = request('tag');
                // Filter proyek yang memiliki tag dengan slug tersebut
                $query->whereHas('tags', function ($q) use ($slug) {
                    $q->where('slug', $slug);
                });
            })
            ->get();

        return view('showcase.index', compact('projects', 'tags'));
    }

    /**
     * Menampilkan detail satu proyek.
     */
    public function show(Project $project)
    {
        // Dengan Route Model Binding, Laravel sudah otomatis menemukan
        // proyek berdasarkan slug dari URL.
        // Kita juga bisa load relasi di sini jika perlu.
        $project->load('tags');

        return view('showcase.show', compact('project'));
    }
}