const mix = require('laravel-mix');

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

mix.js('resources/js/products/welcome.js', 'public/js/products')
    .js("resources/js/products/details.js","public/js/products")
    .js("resources/js/chart/welcome.js", "public/js/chart");
mix.sass('resources/sass/welcome.scss', 'public/css');