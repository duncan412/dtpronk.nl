import './bootstrap';
import Typed from 'typed.js';

import.meta.glob([
  '../images/**',
  // '../fonts/**',
]);

new Typed('#typed', {
    stringsElement: '#typed-strings',
    loop: true,
    smartBackspace: true,
    loopCount: Infinity,
    backDelay: 1200,
    backSpeed: 50,
    typeSpeed: 50,
    shuffle: true,
});

document.addEventListener('DOMContentLoaded', function () {
    const themeToggle = document.getElementById('theme-toggle');
    const sidebar = document.getElementById('sidebar');
    const mobileMenuButton = document.getElementById('mobile-menu-button');

    function updateThemeToggle(theme) {
        const label = theme === 'dark' ? 'Switch to light mode' : 'Switch to dark mode';
        themeToggle.setAttribute('aria-label', label);
        themeToggle.setAttribute('title', label);
    }

    if (themeToggle) {
        updateThemeToggle(document.documentElement.classList.contains('dark') ? 'dark' : 'light');

        themeToggle.addEventListener('click', function () {
            const theme = document.documentElement.classList.contains('dark') ? 'light' : 'dark';

            document.documentElement.classList.toggle('dark', theme === 'dark');
            document.documentElement.style.colorScheme = theme;
            document.cookie = `theme=${theme}; Path=/; Max-Age=31536000; SameSite=Lax${location.protocol === 'https:' ? '; Secure' : ''}`;
            updateThemeToggle(theme);
        });
    }

    function openSidebar() {
        const elements = document.getElementsByTagName('main');
        if(sidebar.classList.contains('hidden')) {
            sidebar.classList.remove('-translate-x-full');
            sidebar.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
            elements[0].classList.add('hidden');
        }
        else {
            sidebar.classList.add('-translate-x-full');
            sidebar.classList.add('hidden');
            elements[0].classList.remove('hidden');
            document.body.style.overflow = '';
        }
    }

    mobileMenuButton.addEventListener('click', openSidebar);
});
