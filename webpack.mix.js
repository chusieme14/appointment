const mix = require('laravel-mix');

mix.webpackConfig({
    resolve:{
       extensions: ['.js', '.vue', '.ts'],
       alias: {
          '@admin': path.resolve(__dirname, 'resources/js/admin/src'),
          '@front': path.resolve(__dirname, 'resources/js/front/src')
       }
    }
 });
/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix
.js('resources/js/admin/app.js', 'js/admin')
// .sass('resources/backoffice/sass/app.scss', 'backoffice/css')

// mix.js('resources/js/app.js', 'public/js')
//     .postCss('resources/css/app.css', 'public/css', [
   //         //
   //     ]);
mix
.js('resources/js/front/app.js', 'js/front')
