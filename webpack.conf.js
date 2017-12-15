const webpack = require('webpack');
const prod    = (process.env.BABEL_ENV === 'production');

module.exports = require('./webpack.base.js')({
    devtool: 'cheap-module-source-map',
    entry:   [
        `${__dirname}/resources/assets/index`
    ],
    out:     {
        path: `${__dirname}/public/dist/`,
        file: `app.${prod ? 'min' : 'dev'}`
    },
    resolve: [
        `${__dirname}/resources/assets`,
        `${__dirname}/resources/assets/styles`,
    ],
    alias:   {
        vue: `vue/dist/vue${prod?'.min':''}.js`
    },
    plugins: [
        new webpack.optimize.UglifyJsPlugin()
    ],
    rules: []
});
