const mix = require('laravel-mix');
require('laravel-mix-purgecss');

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css')
    .browserSync('http://127.0.0.1:8000/')
    .options({
        postCss: [require('tailwindcss')]
    })
    .purgeCss();

// mix.browserSync('http://127.0.0.1:8000/');
