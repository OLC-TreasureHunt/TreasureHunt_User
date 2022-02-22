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

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/pages/register.js', 'public/js/pages')
    .js('resources/js/pages/tree.js', 'public/js/pages')
    .js('resources/js/pages/history.js', 'public/js/pages')
    .sass('resources/sass/app.scss', 'public/css')
    // .sourceMaps()
    .vue()
    .version();
