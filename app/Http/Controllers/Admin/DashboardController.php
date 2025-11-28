<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $projectsCount = Project::count();
        $skillsCount = Skill::count();
        $messagesCount = ContactMessage::count();

        return view('admin.dashboard', compact(
            'projectsCount',
            'skillsCount',
            'messagesCount'
        ));
    }
}
