const mix = require('laravel-mix');

/* Mix Asset Management */

 mix.postCss('resources/css/filament.css', 'public/css', [
    require('tailwindcss'),
])




 mix.js("resources/js/app.js", "public/js")
      .postCss("resources/css/app.css", "public/css", [
        require("tailwindcss"),
      ]);
