<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
     public function index($locale)
    {
        $projects = Project::latest()->paginate(9);

        return view('frontend.projects.index', compact('projects'));
    }
    public function show($locale, $slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();

        return view('frontend.projects.show', compact('project'));
    }
    public function store(Request $request, $locale)
    {
        $request->validate([
            'name'    => 'required|string|max:150',
            'email'   => 'required|email',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string|min:10',
        ]);

        ContactMessage::create([
            'name'    => $request->name,
            'email'   => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return back()->with('success', __('Your message has been sent successfully.'));
    }
}
