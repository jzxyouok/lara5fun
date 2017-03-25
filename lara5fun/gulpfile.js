var elixir = require('laravel-elixir');

elixir(function(mix) {

    mix.less('app.less')
    	.coffee('module.coffee');

    mix.phpUnit();
    
     mix.styles([
        "vendor/normalize.css",
        "app.css"
    ],'public/output/final.css',"public/css");

    mix.version("public/output/final.css");
});
