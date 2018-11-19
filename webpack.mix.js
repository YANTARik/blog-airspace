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

mix.scripts([
    //'resources/assets/plugins/bootstrap/js/bootstrap.min.js',
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


mix.styles([
    //'resources/assets/admin/bootstrap/css/bootstrap.min.css',
    'resources/assets/admin/font-awesome/4.5.0/css/font-awesome.min.css',
    'resources/assets/admin/ionicons/2.0.1/css/ionicons.min.css',
    'resources/assets/admin/plugins/iCheck/minimal/_all.css',
    'resources/assets/admin/plugins/datepicker/datepicker3.css',
    'resources/assets/admin/plugins/select2/select2.min.css',
    'resources/assets/admin/plugins/datatables/dataTables.bootstrap.css',
    'resources/assets/admin/dist/css/AdminLTE.min.css',
    'resources/assets/admin/dist/css/skins/_all-skins.min.css'
], 'public/css/admin.css');

mix.scripts([
    // 'resources/assets/admin/plugins/jQuery/jquery-2.2.3.min.js',
    // 'resources/assets/admin/bootstrap/js/bootstrap.min.js',
    'resources/assets/admin/plugins/select2/select2.full.min.js',
    'resources/assets/admin/plugins/datepicker/bootstrap-datepicker.js',
    'resources/assets/admin/plugins/datatables/jquery.dataTables.min.js',
    'resources/assets/admin/plugins/datatables/dataTables.bootstrap.min.js',
    'resources/assets/admin/plugins/slimScroll/jquery.slimscroll.min.js',
    'resources/assets/admin/plugins/fastclick/fastclick.js',
    'resources/assets/admin/plugins/iCheck/icheck.min.js',
    'resources/assets/admin/dist/js/app.min.js',
    'resources/assets/admin/dist/js/demo.js',
    'resources/assets/admin/dist/js/scripts.js'
], 'public/js/admin.js');

mix.js('resources/assets/js/app.js', 'public/js')
    .version();

mix.copy('resources/assets/admin/bootstrap/fonts', 'public/fonts');
mix.copy('resources/assets/admin/dist/fonts', 'public/fonts');
mix.copy('resources/assets/admin/dist/img', 'public/img');
mix.copy('resources/assets/admin/plugins/iCheck/minimal/blue.png', 'public/css');
