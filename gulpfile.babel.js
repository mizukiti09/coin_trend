import gulp from 'gulp';
import webpackConfig from './webpack.config.js';
import webpack from 'webpack-stream';
import notify from 'gulp-notify';
import plumber from 'gulp-plumber';

// gulpタスクの作成
gulp.task('build', function() {
    gulp.src('resources/js/app.js')
        .pipe(plumber({
            errorHandler: notify.onError("Error: <%= error.message %>")
        }))
        .pipe(webpack(webpackConfig))
        .pipe(gulp.dest('public/js/app.js'));
});


// Gulpを使ったファイルの監視
gulp.task('default', ['build', 'browser-sync'], function() {
    gulp.watch('./resources/js/*.js', ['build']);
    gulp.watch('./resources/js/components/*.vue', ['build']);
});