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