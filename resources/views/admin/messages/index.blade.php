@extends('admin.layouts.app')

@section('title', 'Messages')

@section('content')

<h1 class="text-3xl font-bold mb-8">
    <i class="fa-solid fa-envelope"></i> Messages
</h1>

@if(session('success'))
    <div class="bg-green-100 border border-green-300 text-green-700 p-4 rounded mb-6">
        {{ session('success') }}
    </div>
@endif

<div class="bg-white p-6 rounded-xl shadow">

    <table class="w-full border-collapse">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="p-3">#</th>
                <th class="p-3">Name</th>
                <th class="p-3">Email</th>
                <th class="p-3">Subject</th>
                <th class="p-3">Date</th>
                <th class="p-3 text-center">Actions</th>
            </tr>
        </thead>

        <tbody>

            @forelse($messages as $msg)
                <tr class="border-b">
                    <td class="p-3">{{ $msg->id }}</td>

                    <td class="p-3 font-semibold">{{ $msg->name }}</td>

                    <td class="p-3">{{ $msg->email }}</td>

                    <td class="p-3">{{ $msg->subject ?? '—' }}</td>

                    <td class="p-3">{{ $msg->created_at->format('Y-m-d') }}</td>

                    <td class="p-3 text-center flex justify-center gap-3">

                        <a href="{{ route('admin.messages.show', $msg->id) }}"
                           class="text-blue-600 hover:text-blue-800">
                            <i class="fa-solid fa-eye text-xl"></i>
                        </a>

                        <form action="{{ route('admin.messages.destroy', $msg->id) }}"
                              method="POST"
                              onsubmit="return confirm('Are you sure you want to delete this message?');">
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
                        No messages found.
                    </td>
                </tr>
            @endforelse

        </tbody>
    </table>

    <div class="mt-5">
        {{ $messages->links() }}
    </div>

</div>

@endsection
