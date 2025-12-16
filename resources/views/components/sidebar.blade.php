<div class="md:w-64">
    <!-- Mobile menu button -->
    <button
        id="mobile-menu-button"
        class="lg:hidden fixed bottom-4 right-4 z-50 p-2 bg-[#a7d9dd] text-gray-900 rounded-md shadow-md hover:bg-[#8dc5ca] transition-colors"
        aria-label="Toggle menu"
    >
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
    </button>

    <div
        class="fixed inset-0 bg-black/50 z-30 hidden"
    ></div>

    <div>

        <aside
            id="sidebar"
            class="hidden md:block md:fixed w-64  bg-[#a7d9dd] text-gray-900 flex flex-col top-0 h-screen transition-transform duration-300 ease-in-out
           z-40 -translate-x-full lg:translate-x-0"
        >

            <div class="flex flex-col items-center p-6 mt-8 lg:mt-0">
                <img
                    src="{{ Vite::asset('resources/images/me2.jpeg') }}"
                    alt="Avatar"
                    class="rounded-full border-4 border-white shadow-md mb-4"
                />
            </div>

            <nav class="mt-10 px-6 space-y-3 text-lg font-medium">
                <a href="#" class="block hover:text-white">Timeline</a>
                <a href="#" class="block hover:text-white">Code</a>
                <a href="#" class="block hover:text-white">Coming soon</a>
            </nav>
        </aside>
    </div>
</div>
