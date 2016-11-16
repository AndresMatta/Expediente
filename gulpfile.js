const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {

	Elixir.webpack.mergeConfig({
        module: {
            loaders: [{
                test: /\.jsx?$/, 
                loader: 'babel',
                exclude: /node_modules(?!\/(vue-tables-2|vue-pagination-2))\//
            }]
        }
    });

    //app.scss includes app css, Boostrap and Ionicons
    mix.webpack('app.js');
});
