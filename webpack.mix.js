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

// mix.styles([
//    'public/front/css/libs/revolution/settings.css',
//    //'public/front/css/style.css',
//    'public/front/css/libs/bootstrap/bootstrap.css',
//    'public/front/css/libs/awesome/font-awesome.css',
//    'public/front/css/libs/ionicons/ionicons.css',
//    'public/front/css/libs/owl-carousel/owl.carousel.css',
//    'public/front/css/libs/magnific-popup/main.css',
//    'public/front/css/libs/flexslider/flexslider.css',
//    'public/front/css/libs/camera/camera.css',
//    'public/front/css/libs/jquery-ui/jquery-ui.min.css',
//    'public/front/css/reset-styles.css',
//    'public/front/css/general.css',
//    'public/front/css/header.css',
//    'public/front/css/pages.css',
//    'public/front/css/blog.css',
//    'public/front/css/shop.css',
//    'public/front/css/sidebar.css',
//    'public/front/css/event.css',
//    'public/front/css/rooms.css',
//    'public/front/css/home.css',
//    'public/front/css/footer.css',
//    'public/front/css/responsive.css',
//    'public/front/css/demo.css',

// ], 'public/front/css/laravel-mix-to-include.css');




mix.scripts([
   'public/front/js/libs/jquery-1.12.4.min.js',
   'public/front/js/libs/stellar.min.js',
   'public/front/js/libs/bootstrap.min.js',
   'public/front/js/libs/smoothscroll.min.js',
   'public/front/js/libs/owl.carousel.min.js',
   'public/front/js/libs/jquery.magnific-popup.min.js',
   'public/front/js/libs/theia-sticky-sidebar.min.js',
   'public/front/js/libs/counter-box.min.js',
   'public/front/js/libs/jquery.flexslider-min.js',
   'public/front/js/libs/jquery.thim-content-slider.min.js',
   'public/front/js/libs/gallery.min.js',
   'public/front/js/libs/moment.min.js',
   'public/front/js/libs/jquery-ui.min.js',
   'public/front/js/libs/daterangepicker.min.js',
   'public/front/js/libs/daterangepicker.min-date.min.js',
   'public/front/js/theme-customs.js',

], 'public/js/laravel-mix-all.js');









