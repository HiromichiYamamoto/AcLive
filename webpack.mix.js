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

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .sass('resources/assets/sass/style.scss', 'public/common/css/style.css');

// 　　.browserSync({
//     host: 'localhost:8000',
//     proxy: {
//         target: "http://localhost:8000/",
//         ws: true
//     },
//     browser: "google chrome",
//     files: [
//         './**/*.css',
//         './app/**/*',
//         './config/**/*',
//         './resources/views/**/*.blade.php',
//         './resources/views/*.blade.php',
//         './routes/**/*'
//     ],
//     watchOptions: {
//         usePolling: true,
//         interval: 100
//     },
//     open: "external",
//     reloadOnRestart: true
// 　　});