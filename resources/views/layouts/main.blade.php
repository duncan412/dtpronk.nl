<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Duncan Pronk - @yield('title')</title>
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="bg-white text-gray-800 font-sans">

    <div class="flex min-h-screen">
        <x-sidebar />

        <!-- Main Content -->
        <main class="flex-1 flex flex-col overflow-y-auto">

            @yield('content')

            <footer class="mt-20 text-center text-sm text-gray-500">
                Duncan Pronk 2019 - {{ date('Y') }}
            </footer>
    </div>
    </main>
    </div>
</body>

</html>
