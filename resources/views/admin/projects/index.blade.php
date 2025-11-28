@extends('admin.layouts.app')

@section('title', 'Projects')

@section('content')

<div class="flex justify-between items-center mb-8">

    <h1 class="text-3xl font-bold">Projects</h1>

    <a href="{{ route('admin.projects.create') }}"
       class="bg-blue-600 text-white px-5 py-3 rounded-lg shadow hover:bg-blue-700 transition">
        <i class="fa-solid fa-plus"></i>
        Add New Project
    </a>

</div>

{{-- جدول المشاريع --}}
<div class="bg-white p-6 rounded-xl shadow">

    <table class="w-full border-collapse">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="p-3">#</th>
                <th class="p-3">Thumbnail</th>
                <th class="p-3">Title</th>
                <th class="p-3">Featured</th>
                <th class="p-3">Created At</th>
                <th class="p-3 text-center">Actions</th>
            </tr>
        </thead>

        <tbody>

            @forelse($projects as $project)
                <tr class="border-b">
                    <td class="p-3">{{ $project->id }}</td>

                    {{-- الصورة --}}
                    <td class="p-3">
                        <img src="{{ asset('storage/' . $project->thumbnail) }}"
                             class="w-20 h-16 object-cover rounded">
                    </td>

                    {{-- الاسم --}}
                    <td class="p-3 font-semibold">
                        {{ $project->title_en }}
                    </td>

                    {{-- مميز؟ --}}
                    <td class="p-3">
                        @if($project->is_featured)
                            <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-sm">
                                Yes
                            </span>
                        @else
                            <span class="px-3 py-1 bg-gray-200 text-gray-600 rounded-full text-sm">
                                No
                            </span>
                        @endif
                    </td>

                    {{-- التاريخ --}}
                    <td class="p-3 text-gray-600">
                        {{ $project->created_at->format('Y-m-d') }}
                    </td>

                    {{-- الأكشن --}}
                    <td class="p-3 text-center">

                        {{-- تعديل --}}
                        <a href="{{ route('admin.projects.edit', $project->id) }}"
                           class="text-blue-600 hover:text-blue-800 mx-2">
                            <i class="fa-solid fa-pen-to-square text-xl"></i>
                        </a>

                        {{-- حذف --}}
                        <form action="{{ route('admin.projects.destroy', $project->id) }}"
                              method="POST"
                              class="inline-block"
                              onsubmit="return confirm('Are you sure you want to delete this project?');">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600 hover:text-red-800">
                                <i class="fa-solid fa-trash text-xl"></i>
                            </button>
                        </form>

                    </td>

                </tr>
            @empty
                <tr>
                    <td colspan="6" class="p-5 text-center text-gray-500">
                        No projects found.
                    </td>
                </tr>
            @endforelse

        </tbody>
    </table>

    {{-- Pagination --}}
    <div class="mt-5">
        {{ $projects->links() }}
    </div>

</div>

@endsection