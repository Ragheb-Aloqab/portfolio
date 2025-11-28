@extends('frontend.layouts.app')

@section('title', __('Contact Me'))

@section('content')

<div class="container mx-auto px-6 py-16">

    <h1 class="text-4xl font-bold mb-8 text-center">
        {{ __('Contact Me') }}
    </h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-300 text-green-700 p-4 mb-6 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid md:grid-cols-2 gap-10">

        {{-- CONTACT INFO --}}
        <div>
            <h2 class="text-2xl font-semibold mb-4">{{ __('Get in Touch') }}</h2>

            <p class="text-gray-700 mb-4">
                {{ __('Feel free to reach out for any project or collaboration!') }}
            </p>

            <div class="flex flex-col gap-4 text-lg mt-6">


                {{-- EMAIL --}}
                <div class="flex items-center gap-3">
                    <i class="fa-solid fa-envelope text-blue-600"></i>
                    <span>raghebammar201@gmail.com</span>
                </div>

                {{-- PHONE CALL --}}
                <div class="flex items-center gap-3">
                    <i class="fa-solid fa-phone text-green-600"></i>
                    <a href="tel:+966563223963" class="hover:text-green-700">
                        +966 56 322 3963 (اتصال)
                    </a>
                </div>

                {{-- WHATSAPP --}}
                <div class="flex items-center gap-3">
                    <i class="fa-brands fa-whatsapp text-green-500"></i>
                    <a href="https://wa.me/966563223963"
                       target="_blank"
                       class="hover:text-green-600">
                        تواصل واتساب
                    </a>
                </div>

                {{-- LinkedIn --}}
                @if($user->linkedin ?? false)
                    <div class="flex items-center gap-3">
                        <i class="fa-brands fa-linkedin text-blue-700"></i>
                        <a href="{{ $user->linkedin }}" class="hover:text-blue-800" target="_blank">
                            LinkedIn
                        </a>
                    </div>
                @endif

                {{-- GitHub --}}
                @if($user->github ?? false)
                    <div class="flex items-center gap-3">
                        <i class="fa-brands fa-github text-gray-900"></i>
                        <a href="{{ $user->github }}" class="hover:text-black" target="_blank">
                            GitHub
                        </a>
                    </div>
                @endif

            </div>
        </div>


        {{-- CONTACT FORM --}}
        <div class="bg-white p-8 rounded-xl shadow-lg">

            <form action="{{ route('contact.store', app()->getLocale()) }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label class="font-semibold mb-1 block">{{ __('Name') }}</label>
                    <input type="text" name="name"
                           class="w-full border p-3 rounded-lg"
                           required />
                </div>

                <div class="mb-4">
                    <label class="font-semibold mb-1 block">{{ __('Email') }}</label>
                    <input type="email" name="email"
                           class="w-full border p-3 rounded-lg"
                           required />
                </div>

                <div class="mb-4">
                    <label class="font-semibold mb-1 block">{{ __('Subject') }}</label>
                    <input type="text" name="subject"
                           class="w-full border p-3 rounded-lg" />
                </div>

                <div class="mb-6">
                    <label class="font-semibold mb-1 block">{{ __('Message') }}</label>
                    <textarea name="message" rows="5"
                              class="w-full border p-3 rounded-lg"
                              required></textarea>
                </div>

                <button class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                    <i class="fa-solid fa-paper-plane"></i> {{ __('Send Message') }}
                </button>

            </form>

        </div>

    </div>

</div>

@endsection
@extends('frontend.layouts.app')

@section('title', 'Portfolio')

@section('content')

<div class="max-w-7xl mx-auto px-6">

    {{-- ================= HERO SECTION ================= --}}
    <section class="py-24 grid md:grid-cols-2 gap-16 items-center">

        {{-- LEFT SIDE --}}
        <div class="space-y-6">

            <h1 class="text-4xl md:text-6xl font-extrabold leading-tight">
                Hello, I'm
                <span class="text-blue-600 dark:text-blue-400">
                    {{ $user->name }}
                </span>
            </h1>

            <h3 class="text-2xl font-semibold text-gray-700 dark:text-gray-300">
                Full Stack Laravel Developer
            </h3>

            <p class="text-gray-600 dark:text-gray-300 text-lg leading-relaxed">
                {!! nl2br(e($user->bio)) !!}
            </p>

            {{-- CONTACT + SOCIAL ROW --}}
            <div class="flex flex-col gap-4">

                {{-- EMAIL --}}
                <div class="flex items-center gap-3 text-lg">
                    <i class="fa-solid fa-envelope text-blue-600"></i>
                    <span>{{ $user->email }}</span>
                </div>

                {{-- PHONE --}}
                <div class="flex items-center gap-3 text-lg">
                    <i class="fa-solid fa-phone text-green-600"></i>
                    <a href="tel:+966563223963" class="hover:text-green-700">
                        +966 56 322 3963
                    </a>
                </div>

                {{-- WHATSAPP --}}
                <div class="flex items-center gap-3 text-lg">
                    <i class="fa-brands fa-whatsapp text-green-500"></i>
                    <a href="https://wa.me/966563223963"
                       target="_blank" class="hover:text-green-600">
                        تواصل واتساب مباشرة
                    </a>
                </div>

            </div>

            {{-- SOCIAL ICONS --}}
            <div class="flex items-center gap-6 text-3xl mt-4">

                @if($user->github)
                    <a href="{{ $user->github }}" class="social-icon">
                        <i class="fa-brands fa-github"></i>
                    </a>
                @endif

                @if($user->linkedin)
                    <a href="{{ $user->linkedin }}" class="social-icon">
                        <i class="fa-brands fa-linkedin"></i>
                    </a>
                @endif

                @if($user->twitter)
                    <a href="{{ $user->twitter }}" class="social-icon">
                        <i class="fa-brands fa-twitter"></i>
                    </a>
                @endif

            </div>

            {{-- BUTTONS --}}
            <div class="flex flex-wrap gap-4 mt-6">

                <a href="#contact"
                    class="btn-primary text-lg">
                    <i class="fa-solid fa-paper-plane"></i> Contact Me
                </a>

                {{-- DOWNLOAD CV --}}
                @if($user->cv_file)
                <a href="{{ asset('storage/'.$user->cv_file) }}"
                   download
                   class="btn-dark text-lg">
                    <i class="fa-solid fa-download"></i> Download CV
                </a>
                @endif

            </div>

        </div>

        {{-- RIGHT SIDE IMAGE --}}
        <div class="flex justify-center">
            <img src="{{ $user->profile_img ? asset('storage/'.$user->profile_img) : asset('default-avatar.png') }}"
                 class="w-72 h-72 rounded-full object-cover shadow-2xl border-4 border-blue-600 dark:border-blue-400">
        </div>

    </section>



    {{-- ================= SKILLS ================= --}}
    <section class="py-20">

        <h2 class="section-title">Skills</h2>

        <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-10">

            @foreach($skills as $skill)
                <div class="card-skill" data-aos="zoom-in">

                    <div class="text-5xl text-blue-600 dark:text-blue-400 mb-4">
                        <i class="{{ $skill->icon_class }}"></i>
                    </div>

                    <h3 class="text-xl font-bold mb-2">
                        {{ $skill->name_en }}
                    </h3>

                    <div class="w-full bg-gray-200 dark:bg-gray-700 h-3 rounded-full">
                        <div class="h-3 rounded-full bg-blue-600 dark:bg-blue-400"
                             style="width: {{ $skill->level }}%">
                        </div>
                    </div>

                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">
                        {{ $skill->level }}%
                    </p>

                </div>
            @endforeach

        </div>

    </section>



    {{-- ================= PROJECTS ================= --}}
    <section class="py-20">

        <h2 class="section-title">Projects</h2>

        <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-12">

            @foreach($projects as $project)
                <div class="card-project">

                    <img src="{{ asset('storage/'.$project->thumbnail) }}"
                         class="rounded-t-xl w-full h-52 object-cover">

                    <div class="p-6">

                        <h3 class="text-xl font-bold mb-2">
                            {{ $project->title_en }}
                        </h3>

                        <p class="text-gray-600 dark:text-gray-300 mb-4">
                            {{ Str::limit($project->description_en, 80) }}
                        </p>

                        <a href="{{ route('projects.show', [app()->getLocale(), $project->slug]) }}"
                           class="text-blue-600 dark:text-blue-400 hover:underline font-semibold">
                            View Details →
                        </a>

                    </div>
                </div>
            @endforeach

        </div>

        <div class="mt-12">
            {{ $projects->links() }}
        </div>

    </section>



    {{-- ================= CONTACT FORM ================= --}}
    <section id="contact" class="py-24">
        @include('frontend.contact')

    </section>

</div>

@endsection



