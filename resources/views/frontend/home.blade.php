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

                {{-- CONTACT INFO --}}
                <div class="flex flex-col gap-4 mt-6">

                    <div class="flex items-center gap-3 text-lg">
                        <i class="fa-solid fa-envelope text-blue-600"></i>

                        <a href="mailto:{{ $user->email }}" class="hover:text-blue-700">
                            {{ $user->email }}
                        </a>
                    </div>


                    <div class="flex items-center gap-3 text-lg">
                        <i class="fa-solid fa-phone text-green-600"></i>
                        <a href="tel:+966563223963" class="hover:text-green-700">
                            +966 56 322 3963
                        </a>
                    </div>

                    <div class="flex items-center gap-3 text-lg">
                        <i class="fa-brands fa-whatsapp text-green-500"></i>
                        <a href="https://wa.me/966563223963" target="_blank" class="hover:text-green-600">
                            WhatsApp
                        </a>
                    </div>

                </div>

                {{-- SOCIAL ICONS --}}
                <div class="flex items-center gap-6 text-3xl mt-6">

                    @if ($user->github)
                        <a href="{{ $user->github }}" class="social-btn github" target="_blank">
                            <i class="fa-brands fa-github"></i>
                        </a>
                    @endif

                    @if ($user->linkedin)
                        <a href="{{ $user->linkedin }}" class="social-icon" style="color:#0A66C2;"
                            onmouseover="this.style.color='#004182'" onmouseout="this.style.color='#0A66C2'">
                            <i class="fa-brands fa-linkedin"></i>
                        </a>
                    @endif

                    @if ($user->twitter)
                        <a href="{{ $user->twitter }}" class="social-icon">
                            <i class="fa-brands fa-twitter"></i>
                        </a>
                    @endif

                </div>

                {{-- BUTTONS --}}
                <div class="flex flex-wrap gap-4 mt-8">

                    <a href="#contact" class="btn-primary text-lg">
                        <i class="fa-solid fa-paper-plane"></i> Contact Me
                    </a>

                    @if ($user->cv_file)
                        <a href="{{ asset('storage/' . $user->cv_file) }}" download class="btn-dark text-lg">
                            <i class="fa-solid fa-download"></i> Download CV
                        </a>
                    @endif

                </div>

            </div>

            {{-- RIGHT SIDE IMAGE --}}
            <div class="flex justify-center">
                <img src="{{ $user->profile_img ? asset('storage/' . $user->profile_img) : asset('default-avatar.png') }}"
                    class="w-72 h-72 rounded-full object-cover shadow-2xl border-4 border-blue-600 dark:border-blue-400">
            </div>

        </section>



        {{-- ================= SKILLS ================= --}}
        <section class="py-20">

            <h2 class="section-title">Skills</h2>

            <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-10">

                @foreach ($skills as $skill)
                    <div class="card-skill">

                        <div class="text-5xl text-blue-600 dark:text-blue-400 mb-4">
                            <i class="{{ $skill->icon_class }}"></i>
                        </div>

                        <h3 class="text-xl font-bold mb-2">{{ $skill->name_en }}</h3>

                        <div class="w-full bg-gray-200 dark:bg-gray-700 h-3 rounded-full">
                            <div class="h-3 rounded-full bg-blue-600 dark:bg-blue-400" style="width: {{ $skill->level }}%">
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

            <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-10">

                @foreach ($projects as $project)
                    <div
                        class="bg-white dark:bg-gray-900 rounded-2xl shadow-md hover:shadow-xl 
                       border border-gray-200 dark:border-gray-700 
                       transition transform hover:-translate-y-2 overflow-hidden group">

                        <!-- IMAGE -->
                        <div class="overflow-hidden">
                            <img src="{{ asset('storage/' . $project->thumbnail) }}"
                                class="w-full h-52 object-cover transition duration-500 group-hover:scale-110">
                        </div>

                        <!-- CONTENT -->
                        <div class="p-6 space-y-4">

                            <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100">
                                {{ $project->title_en }}
                            </h3>

                            <p class="text-gray-600 dark:text-gray-400 text-sm">
                                {{ Str::limit($project->description_en, 80) }}
                            </p>

                            <!-- BUTTON -->
                            <a href="{{ route('projects.show', [app()->getLocale(), $project->slug]) }}"
                                class="inline-flex items-center gap-2 px-4 py-2 text-sm font-semibold
                               rounded-lg text-white bg-blue-600 dark:bg-blue-500
                               hover:bg-blue-700 dark:hover:bg-blue-600
                               transition shadow-md">
                                View Project
                                <i class="fa-solid fa-arrow-right"></i>
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

            <h2 class="text-4xl font-extrabold text-center mb-12 text-gray-800 dark:text-gray-200">
                Contact Me
            </h2>

            <div
                class="bg-white dark:bg-gray-900 p-10 rounded-2xl shadow-xl max-w-3xl mx-auto
                border border-gray-200 dark:border-gray-700">

                <form method="POST" action="{{ route('contact.store', app()->getLocale()) }}">
                    @csrf

                    <div class="grid md:grid-cols-2 gap-6">

                        <div>
                            <label class="form-label">Name</label>
                            <input name="name" class="form-input" placeholder="Your Name">
                        </div>

                        <div>
                            <label class="form-label">Email</label>
                            <input name="email" class="form-input" placeholder="your@email.com">
                        </div>

                    </div>

                    <div class="mt-6">
                        <label class="form-label">Subject</label>
                        <input name="subject" class="form-input" placeholder="Subject">
                    </div>

                    <div class="mt-6">
                        <label class="form-label">Message</label>
                        <textarea name="message" rows="5" class="form-input" placeholder="Write your message..."></textarea>
                    </div>

                    <button
                        class="mt-8 w-full md:w-auto px-8 py-3 text-white text-lg font-semibold
                       rounded-xl shadow-lg transition bg-blue-600 hover:bg-blue-700
                       dark:bg-blue-500 dark:hover:bg-blue-600">
                        <i class="fa-solid fa-paper-plane"></i> Send Message
                    </button>

                </form>

            </div>

        </section>


    </div>

@endsection
