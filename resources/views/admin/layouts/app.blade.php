<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Dashboard')</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>

<body class="bg-gray-100 dark:bg-gray-900">

    <div class="flex">

        {{-- SIDEBAR --}}
        @include('admin.layouts.sidebar')

        {{-- MAIN AREA --}}
        <div class="flex-1 md:ml-72 transition-all duration-300">

            {{-- NAVBAR --}}
            @include('admin.layouts.navbar')

            {{-- PAGE CONTENT --}}
            <main class="p-6">
                @yield('content')
            </main>

        </div>
    </div>

    {{-- GLOBAL SCRIPTS --}}
    <script>
        // تفعيل الثيم من localStorage عند تحميل الصفحة
        (function () {
            const savedTheme = localStorage.getItem('theme');
            if (savedTheme === 'dark') {
                document.documentElement.classList.add('dark');
            }
        })();

        function toggleTheme() {
            const html = document.documentElement;
            if (html.classList.contains('dark')) {
                html.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            } else {
                html.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            }
        }

        function toggleSidebar() {
            const sidebar = document.getElementById('adminSidebar');
            const overlay = document.getElementById('adminSidebarOverlay');

            if (!sidebar || !overlay) return;

            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        }
    </script>

</body>
</html>
