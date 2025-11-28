<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Project;
use App\Models\Skill;

class HomeController extends Controller
{
    public function index($locale)
    {
       $user = User::first();
        $featured = Project::where('is_featured', 1)->first();
        $projects = Project::latest()->paginate(6);
        $skills = Skill::orderBy('level', 'desc')->get();

        return view('frontend.home', compact(
            'user',
            'featured',
            'projects',
            'skills'
        ));
    }
}
