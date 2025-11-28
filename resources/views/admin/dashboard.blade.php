@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')

<h1 class="text-3xl font-bold mb-8">Welcome to Admin Dashboard</h1>

{{-- الإحصائيات --}}
<div class="grid md:grid-cols-3 gap-8">

    {{-- Projects --}}
    <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
        <div class="flex items-center gap-4">
            <div class="p-4 bg-blue-100 text-blue-600 rounded-xl">
                <i class="fa-solid fa-diagram-project text-3xl"></i>
            </div>
            <div>
                <h3 class="text-2xl font-bold">{{ $projectsCount }}</h3>
                <p class="text-gray-600">Total Projects</p>
            </div>
        </div>
    </div>

    {{-- Skills --}}
    <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
        <div class="flex items-center gap-4">
            <div class="p-4 bg-green-100 text-green-600 rounded-xl">
                <i class="fa-solid fa-brain text-3xl"></i>
            </div>
            <div>
                <h3 class="text-2xl font-bold">{{ $skillsCount }}</h3>
                <p class="text-gray-600">Skills Added</p>
            </div>
        </div>
    </div>

    {{-- Messages --}}
    <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
        <div class="flex items-center gap-4">
            <div class="p-4 bg-red-100 text-red-600 rounded-xl">
                <i class="fa-solid fa-envelope text-3xl"></i>
            </div>
            <div>
                <h3 class="text-2xl font-bold">{{ $messagesCount }}</h3>
                <p class="text-gray-600">Messages Received</p>
            </div>
        </div>
    </div>

</div>

@endsection
