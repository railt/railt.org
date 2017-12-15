const webpack = require('webpack');
const ExtractTextPlugin = require('extract-text-webpack-plugin');
const prod    = (process.env.NODE_ENV === 'production');

module.exports = (config) => {
    const JsLoader = [
        {
            loader: 'babel-loader',
            options: {
                sourceMap: true,
            }
        },
    ];

    const CoffeeLoader = [
        {
            loader: 'coffee-loader',
            options: {
                sourceMap: true,
                transpile: {presets: ['env']}
            }
        },
    ];

    const CssLoader = ExtractTextPlugin.extract({
        use: [
            {
                loader: 'css-loader',
                options: {
                    importLoaders: 1,
                    minimize: true,
                    sourceMap: true
                }
            },
            {
                loader: 'postcss-loader',
                options: {
                    sourceMap: true
                }
            },
            {
                loader: 'sass-loader',
                options: {
                    includePaths: config.resolve,
                    precision: 10,
                    sourceMap: true
                }
            }
        ],
        fallback: 'vue-style-loader'
    });


    return {
        entry: config.entry,
        devtool: config.devtool,
        output: {
            path: config.out.path,
            filename: (config.out.file || 'index') + '.js'
        },
        resolve: {
            extensions: ['*', '.js', '.vue', '.json', '.coffee'],
            modules: config.resolve.concat(['node_modules']),
            alias: config.alias
        },
        module: {
            rules: [
                {
                    test: /\.vue$/,
                    loader: 'vue-loader',
                    options: {
                        esModule: false,
                        preserveWhitespace: false,
                        extractCSS: true,
                        loaders: {
                            scss: CssLoader,
                            sass: CssLoader,
                            css: CssLoader,
                            js: JsLoader,
                            coffee: CoffeeLoader,
                        }
                    }
                },
                {
                    test: /\.js$/,
                    exclude: /node_modules/,
                    use: JsLoader
                },
                {
                    test: /\.coffee$/,
                    use: CoffeeLoader
                },
                {
                    test: /\.(:?sc|sa|c)ss$/,
                    use: CssLoader
                },
                {
                    test: /\.(png|jpg|gif|svg|eot|ttf|woff|woff2)$/,
                    loader: 'url-loader',
                    options: {
                        limit: 10000
                    }
                },
            ].concat(config.rules || [])
        },
        plugins: config.plugins.concat([
            new ExtractTextPlugin((config.out.file || 'index') + '.css'),
            //new webpack.optimize.ModuleConcatenationPlugin(),
        ])
    }
};
