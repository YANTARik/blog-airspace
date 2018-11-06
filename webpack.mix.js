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

mix.js([
    'resources/assets/plugins/bootstrap/js/bootstrap.min.js',
    'resources/assets/plugins/slick-carousel/slick/slick.min.js',
    'resources/assets/plugins/magnific-popup/dist/jquery.magnific-popup.min.js',
    'resources/assets/plugins/mixitup/dist/mixitup.min.js',
    'resources/assets/plugins/SyoTimer/build/jquery.syotimer.min.js',
    'resources/assets/plugins/google-map/map.js',
    'resources/assets/js/bootstrap.js',
    'resources/assets/js/script.js'
], 'public/js/blog.js')

   .styles([
       'resources/assets/plugins/bootstrap/css/bootstrap.min.css',
       'resources/assets/plugins/animate-css/animate.css',
       'resources/assets/plugins/Ionicons/css/ionicons.min.css',
       'resources/assets/plugins/magnific-popup/dist/magnific-popup.css',
       'resources/assets/plugins/slick-carousel/slick/slick.css',
       'resources/assets/plugins/slick-carousel/slick/slick-theme.css',
       'resources/assets/css/style.css'
   ], 'public/css/blog.css');

mix.copy('resources/assets/images', 'public/images');
mix.copy('resources/assets/plugins/Ionicons/fonts', 'public/fonts');
mix.copy('resources/assets/plugins/jquery', 'public/jguery');
mix.copy('resources/assets/plugins/slick-carousel/slick/fonts', 'public/fonts');
mix.copy('resources/assets/css/maps', 'public/css/maps');

