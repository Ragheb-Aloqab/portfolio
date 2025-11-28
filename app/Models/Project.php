<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
     protected $fillable = [
        'slug',
        'title_en', 'title_ar',
        'description_en', 'description_ar',
        'thumbnail',
        'tech_stack',
        'project_url',
        'github_url',
        'is_featured',
    ];

    public function images()
    {
        return $this->hasMany(ProjectImage::class);
    }
}
