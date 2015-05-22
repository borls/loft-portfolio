var gulp = require("gulp"),
    connect = require("gulp-connect"),
    opn = require("opn"),
    livereload = require('gulp-livereload');

// Запускаем локальный сервер
gulp.task('connect', function () {
    connect.server({
        root: 'app',
        livereload: true,
        port: 7777
    });
    opn("http://localhost:7777")
});

// Работа с HTML
gulp.task('html', function () {
    livereload.changed();
    gulp.src('./app/*.html')
        .pipe(connect.reload());
});
// Работа с CSS
gulp.task('css', function () {
    livereload.changed();
    gulp.src('./app/css/*.css')
        .pipe(connect.reload());
});
// Работа с JS
gulp.task('js', function () {
    livereload.changed();
    gulp.src('./app/js/*.js')
        .pipe(connect.reload());
});

// Работа с JS
gulp.task('php', function () {
    livereload.changed();
});



// Слежка
gulp.task('watch', function () {
    livereload.listen();
    opn('http://codebor.local/');
    gulp.watch(['./app/*.html'], ['html']);
    gulp.watch(['./app/css/*.css'], ['css']);
    gulp.watch(['./app/js/*.js'], ['js']);
    gulp.watch('app/*.php', ['php']);
});

// Задача по умолчанию
gulp.task('default', ['connect', 'watch']);