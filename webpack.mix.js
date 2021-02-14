const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.

 ** MY NOTE : THE VERSION FUNCTION BELOW CREATES NEW FILES FOR JS AND CSS, TO FORCE THE BROWSER TO LOAD THE NEW CHANGES. THE VERSIONED FILES ARE SAVED IN PUBLIC/MIX-MANIFEST.JSON. ALSO, IN YOUR TEMPLATE FILES, IN OPRDER TO USE THOSE VERSIO CHANGES CSS AND JS, YOU WILL NEED TO USE THE FORMAT : href="{{ mix('css/app.css') }}" instead of href="{{ asset('css/app.css') }}"
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');
