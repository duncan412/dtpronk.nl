<div>
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
        id="sidebar-overlay"
        class="fixed inset-0 bg-black/50 z-30 hidden md:block"
    ></div>

    <div>

        <aside
            id="sidebar"
            class="hidden md:visible w-64 bg-[#a7d9dd] text-gray-900 flex flex-col sticky top-0 h-screen transition-transform duration-300 ease-in-out
           lg:static z-40 -translate-x-full lg:translate-x-0"
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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');
            const mobileMenuButton = document.getElementById('mobile-menu-button');

            function openSidebar() {
                if(overlay.classList.contains('hidden')) {

                    sidebar.classList.remove('-translate-x-full');
                    sidebar.classList.remove('hidden');
                    overlay.classList.remove('hidden');
                    document.body.style.overflow = 'hidden';
                }
                else {
                    sidebar.classList.add('-translate-x-full');
                    sidebar.classList.add('hidden');
                    overlay.classList.add('hidden');
                    document.body.style.overflow = '';
                }
            }

            mobileMenuButton.addEventListener('click', openSidebar);
            overlay.addEventListener('click', closeSidebar);
        });
    </script>
</div>
