<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil 3 proyek terbaru berdasarkan tanggal proyek
        $latestProjects = Project::with('tags')
                            ->latest('project_date')
                            ->take(3)
                            ->get();

        return view('home', compact('latestProjects'));
    }
}