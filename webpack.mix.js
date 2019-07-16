const mix = require('laravel-mix');
mix.config.fileLoaderDirs.fonts = 'assets/fonts';
mix.config.fileLoaderDirs.images = 'assets/images';

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */
 mix.sass('resources/assets/sass/app.scss', 'public/assets/css/app.css')
   .js('resources/assets/js/app.js', 'public/assets/js');


