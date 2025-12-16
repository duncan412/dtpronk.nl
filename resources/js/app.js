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
    const sidebar = document.getElementById('sidebar');
    const mobileMenuButton = document.getElementById('mobile-menu-button');

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
