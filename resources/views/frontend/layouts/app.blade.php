<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" 
      dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}"
      class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Portfolio')</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Tailwind --}}
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

    {{-- FontAwesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    
{{-- ================= CUSTOM CSS ================= --}}
<style>
    .section-title {
        @apply text-4xl font-extrabold text-center mb-12;
    }

    .btn-primary {
        @apply px-6 py-3 bg-blue-600 dark:bg-blue-500 text-white rounded-lg shadow hover:bg-blue-700 transition;
    }

    .btn-dark {
        @apply px-6 py-3 bg-gray-900 text-white rounded-lg shadow hover:bg-black transition;
    }

    .input {
        @apply w-full p-3 border border-gray-300 dark:border-gray-700 rounded-lg bg-white dark:bg-gray-800 dark:text-gray-200;
    }

    .label {
        @apply font-semibold text-gray-700 dark:text-gray-300;
    }

    .card-project,
    .card-skill,
    .card-contact {
        @apply bg-white dark:bg-gray-900 p-6 rounded-xl shadow hover:shadow-xl transition;
    }

    .social-icon {
        @apply text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition;
    }
</style>
</head>

<body class="bg-gray-100 text-gray-800">

    {{-- Navbar --}}
    @include('frontend.layouts.navbar')

    <main class="py-10 min-h-screen">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('frontend.layouts.footer')
   <script>
    const html = document.documentElement;
    const moon = document.getElementById("moonIcon");
    const sun = document.getElementById("sunIcon");

    // Load theme
    if (localStorage.getItem("theme") === "dark") {
        html.classList.add("dark");
        moon.classList.add("hidden");
        sun.classList.remove("hidden");
    } else {
        html.classList.remove("dark");
        sun.classList.add("hidden");
        moon.classList.remove("hidden");
    }

    // Toggle theme
    document.getElementById("themeToggle").onclick = function () {
        if (html.classList.contains("dark")) {
            html.classList.remove("dark");
            localStorage.setItem("theme", "light");
            sun.classList.add("hidden");
            moon.classList.remove("hidden");
        } else {
            html.classList.add("dark");
            localStorage.setItem("theme", "dark");
            moon.classList.add("hidden");
            sun.classList.remove("hidden");
        }
    };
</script>


</body>
</html>
