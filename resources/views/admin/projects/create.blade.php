@extends('admin.layouts.app')

@section('title', 'Create New Project')

@section('content')

<h1 class="text-3xl font-bold mb-8">
    <i class="fa-solid fa-plus"></i> Add New Project
</h1>

{{-- رسائل الأخطاء --}}
@if ($errors->any())
    <div class="bg-red-100 text-red-700 p-4 rounded mb-6">
        <ul class="list-disc ml-6">
            @foreach ($errors->all() as $error)
                <li class="mt-1">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data"
      class="bg-white p-8 rounded-xl shadow">

    @csrf

    {{-- Grid --}}
    <div class="grid md:grid-cols-2 gap-6">

        {{-- Title EN --}}
        <div>
            <label class="block font-semibold mb-1">Title (English)</label>
            <input type="text" name="title_en" value="{{ old('title_en') }}"
                   class="w-full border p-3 rounded-lg" required>
        </div>

        {{-- Title AR --}}
        <div>
            <label class="block font-semibold mb-1">Title (Arabic)</label>
            <input type="text" name="title_ar" value="{{ old('title_ar') }}"
                   class="w-full border p-3 rounded-lg">
        </div>

        {{-- Description EN --}}
        <div class="md:col-span-2">
            <label class="block font-semibold mb-1">Description (English)</label>
            <textarea name="description_en" rows="4"
                      class="w-full border p-3 rounded-lg">{{ old('description_en') }}</textarea>
        </div>

        {{-- Description AR --}}
        <div class="md:col-span-2">
            <label class="block font-semibold mb-1">Description (Arabic)</label>
            <textarea name="description_ar" rows="4"
                      class="w-full border p-3 rounded-lg">{{ old('description_ar') }}</textarea>
        </div>

        {{-- Thumbnail --}}
        <div>
            <label class="block font-semibold mb-1">Project Thumbnail</label>
            <input type="file" name="thumbnail" class="w-full border p-3 rounded-lg">
        </div>

        {{-- Gallery --}}
        <div>
            <label class="block font-semibold mb-1">Project Gallery (Multiple Images)</label>
            <input type="file" name="gallery[]" class="w-full border p-3 rounded-lg" multiple>
        </div>

        {{-- Tech Stack --}}
        <div class="md:col-span-2">
            <label class="block font-semibold mb-1">Tech Stack (Comma separated)</label>
            <input type="text" name="tech_stack" value="{{ old('tech_stack') }}"
                   placeholder="Laravel, Livewire, Tailwind, MySQL"
                   class="w-full border p-3 rounded-lg">
        </div>

        {{-- Links --}}
        <div>
            <label class="block font-semibold mb-1">Live Demo (URL)</label>
            <input type="text" name="project_url" value="{{ old('project_url') }}"
                   class="w-full border p-3 rounded-lg">
        </div>

        <div>
            <label class="block font-semibold mb-1">GitHub Link</label>
            <input type="text" name="github_url" value="{{ old('github_url') }}"
                   class="w-full border p-3 rounded-lg">
        </div>

        {{-- Featured Switch --}}
        <div class="md:col-span-2 mt-4">
            <label class="flex items-center gap-3">
                <input type="checkbox" name="is_featured" value="1" class="w-5 h-5">
                <span class="font-semibold">Show on Home Page (Featured Project)</span>
            </label>
        </div>

    </div>

    {{-- Submit --}}
    <div class="mt-8">
        <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg text-lg font-semibold">
            <i class="fa-solid fa-check"></i> Save Project
        </button>
    </div>

</form>

@endsection
