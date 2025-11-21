<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Menampilkan daftar semua proyek.
     */
    public function index()
    {
        // Ambil semua proyek, urutkan dari yang terbaru
        // 'with('tags')' adalah Eager Loading untuk mengambil relasi tags
        // agar tidak terjadi N+1 query problem.
        $projects = Project::with('tags')->latest('project_date')->get();

        return view('showcase.index', compact('projects'));
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