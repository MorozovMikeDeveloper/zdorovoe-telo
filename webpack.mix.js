const mix = require('laravel-mix');
const path = require('path')

const CopyWebpackPlugin = require('copy-webpack-plugin');

mix.webpackConfig({
    plugins: [
        new CopyWebpackPlugin({
            patterns: [
                {
                    from: path.resolve(__dirname, 'resources/img'),
                    to: path.resolve(__dirname, 'public/img')
                },
                {
                    from: path.resolve(__dirname, 'resources/video'),
                    to: path.resolve(__dirname, 'public/video')
                },
            ]
        })
    ]
})

mix.js('resources/js/main.js', 'public/js')
    .sass('resources/scss/main.scss', 'public/css')
    .copy('node_modules/font-awesome/fonts/', 'public/fonts')
    .sass('node_modules/font-awesome/scss/font-awesome.scss', 'public/css')
    .version();
