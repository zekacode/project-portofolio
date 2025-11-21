<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'slug',
        'thumbnail',
        'project_date',
        'short_description',
        'content',
        'links',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'links' => 'array', // Memberitahu Laravel bahwa kolom 'links' adalah array/JSON
        'project_date' => 'date', // Memberitahu Laravel bahwa kolom ini adalah objek tanggal
    ];
}