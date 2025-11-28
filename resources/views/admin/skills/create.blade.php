@extends('admin.layouts.app')

@section('title', 'Create Skill')

@section('content')

<h1 class="text-3xl font-bold mb-8">
    <i class="fa-solid fa-plus"></i> Add New Skill
</h1>

{{-- أخطاء --}}
@if ($errors->any())
    <div class="bg-red-100 text-red-700 p-4 rounded mb-6">
        <ul class="list-disc ml-6">
            @foreach ($errors->all() as $error)
                <li class="mt-1">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.skills.store') }}" method="POST" class="bg-white p-8 rounded-xl shadow">
    @csrf

    <div class="grid md:grid-cols-2 gap-6">

        {{-- الاسم EN --}}
        <div>
            <label class="block font-semibold mb-1">Name (English)</label>
            <input type="text" name="name_en" class="w-full border p-3 rounded-lg" required>
        </div>

        {{-- الاسم AR --}}
        <div>
            <label class="block font-semibold mb-1">Name (Arabic)</label>
            <input type="text" name="name_ar" class="w-full border p-3 rounded-lg">
        </div>

        {{-- الأيقونة --}}
        <div>
            <label class="block font-semibold mb-1">FontAwesome Icon Class</label>
            <input type="text" name="icon_class" placeholder="fa-brands fa-laravel"
                   class="w-full border p-3 rounded-lg">
        </div>

        {{-- المستوى --}}
        <div>
            <label class="block font-semibold mb-1">Level (1-100)</label>
            <input type="number" name="level" min="1" max="100"
                   class="w-full border p-3 rounded-lg" required>
        </div>

    </div>

    <div class="mt-8">
        <button class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg text-lg font-semibold">
            <i class="fa-solid fa-check"></i> Save Skill
        </button>
    </div>

</form>

@endsection
