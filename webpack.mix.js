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
//mix.js('resources/js/products/welcome.js', 'public/js/products')
//    .js("resources/js/products/details.js","public/js/products")
//    .js("resources/js/chart/welcome.js", "public/js/chart");
//// sass mixings
//mix.sass('resources/sass/welcome.scss', 'public/css')
//    .sass('resources/sass/contact.scss', 'public/css')
//    .sass('resources/sass/produits/details.scss', 'public/css/produits')
//    .sass('resources/sass/produits/welcome.scss', 'public/css/produits')
//    .sass('resources/sass/purchase/welcome.scss', 'public/css/purchase')
//    .sass('resources/sass/chart/welcome.scss', 'public/css/chart');
mix.js("resources/js/auth/register.js","public/js/auth");
mix.sass("resources/sass/auth/login.scss","public/css/auth")
    .sass("resources/sass/auth/register.scss","public/css/auth")
    .sass("resources/sass/user/dashboard.scss", "public/css/user");
