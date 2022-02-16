let mix = require('laravel-mix');

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

// merge and minify css, js file
mix.styles([
       'public/assets/vendors/bootstrap/dist/css/bootstrap.min.css',
       'public/assets/vendors/font-awesome/css/font-awesome.min.css',
       'public/assets/vendors/nprogress/nprogress.css',
       'public/assets/vendors/bootstrap-daterangepicker/daterangepicker.css',
       'public/assets/build/css/custom.min.css',
       'public/assets/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css',
       'public/css/toastr.min.css'
   ], 'public/css/bundle.css')
.combine([
    'public/assets/vendors/jquery/dist/jquery.min.js',
    'public/assets/vendors/bootstrap/dist/js/bootstrap.min.js',
    'public/assets/vendors/fastclick/lib/fastclick.js',
    'public/assets/vendors/nprogress/nprogress.js',
    'public/assets/vendors/jquery-sparkline/dist/jquery.sparkline.min.js',
    'public/assets/vendors/jquery-sparkline/dist/jquery.sparkline.min.js',
    'public/assets/vendors/Flot/jquery.flot.js',
    'public/assets/vendors/Flot/jquery.flot.pie.js',
    'public/assets/vendors/Flot/jquery.flot.time.js',
    'public/assets/vendors/Flot/jquery.flot.stack.js',
    'public/assets/vendors/Flot/jquery.flot.resize.js',
    'public/assets/vendors/raphael/raphael.min.js',
    'public/assets/vendors/morris.js/morris.min.js',
    'public/assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js',
    'public/assets/vendors/flot-spline/js/jquery.flot.spline.min.js',
    'public/assets/vendors/flot.curvedlines/curvedLines.js',
    'public/assets/vendors/DateJS/build/date.js',
    'public/assets/vendors/moment/min/moment.min.js',
    'public/assets/vendors/bootstrap-daterangepicker/daterangepicker.js',
    'public/assets/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js',
    'public/assets/build/js/custom.js',
    'public/js/toastr.min.js',
    'public/js/adsense.js',
],'public/js/bundle.js');