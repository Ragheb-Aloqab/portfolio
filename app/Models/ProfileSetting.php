<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfileSetting extends Model
{
    protected $fillable = [
        'name_en', 'name_ar',
        'job_title_en', 'job_title_ar',
        'bio_en', 'bio_ar',
        'avatar',
        'github_url',
        'linkedin_url',
        'twitter_url',
        'email',
        'phone',
    ];
}
