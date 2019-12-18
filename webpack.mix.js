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
// js mixings
mix.js('resources/js/products/welcome.js', 'public/js/products')
    .js("resources/js/products/details.js","public/js/products")
    .js("resources/js/chart/welcome.js", "public/js/chart");
// sass mixings
mix.sass('resources/sass/welcome.scss', 'public/css')
    .sass('resources/sass/contact.scss', 'public/css')
    .sass('resources/sass/produits/details.scss', 'public/css/produits')
    .sass('resources/sass/produits/welcome.scss', 'public/css/produits');
