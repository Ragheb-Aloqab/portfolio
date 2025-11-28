@extends('admin.layouts.app')

@section('title', 'Edit Skill')

@section('content')

<h1 class="text-3xl font-bold mb-8">
    <i class="fa-solid fa-edit"></i> Edit Skill
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

<form action="{{ route('admin.skills.update', $skill->id) }}" method="POST"
      class="bg-white p-8 rounded-xl shadow">

    @csrf
    @method('PUT')

    <div class="grid md:grid-cols-2 gap-6">

        {{-- EN --}}
        <div>
            <label class="font-semibold mb-1 block">Name (English)</label>
            <input type="text" name="name_en" value="{{ $skill->name_en }}" class="w-full border p-3 rounded-lg">
        </div>

        {{-- AR --}}
        <div>
            <label class="font-semibold mb-1 block">Name (Arabic)</label>
            <input type="text" name="name_ar" value="{{ $skill->name_ar }}" class="w-full border p-3 rounded-lg">
        </div>

        {{-- Icon --}}
        <div>
            <label class="font-semibold mb=1 block">Icon Class</label>
            <input type="text" name="icon_class" value="{{ $skill->icon_class }}" class="w-full border p-3 rounded-lg">
        </div>

        {{-- Level --}}
        <div>
            <label class="font-semibold mb-1 block">Level</label>
            <input type="number" name="level" min="1" max="100"
                   value="{{ $skill->level }}" class="w-full border p-3 rounded-lg">
        </div>

    </div>

    <button class="mt-8 bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg text-lg font-semibold">
        <i class="fa-solid fa-check"></i> Save Changes
    </button>

</form>

@endsection
