@extends('admin.layouts.app')

@section('title', 'Edit Project')

@section('content')

<h1 class="text-3xl font-bold mb-8">
    <i class="fa-solid fa-edit"></i> Edit Project
</h1>

{{-- الأخطاء --}}
@if ($errors->any())
    <div class="bg-red-100 text-red-700 p-4 rounded mb-6">
        <ul class="list-disc ml-6">
            @foreach ($errors->all() as $error)
                <li class="mt-1">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.projects.update', $project->id) }}" 
      method="POST" enctype="multipart/form-data"
      class="bg-white p-8 rounded-xl shadow">

    @csrf
    @method('PUT')

    {{-- Grid --}}
    <div class="grid md:grid-cols-2 gap-6">

        {{-- Title EN --}}
        <div>
            <label class="block font-semibold mb-1">Title (English)</label>
            <input type="text" name="title_en" value="{{ old('title_en', $project->title_en) }}"
                   class="w-full border p-3 rounded-lg" required>
        </div>

        {{-- Title AR --}}
        <div>
            <label class="block font-semibold mb-1">Title (Arabic)</label>
            <input type="text" name="title_ar" value="{{ old('title_ar', $project->title_ar) }}"
                   class="w-full border p-3 rounded-lg">
        </div>


        {{-- Description EN --}}
        <div class="md:col-span-2">
            <label class="block font-semibold mb-1">Description (English)</label>
            <textarea name="description_en" rows="4"
                      class="w-full border p-3 rounded-lg">{{ old('description_en', $project->description_en) }}</textarea>
        </div>

        {{-- Description AR --}}
        <div class="md:col-span-2">
            <label class="block font-semibold mb-1">Description (Arabic)</label>
            <textarea name="description_ar" rows="4"
                      class="w-full border p-3 rounded-lg">{{ old('description_ar', $project->description_ar) }}</textarea>
        </div>


        {{-- Thumbnail --}}
        <div>
            <label class="block font-semibold mb-1">Current Thumbnail</label>
            <img src="{{ asset('storage/' . $project->thumbnail) }}"
                 class="w-32 h-24 object-cover rounded mb-2">
            <input type="file" name="thumbnail" class="w-full border p-3 rounded-lg">
        </div>

        {{-- Gallery --}}
        <div>
            <label class="block font-semibold mb-1">Add New Gallery Images</label>
            <input type="file" name="gallery[]" class="w-full border p-3 rounded-lg" multiple>
        </div>

        {{-- Tech Stack --}}
        <div class="md:col-span-2">
            <label class="block font-semibold mb-1">Tech Stack (Comma separated)</label>
            <input type="text" name="tech_stack" value="{{ old('tech_stack', $project->tech_stack) }}"
                   class="w-full border p-3 rounded-lg">
        </div>

        {{-- Links --}}
        <div>
            <label class="block font-semibold mb-1">Live Demo (URL)</label>
            <input type="text" name="project_url" value="{{ old('project_url', $project->project_url) }}"
                   class="w-full border p-3 rounded-lg">
        </div>

        <div>
            <label class="block font-semibold mb-1">GitHub Link</label>
            <input type="text" name="github_url" value="{{ old('github_url', $project->github_url) }}"
                   class="w-full border p-3 rounded-lg">
        </div>

        {{-- Featured --}}
        <div class="md:col-span-2 mt-4">
            <label class="flex items-center gap-3">
                <input type="checkbox" name="is_featured" value="1"
                       class="w-5 h-5"
                       {{ $project->is_featured ? 'checked' : '' }}>

                <span class="font-semibold">Show on Home Page (Featured Project)</span>
            </label>
        </div>

    </div>

    {{-- Gallery Images --}}
    @if($project->images->count() > 0)
        <div class="mt-10">
            <h2 class="text-xl font-bold mb-3">Current Gallery</h2>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-5">

                @foreach($project->images as $img)
                    <div class="relative group">
                        <img src="{{ asset('storage/' . $img->image_path) }}"
                             class="w-full h-32 object-cover rounded shadow">

                        {{-- Delete Button --}}
                        <form action="{{ route('admin.projects.deleteImage', $img->id) }}"
                              method="POST" class="absolute top-2 right-2">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-600 text-white p-1 rounded opacity-80 group-hover:opacity-100">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </div>
                @endforeach

            </div>
        </div>
    @endif

    {{-- Save Button --}}
    <div class="mt-10">
        <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg text-lg font-semibold">
            <i class="fa-solid fa-check"></i> Update Project
        </button>
    </div>

</form>

@endsection
