const { mix } = require('laravel-mix');

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

mix.js('resources/assets/js/searchPage.js',	'public/js/app.js')
   .js('resources/assets/js/maps.js',	'public/js/maps.js')
   .js('resources/assets/js/rateProperty.js',	'public/js/rateProperty.js')
   .js('resources/assets/js/functions.js',	'public/js/functions.js')
   .sass('resources/assets/sass/app.scss', 'public/css');