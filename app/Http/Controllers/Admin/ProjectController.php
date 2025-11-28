<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // تم تصحيح الخطأ lastest -> latest
        $projects = Project::latest()->paginate(10);
        return view('admin.projects.index', compact('projects'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // -------------------------
        // 1. Validation
        // -------------------------
        $request->validate([
            'title_en'        => 'required|string|max:255',
            'title_ar'        => 'nullable|string|max:255',
            'description_en'  => 'nullable|string',
            'description_ar'  => 'nullable|string',
            'tech_stack'      => 'nullable|string|max:255',
            'project_url'     => 'nullable|url',
            'github_url'      => 'nullable|url',
            'thumbnail'       => 'required|image|mimes:jpg,jpeg,png,webp|max:4096',
            'gallery.*'       => 'image|mimes:jpg,jpeg,png,webp|max:4096'
        ]);

        // -------------------------
        // 2. Generate SLUG
        // -------------------------
        $slug = Str::slug($request->title_en);

        if (Project::where('slug', $slug)->exists()) {
            $slug .= '-' . time();
        }

        // -------------------------
        // 3. Upload THUMBNAIL
        // -------------------------
        $thumbnailPath = $request->file('thumbnail')->store('projects', 'public');

        // -------------------------
        // 4. Create Project
        // -------------------------
        $project = Project::create([
            'slug'           => $slug,
            'title_en'       => $request->title_en,
            'title_ar'       => $request->title_ar,
            'description_en' => $request->description_en,
            'description_ar' => $request->description_ar,
            'tech_stack'     => $request->tech_stack,
            'project_url'    => $request->project_url,
            'github_url'     => $request->github_url,
            'thumbnail'      => $thumbnailPath,
            'is_featured'    => $request->has('is_featured') ? 1 : 0,
        ]);

        // -------------------------
        // 5. Upload GALLERY IMAGES
        // -------------------------
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $image) {

                $imagePath = $image->store('projects/gallery', 'public');

                $project->images()->create([
                    'image_path' => $imagePath
                ]);
            }
        }

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project created successfully!');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title_en'        => 'required|string|max:255',
            'title_ar'        => 'nullable|string|max:255',
            'description_en'  => 'nullable|string',
            'description_ar'  => 'nullable|string',
            'tech_stack'      => 'nullable|string|max:255',
            'project_url'     => 'nullable|url',
            'github_url'      => 'nullable|url',
            'thumbnail'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'gallery.*'       => 'image|mimes:jpg,jpeg,png,webp|max:4096'
        ]);

        // تحديث slug عند تغيير العنوان
        if ($project->title_en !== $request->title_en) {

            $slug = Str::slug($request->title_en);

            if (Project::where('slug', $slug)->exists()) {
                $slug .= '-' . time();
            }

            $project->slug = $slug;
        }

        // تحديث البيانات
        $project->update([
            'title_en'       => $request->title_en,
            'title_ar'       => $request->title_ar,
            'description_en' => $request->description_en,
            'description_ar' => $request->description_ar,
            'tech_stack'     => $request->tech_stack,
            'project_url'    => $request->project_url,
            'github_url'     => $request->github_url,
            'is_featured'    => $request->has('is_featured') ? 1 : 0,
        ]);

        // تحديث thumbnail
        if ($request->hasFile('thumbnail')) {

            // حذف القديم
            if (Storage::disk('public')->exists($project->thumbnail)) {
                Storage::disk('public')->delete($project->thumbnail);
            }

            $project->thumbnail = $request->file('thumbnail')->store('projects', 'public');
            $project->save();
        }

        // صور جديدة للمعرض
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $image) {
                $imagePath = $image->store('projects/gallery', 'public');

                $project->images()->create(['image_path' => $imagePath]);
            }
        }

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        // حذف thumbnail
        if (Storage::disk('public')->exists($project->thumbnail)) {
            Storage::disk('public')->delete($project->thumbnail);
        }

        // حذف صور المعرض
        foreach ($project->images as $img) {
            if (Storage::disk('public')->exists($img->image_path)) {
                Storage::disk('public')->delete($img->image_path);
            }
            $img->delete();
        }

        // حذف المشروع
        $project->delete();

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project deleted successfully!');
    }


    /**
     * Delete a single gallery image
     */
    public function deleteImage($id)
    {
        $image = ProjectImage::findOrFail($id);

        if (Storage::disk('public')->exists($image->image_path)) {
            Storage::disk('public')->delete($image->image_path);
        }

        $image->delete();

        return back()->with('success', 'Image removed successfully.');
    }
}
