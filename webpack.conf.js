const webpack = require('webpack');

module.exports = require('./webpack.base.js')({
    devtool: 'cheap-module-source-map',
    entry:   `${__dirname}/resources/assets/index`,
    out:     {
        path: `${__dirname}/public/dist/`,
        file: 'app.min'
    },
    resolve: [
        `${__dirname}/resources/assets`,
        `${__dirname}/resources/assets/styles`,
    ],
    alias:   {
        vue: 'vue/dist/vue.js'
    },
    plugins: [
        /*new webpack.DefinePlugin({
            'process.env': {
                NODE_ENV: '"production"'
            }
        })*/
    ],
    rules: []
});
