<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use HasFactory;

// app/Models/Education.php
class Education extends Model
{
    protected $fillable = [
        'institution_name',
        'degree',
        'start_date',
        'end_date',
        'description',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];
}