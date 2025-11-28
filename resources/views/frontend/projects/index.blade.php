@extends('frontend.layouts.app')

@section('title', __('Projects'))

@section('content')

<div class="container mx-auto px-6">

    <h1 class="text-4xl font-bold mb-10 text-center">
        {{ __('My Projects') }}
    </h1>

    @if($projects->isEmpty())
        <p class="text-center text-gray-500 text-lg">
            {{ __('No projects available yet.') }}
        </p>
    @else

        {{-- PROJECTS GRID --}}
        <div class="grid md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-10">

            @foreach($projects as $project)
                <div class="bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden">

                    {{-- Thumbnail --}}
                    <img src="{{ asset('storage/' . $project->thumbnail) }}"
                         class="w-full h-52 object-cover">

                    <div class="p-6">

                        {{-- Title --}}
                        <h2 class="text-xl font-bold mb-3">
                            {{ $project->title_en }}
                        </h2>

                        {{-- Description --}}
                        <p class="text-gray-600 mb-4">
                            {{ Str::limit($project->description_en, 90) }}
                        </p>

                        {{-- View Details --}}
                        <a href="{{ route('projects.show', [app()->getLocale(), $project->slug]) }}"
                           class="text-blue-600 font-semibold hover:text-blue-800">
                            {{ __('View Details') }} →
                        </a>

                    </div>

                </div>
            @endforeach

        </div>

        {{-- PAGINATION --}}
        <div class="mt-12">
            {{ $projects->links() }}
        </div>

    @endif

</div>

@endsection