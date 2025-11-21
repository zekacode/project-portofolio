<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use HasFactory;

class Tag extends Model
{
    protected $fillable = ['name', 'slug'];
}