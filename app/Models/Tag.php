<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
use HasFactory;

class Tag extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'slug'];

    /**
     * The projects that belong to the tag.
     */
    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
}