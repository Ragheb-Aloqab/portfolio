<!-- OVERLAY للموبايل -->
<div id="adminSidebarOverlay"
     class="hidden fixed inset-0 bg-black/40 backdrop-blur-sm z-[80] md:hidden"
     onclick="toggleSidebar()"></div>

<!-- =============== SIDEBAR =============== -->
<aside id="adminSidebar"
       class="fixed top-0 left-0 h-full w-72
              bg-white dark:bg-gray-900 shadow-xl
              border-r border-gray-200 dark:border-gray-800
              -translate-x-full md:translate-x-0
              transition-all duration-300 ease-in-out z-[99]">

    {{-- Logo --}}
    <div class="px-6 py-6 border-b dark:border-gray-800 bg-gray-50 dark:bg-gray-800">
        <div class="flex items-center gap-3">
            <div class="p-3 bg-blue-600 text-white rounded-xl shadow-md">
                <i class="fa-solid fa-code text-xl"></i>
            </div>
            <div>
                <h2 class="text-2xl font-extrabold tracking-wide text-blue-600 dark:text-blue-400">
                    Admin Panel
                </h2>
                <p class="text-xs text-gray-500 dark:text-gray-400">
                    Portfolio Management
                </p>
            </div>
        </div>
    </div>

    {{-- Navigation --}}
    <nav class="mt-5 px-4 space-y-1">

        {{-- MAIN --}}
        <p class="text-xs uppercase text-gray-500 dark:text-gray-400 px-2 tracking-wider mb-1">
            MAIN
        </p>

        {{-- Dashboard --}}
        <a href="{{ route('admin.dashboard') }}"
           class="flex items-center gap-4 w-full px-5 py-3 rounded-lg
                  text-gray-700 dark:text-gray-300 font-medium
                  hover:bg-blue-50 dark:hover:bg-gray-800
                  transition-all duration-200
                  {{ request()->is('admin/dashboard') ? 'bg-blue-100 dark:bg-gray-800 text-blue-600 dark:text-blue-400 border-l-4 border-blue-600 dark:border-blue-400' : '' }}">
            <i class="fa-solid fa-gauge-high w-6 text-lg text-center"></i>
            <span>Dashboard</span>
        </a>

        {{-- Projects --}}
        <a href="{{ route('admin.projects.index') }}"
           class="flex items-center gap-4 w-full px-5 py-3 rounded-lg
                  text-gray-700 dark:text-gray-300 font-medium
                  hover:bg-blue-50 dark:hover:bg-gray-800
                  transition-all duration-200
                  {{ request()->is('admin/projects*') ? 'bg-blue-100 dark:bg-gray-800 text-blue-600 dark:text-blue-400 border-l-4 border-blue-600 dark:border-blue-400' : '' }}">
            <i class="fa-solid fa-diagram-project w-6 text-lg text-center"></i>
            <span>Projects</span>
        </a>

        {{-- Skills --}}
        <a href="{{ route('admin.skills.index') }}"
           class="flex items-center gap-4 w-full px-5 py-3 rounded-lg
                  text-gray-700 dark:text-gray-300 font-medium
                  hover:bg-blue-50 dark:hover:bg-gray-800
                  transition-all duration-200
                  {{ request()->is('admin/skills*') ? 'bg-blue-100 dark:bg-gray-800 text-blue-600 dark:text-blue-400 border-l-4 border-blue-600 dark:border-blue-400' : '' }}">
            <i class="fa-solid fa-brain w-6 text-lg text-center"></i>
            <span>Skills</span>
        </a>

        {{-- Messages --}}
        <a href="{{ route('admin.messages.index') }}"
           class="flex items-center gap-4 w-full px-5 py-3 rounded-lg
                  text-gray-700 dark:text-gray-300 font-medium
                  hover:bg-blue-50 dark:hover:bg-gray-800
                  transition-all duration-200
                  {{ request()->is('admin/messages*') ? 'bg-blue-100 dark:bg-gray-800 text-blue-600 dark:text-blue-400 border-l-4 border-blue-600 dark:border-blue-400' : '' }}">
            <i class="fa-solid fa-envelope w-6 text-lg text-center"></i>
            <span>Messages</span>

            @php
                $unread = \App\Models\ContactMessage::where('is_read', 0)->count();
            @endphp

            @if ($unread > 0)
                <span class="ml-auto bg-red-600 text-white rounded-full px-2 py-0.5 text-xs">
                    {{ $unread }}
                </span>
            @endif
        </a>

        {{-- SETTINGS --}}
        <p class="text-xs uppercase text-gray-500 dark:text-gray-400 px-2 tracking-wider mt-4 mb-1">
            SETTINGS
        </p>

        {{-- Profile --}}
        <a href="{{ route('admin.profile.edit') }}"
           class="flex items-center gap-4 w-full px-5 py-3 rounded-lg
                  text-gray-700 dark:text-gray-300 font-medium
                  hover:bg-blue-50 dark:hover:bg-gray-800
                  transition-all duration-200
                  {{ request()->is('admin/profile') ? 'bg-blue-100 dark:bg-gray-800 text-blue-600 dark:text-blue-400 border-l-4 border-blue-600 dark:border-blue-400' : '' }}">
            <i class="fa-solid fa-user-gear w-6 text-lg text-center"></i>
            <span>Profile Settings</span>
        </a>

        {{-- Logout --}}
        <form action="{{ route('logout') }}" method="POST" class="mt-1">
            @csrf
            <button type="submit"
                    class="flex items-center gap-4 w-full px-5 py-3 rounded-lg
                           text-red-600 dark:text-red-400 font-medium
                           hover:bg-red-50 dark:hover:bg-gray-800
                           transition-all duration-200">
                <i class="fa-solid fa-right-from-bracket w-6 text-lg text-center"></i>
                <span>Logout</span>
            </button>
        </form>

    </nav>
</aside>
