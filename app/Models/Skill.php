<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use HasFactory;

class Skill extends Model
{
    protected $fillable = ['name', 'category'];
}
