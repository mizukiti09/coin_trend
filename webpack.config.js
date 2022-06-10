const path = require('path');

module.exports = {
    entry: path.join(__dirname, 'resources/js/app.js'),
    output: {
        path: path.join(__dirname, 'public/js/app.js'),
    },
    module: {
        loaders: [{
            test: /\.js$/,
            exclude: /node_modules/,
            loader: 'babel-loader',
            query: {
                presets: ['@babel/preset-env']
            }
        }]
    },
    resolve: {
        modules: [path.join(__dirname, 'src'), 'node_modules'],
        extensions: ['.js']
    }
};