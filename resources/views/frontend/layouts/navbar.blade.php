<nav class="bg-white dark:bg-gray-900 shadow sticky top-0 z-50 transition-all">
    <div class="container mx-auto flex items-center justify-between py-4 px-6">

        {{-- Logo --}}
        <a href="{{ url(app()->getLocale()) }}" class="text-2xl font-bold text-blue-600 dark:text-blue-400">
            <i class="fa-solid fa-code"></i> Ragheb.dev
        </a>

        {{-- Desktop Menu --}}
        <ul class="hidden md:flex items-center gap-8 font-medium">

            <li><a href="{{ url(app()->getLocale()) }}" class="nav-link">{{ __('general.home') }}</a></li>
            <li><a href="#projects" class="nav-link">{{ __('general.projects') }}</a></li>
            <li><a href="#skills" class="nav-link">{{ __('general.skills') }}</a></li>
            <li><a href="#contact" class="nav-link">{{ __('general.contact') }}</a></li>

        </ul>

        {{-- Actions --}}
        <div class="flex items-center gap-4">

            {{-- Language Switch --}}
            <div class="flex items-center gap-2 text-lg">
                <a href="/en" class="lang {{ app()->getLocale() == 'en' ? 'active-lang' : '' }}">EN</a>
                <span class="text-gray-400 dark:text-gray-600">|</span>
                <a href="/ar" class="lang {{ app()->getLocale() == 'ar' ? 'active-lang' : '' }}">AR</a>
            </div>

            {{-- 🌙 Dark Mode --}}
            <button id="themeToggle"
                class="text-xl px-3 py-2 rounded hover:bg-gray-200 dark:hover:bg-gray-700 transition">

                <!-- Moon (light mode default) -->
                <i id="moonIcon" class="fa-solid fa-moon"></i>

                <!-- Sun (hidden by default) -->
                <i id="sunIcon" class="fa-solid fa-sun hidden"></i>
            </button>

            {{-- Mobile Button --}}
            <button onclick="toggleMenu()" class="text-2xl md:hidden">
                <i class="fa-solid fa-bars text-gray-800 dark:text-gray-200"></i>
            </button>

        </div>
    </div>

    {{-- Mobile Menu --}}
    <div id="mobileMenu" class="hidden bg-white dark:bg-gray-900 border-t dark:border-gray-700 md:hidden">

        <ul class="flex flex-col p-6 gap-6 text-lg">
            <li><a href="{{ url(app()->getLocale()) }}" class="mobile-link">{{ __('general.home') }}</a></li>
            <li><a href="#projects" class="mobile-link">{{ __('general.projects') }}</a></li>
            <li><a href="#skills" class="mobile-link">{{ __('general.skills') }}</a></li>
            <li><a href="#contact" class="mobile-link">{{ __('general.contact') }}</a></li>
        </ul>

    </div>
</nav>

{{-- ===== Tailwind Custom Classes ===== --}}
<style>
    .nav-link {
        @apply text-gray-800 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 transition;
    }

    .mobile-link {
        @apply text-gray-800 dark:text-gray-200 hover:text-blue-600 transition;
    }

    .lang {
        @apply hover:text-blue-600 dark:hover:text-blue-400 transition;
    }

    .active-lang {
        @apply font-bold text-blue-700 dark:text-blue-400 underline;
    }
</style>
