<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Experience;
use App\Models\Skill;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    public function index()
    {
        // Ambil semua data yang dibutuhkan
        $experiences = Experience::orderBy('start_date', 'desc')->get();
        $educations = Education::orderBy('start_date', 'desc')->get();
        
        // Ambil skills dan kelompokkan berdasarkan kategori
        $skills = Skill::orderBy('category')->orderBy('name')->get()->groupBy('category');

        // Kirim semua data ke view
        return view('resume', compact('experiences', 'educations', 'skills'));
    }
}