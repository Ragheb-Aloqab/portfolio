@extends('frontend.layouts.app')

@section('title', __('general.contact'))

@section('content')

<div class="container mx-auto px-6 max-w-3xl">

    {{-- العنوان --}}
    <h1 class="text-4xl font-bold mb-8 text-center">
        {{ __('general.contact') }}
    </h1>

    {{-- رسالة النجاح --}}
    @if(session('success'))
        <div class="bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    {{-- فورم التواصل --}}
    <form action="{{ route('contact.store', app()->getLocale()) }}" method="POST"
          class="bg-white p-8 rounded-xl shadow-lg">
        @csrf

        {{-- الاسم --}}
        <div class="mb-5">
            <label class="block font-semibold mb-2">
                {{ app()->getLocale() == 'ar' ? 'الاسم كامل' : 'Full Name' }}
            </label>
            <input type="text" name="name" value="{{ old('name') }}"
                   class="w-full border p-3 rounded-lg"
                   placeholder="{{ app()->getLocale() == 'ar' ? 'اكتب اسمك هنا' : 'Enter your full name' }}">
            @error('name') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        {{-- الإيميل --}}
        <div class="mb-5">
            <label class="block font-semibold mb-2">
                {{ app()->getLocale() == 'ar' ? 'البريد الإلكتروني' : 'Email Address' }}
            </label>
            <input type="email" name="email" value="{{ old('email') }}"
                   class="w-full border p-3 rounded-lg"
                   placeholder="example@mail.com">
            @error('email') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        {{-- العنوان --}}
        <div class="mb-5">
            <label class="block font-semibold mb-2">
                {{ app()->getLocale() == 'ar' ? 'العنوان (اختياري)' : 'Subject (Optional)' }}
            </label>
            <input type="text" name="subject" value="{{ old('subject') }}"
                   class="w-full border p-3 rounded-lg"
                   placeholder="{{ app()->getLocale() == 'ar' ? 'عنوان الرسالة' : 'Message subject' }}">
        </div>

        {{-- Mesaage --}}
        <div class="mb-5">
            <label class="block font-semibold mb-2">
                {{ app()->getLocale() == 'ar' ? 'نص الرسالة' : 'Message' }}
            </label>
            <textarea name="message" rows="6"
                      class="w-full border p-3 rounded-lg resize-none"
                      placeholder="{{ app()->getLocale() == 'ar' ? 'اكتب رسالتك هنا...' : 'Write your message here...' }}">{{ old('message') }}</textarea>
            @error('message') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        {{-- button send  --}}
        <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg text-lg font-semibold shadow">
            <i class="fa-solid fa-paper-plane"></i>
            {{ app()->getLocale() == 'ar' ? 'إرسال' : 'Send Message' }}
        </button>

    </form>

</div>

@endsection
