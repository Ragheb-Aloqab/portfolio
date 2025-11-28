@extends('admin.layouts.app')

@section('title', 'Skills')

@section('content')

<div class="flex justify-between items-center mb-8">

    <h1 class="text-3xl font-bold">Skills</h1>

    <a href="{{ route('admin.skills.create') }}"
       class="bg-blue-600 text-white px-5 py-3 rounded-lg shadow hover:bg-blue-700 transition">
        <i class="fa-solid fa-plus"></i>
        Add New Skill
    </a>

</div>

{{-- جدول المهارات --}}
<div class="bg-white p-6 rounded-xl shadow">

    <table class="w-full border-collapse">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="p-3">#</th>
                <th class="p-3">Name EN</th>
                <th class="p-3">Name AR</th>
                <th class="p-3">Icon</th>
                <th class="p-3">Level</th>
                <th class="p-3 text-center">Actions</th>
            </tr>
        </thead>

        <tbody>

            @forelse($skills as $skill)
                <tr class="border-b">
                    <td class="p-3">{{ $skill->id }}</td>

                    <td class="p-3 font-semibold">{{ $skill->name_en }}</td>

                    <td class="p-3">{{ $skill->name_ar }}</td>

                    {{-- الأيقونة --}}
                    <td class="p-3 text-2xl">
                        <i class="{{ $skill->icon_class }}"></i>
                    </td>

                    {{-- المستوى --}}
                    <td class="p-3">
                        <div class="w-full bg-gray-200 rounded h-3">
                            <div class="bg-blue-600 h-3 rounded" style="width: {{ $skill->level }}%"></div>
                        </div>
                        <span class="text-sm text-gray-600">{{ $skill->level }}%</span>
                    </td>

                    <td class="p-3 text-center">

                        {{-- تعديل --}}
                        <a href="{{ route('admin.skills.edit', $skill->id) }}"
                           class="text-blue-600 hover:text-blue-800 mx-2">
                            <i class="fa-solid fa-pen-to-square text-xl"></i>
                        </a>

                        {{-- حذف --}}
                        <form action="{{ route('admin.skills.destroy', $skill->id) }}"
                              method="POST"
                              class="inline-block"
                              onsubmit="return confirm('Are you sure you want to delete this skill?');">
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
                        No skills found.
                    </td>
                </tr>
            @endforelse

        </tbody>
    </table>

</div>

@endsection
