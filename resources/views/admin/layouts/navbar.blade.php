<nav class="bg-white dark:bg-gray-900 shadow-sm border-b dark:border-gray-700 sticky top-0 z-50">

    <div class="flex items-center justify-between px-6 py-4">

        {{-- LEFT --}}
        <div class="flex items-center gap-3">
            <button onclick="toggleSidebar()" class="md:hidden text-2xl text-gray-700 dark:text-gray-300">
                <i class="fa-solid fa-bars"></i>
            </button>

            <h1 class="text-xl font-bold text-gray-700 dark:text-gray-200">
                @yield('page-title', 'Dashboard')
            </h1>
        </div>

        {{-- RIGHT --}}
        <div class="flex items-center gap-6">

            {{-- DARK MODE --}}
            <button onclick="toggleTheme()"
                class="text-xl text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition">
                <i class="fa-solid fa-moon dark:hidden"></i>
                <i class="fa-solid fa-sun hidden dark:inline"></i>
            </button>

            {{-- NOTIFICATIONS --}}
            <a href="{{ route('admin.messages.index') }}"
               class="relative text-gray-700 dark:text-gray-300 hover:text-blue-600 transition">
                <i class="fa-solid fa-bell text-xl"></i>

                @php $unread = \App\Models\ContactMessage::where('is_read',0)->count(); @endphp

                @if($unread > 0)
                    <span
                        class="absolute -top-1 -right-2 w-4 h-4 bg-red-600 text-xs text-white rounded-full flex items-center justify-center">
                        {{ $unread }}
                    </span>
                @endif
            </a>

            {{-- PROFILE --}}
            <div class="relative" x-data="{ open:false }">

                <button @click="open=!open" class="flex items-center gap-3">
                    <img src="{{ auth()->user()->profile_img ? asset('storage/'.auth()->user()->profile_img) : asset('default-avatar.png') }}"
                         class="w-10 h-10 rounded-full border dark:border-gray-700 object-cover">
                </button>

                <div x-show="open" @click.away="open=false" x-transition
                     class="absolute right-0 mt-3 w-52 bg-white dark:bg-gray-800 shadow-xl rounded-xl border dark:border-gray-700 py-2 z-50">

                    <div class="px-4 py-2 text-sm text-gray-700 dark:text-gray-300 border-b dark:border-gray-700 font-medium">
                        {{ auth()->user()->name }}
                    </div>

                    <a href="{{ route('admin.profile.edit') }}"
                       class="flex items-center gap-3 px-4 py-3 text-sm
                              text-gray-700 dark:text-gray-300
                              hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                        <i class="fa-solid fa-user-gear"></i>
                        <span>Profile Settings</span>
                    </a>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button
                            class="flex items-center gap-3 px-4 py-3 text-sm
                                   text-red-600 hover:text-red-500
                                   hover:bg-gray-100 dark:hover:bg-gray-700 transition w-full text-left">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            <span>Logout</span>
                        </button>
                    </form>

                </div>

            </div>

        </div>
    </div>
</nav>
