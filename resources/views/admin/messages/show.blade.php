@extends('admin.layouts.app')

@section('title', 'Message Details')

@section('content')

<h1 class="text-3xl font-bold mb-8">
    <i class="fa-solid fa-envelope-open"></i> Message Details
</h1>

<div class="bg-white p-8 rounded-xl shadow-lg">

    <p class="mb-4"><strong>Name:</strong> {{ $message->name }}</p>
    <p class="mb-4"><strong>Email:</strong> {{ $message->email }}</p>
    <p class="mb-4"><strong>Subject:</strong> {{ $message->subject ?? '—' }}</p>

    <p class="mb-6">
        <strong>Message:</strong><br>
        <span class="block mt-2 bg-gray-50 border p-4 rounded-lg">
            {{ $message->message }}
        </span>
    </p>

    <p class="text-gray-600 text-sm">
        Sent at: {{ $message->created_at->format('Y-m-d H:i A') }}
    </p>

    <div class="mt-6">
        <a href="{{ route('admin.messages.index') }}"
           class="px-6 py-3 bg-gray-600 text-white rounded-lg hover:bg-gray-700">
            <i class="fa-solid fa-arrow-left"></i> Back
        </a>
    </div>

</div>

@endsection
