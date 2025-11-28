<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skills = Skill::latest()->paginate(20);
        return view('admin.skills.index', compact('skills'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.skills.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_en'    => 'required|string|max:255',
            'name_ar'    => 'nullable|string|max:255',
            'icon_class' => 'nullable|string|max:255',
            'level'      => 'required|integer|min:1|max:100',
        ]);

        Skill::create($request->only([
            'name_en',
            'name_ar',
            'icon_class',
            'level'
        ]));

        return redirect()->route('admin.skills.index')
            ->with('success', 'Skill added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Skill $skill)
    {
        return view('admin.skills.edit', compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Skill $skill)
    {
        $request->validate([
            'name_en'    => 'required|string|max:255',
            'name_ar'    => 'nullable|string|max:255',
            'icon_class' => 'nullable|string|max:255',
            'level'      => 'required|integer|min:1|max:100',
        ]);

        $skill->update($request->only([
            'name_en',
            'name_ar',
            'icon_class',
            'level'
        ]));

        return redirect()->route('admin.skills.index')
            ->with('success', 'Skill updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skill $skill)
    {
        $skill->delete();

        return redirect()->route('admin.skills.index')
            ->with('success', 'Skill deleted successfully');
    }
}
