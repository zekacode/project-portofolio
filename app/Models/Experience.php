<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use HasFactory;


class Experience extends Model
{
    protected $fillable = [
        'job_title',
        'company_name',
        'start_date',
        'end_date',
        'responsibilities',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];
}
