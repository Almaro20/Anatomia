const mix = require('laravel-mix');

mix.js('resources/js/informe.js', 'public/js')
   .setPublicPath('public');
