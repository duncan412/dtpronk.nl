<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Duncan Pronk - @yield('title')</title>
    <script>
        (() => {
            const savedTheme = document.cookie
                .split('; ')
                .find((cookie) => cookie.startsWith('theme='))
                ?.slice('theme='.length);
            const theme = ['light', 'dark'].includes(savedTheme)
                ? savedTheme
                : (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');

            document.documentElement.classList.toggle('dark', theme === 'dark');
            document.documentElement.style.colorScheme = theme;
        })();
    </script>
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="bg-white text-gray-800 font-sans dark:bg-gray-900 dark:text-gray-100">

    <button
        id="theme-toggle"
        type="button"
        class="fixed top-4 right-4 z-50 rounded-full bg-white/90 p-3 text-gray-800 shadow-md transition-colors hover:bg-white dark:bg-gray-800 dark:text-gray-100 dark:hover:bg-gray-700"
        aria-label="Toggle dark mode"
        title="Toggle dark mode"
    >
        <svg class="h-5 w-5 dark:hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v2m0 14v2M5.636 5.636l1.414 1.414m9.9 9.9 1.414 1.414M3 12h2m14 0h2M5.636 18.364l1.414-1.414m9.9-9.9 1.414-1.414M16 12a4 4 0 1 1-8 0 4 4 0 0 1 8 0Z" />
        </svg>
        <svg class="hidden h-5 w-5 dark:block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 0 1 8.646 3.646 9 9 0 1 0 20.354 15.354Z" />
        </svg>
    </button>

    <div class="flex min-h-screen">
        <x-sidebar />

        <!-- Main Content -->
        <main class="flex-1 flex flex-col overflow-y-auto">

            @yield('content')

            <footer class="mt-12 sm:mt-16 lg:mt-20 text-center text-xs sm:text-sm text-gray-500 px-4 pb-6 dark:text-gray-400">
                Duncan Pronk 2019 - {{ date('Y') }}
            </footer>

    </main>
    </div>
</body>

</html>
