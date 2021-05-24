const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js')
    // .browserSync({
    //     proxy: '172.16.10.210',
    //     host: '172.16.10.210',
    //     open: 'external',
    //     port: 8088,
    //     notify: false,
    //     https: {
    //         cert: "smartdial",
    //         key: "password"
    //     }
    // })
    .vue()
    .postCss('resources/css/app.css', 'public/css', [
        require("tailwindcss"),
    ]);
   
