@extends('frontend.layouts.app')

@section('title', $project->title_en)

@section('content')

<div class="container mx-auto px-6 py-10">

    {{-- Back Button --}}
    <a href="{{ route('projects.index', app()->getLocale()) }}"
       class="text-blue-600 hover:text-blue-800 text-lg mb-6 inline-block">
        <i class="fa-solid fa-arrow-left"></i> {{ __('Back to Projects') }}
    </a>

    <div class="grid md:grid-cols-2 gap-10">

        {{-- ====================== MAIN THUMBNAIL ====================== --}}
        <div>
            <img src="{{ asset('storage/' . $project->thumbnail) }}"
                 class="w-full h-80 object-cover rounded-xl shadow">
        </div>

        {{-- ====================== PROJECT INFO ====================== --}}
        <div>

            <h1 class="text-3xl font-bold mb-4">
                {{ $project->title_en }}
            </h1>

            <p class="text-gray-700 mb-6 leading-relaxed">
                {{ $project->description_en }}
            </p>

            {{-- Tech Stack --}}
            @if($project->tech_stack)
                <div class="mb-6">
                    <h3 class="text-xl font-semibold mb-2">
                        <i class="fa-solid fa-code"></i> Tech Stack
                    </h3>

                    <div class="flex flex-wrap gap-3">
                        @foreach(explode(',', $project->tech_stack) as $tech)
                            <span class="px-4 py-2 bg-blue-100 text-blue-700 rounded-full font-medium">
                                {{ trim($tech) }}
                            </span>
                        @endforeach
                    </div>
                </div>
            @endif

            {{-- Buttons --}}
            <div class="flex gap-4 mt-6">

                @if($project->project_url)
                    <a href="{{ $project->project_url }}" target="_blank"
                       class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 flex items-center gap-2">
                        <i class="fa-solid fa-globe"></i> Live Demo
                    </a>
                @endif

                @if($project->github_url)
                    <a href="{{ $project->github_url }}" target="_blank"
                       class="px-6 py-3 bg-gray-800 text-white rounded-lg hover:bg-black flex items-center gap-2">
                        <i class="fa-brands fa-github"></i> GitHub
                    </a>
                @endif

            </div>

        </div>

    </div>


    {{-- ====================== GALLERY SECTION ====================== --}}
    @if($project->images && $project->images->count())
        <div class="mt-16">

            <h2 class="text-2xl font-bold mb-6">Gallery</h2>

            <div class="grid md:grid-cols-3 gap-8">

                @foreach($project->images as $img)
                    <div>
                        <img src="{{ asset('storage/' . $img->image_path) }}"
                             class="w-full h-52 object-cover rounded-xl shadow hover:scale-105 transition">
                    </div>
                @endforeach

            </div>

        </div>
    @endif


</div>

@endsection
