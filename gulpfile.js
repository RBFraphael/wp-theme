const gulp = require('gulp');
const babel = require('gulp-babel');
const sass = require('gulp-sass')(require('node-sass'));
const imagemin = require('gulp-imagemin');
const browserify = require('browserify');
const babelify = require('babelify');
const source = require('vinyl-source-stream');

/**
 * 
 * All CSS tasks
 * 
 */

gulp.task("css:build", (done) => {
    gulp.src("./assets/src/scss/admin/admin.scss")
        .pipe(sass.sync({
            outputStyle: "compressed"
        }).on("error", sass.logError))
        .pipe(gulp.dest("./assets/dist/css"));
    
    gulp.src("./assets/src/scss/theme/theme.scss")
        .pipe(sass.sync({
            outputStyle: "compressed"
        }).on("error", sass.logError))
        .pipe(gulp.dest("./assets/dist/css"));

    done();
});

gulp.task("css:watch", (done) => {
    gulp.watch("./assets/src/scss/**/*.scss", gulp.series("css:build"));
    
    done();
});

gulp.task("css", gulp.series("css:build"));

/**
 * 
 * All JavaScript tasks
 * 
 */

gulp.task("js:build", (done) => {
    browserify({entries: ['./assets/src/js/theme/theme.js']})
        .transform(babelify.configure({
            presets: ['@babel/preset-env']
        }))
        .bundle()
        .pipe(source("theme.js"))
        .pipe(gulp.dest("./assets/dist/js"));

    browserify({entries: ['./assets/src/js/admin/admin.js']})
        .transform(babelify.configure({
            presets: ['@babel/preset-env']
        }))
        .bundle()
        .pipe(source("admin.js"))
        .pipe(gulp.dest("./assets/dist/js"));

    done();
});

gulp.task("js:watch", (done) => {
    gulp.watch("./assets/src/js/**/*.js", gulp.series("js:build"));
    
    done();
});

gulp.task("js", gulp.series("js:build"));

/**
 * 
 * All images tasks
 * 
 */

gulp.task("img:build", (done) => {
    gulp.src("./assets/src/img/*")
        .pipe(imagemin())
        .pipe(gulp.dest("./assets/dist/img"));
    
    done();
});

gulp.task("img:watch", (done) => {
    gulp.watch("./assets/src/img/*", gulp.series("img:build"));

    done();
});

gulp.task("img", gulp.series("img:build"));

/**
 * 
 * All fonts and webfonts tasks
 * 
 */

gulp.task("fonts:copy", (done) => {
    gulp.src("./assets/src/fonts/*")
        .pipe(gulp.dest("./assets/dist/fonts"));
    
    gulp.src("./assets/src/webfonts/*")
        .pipe(gulp.dest("./assets/dist/webfonts"));
    
    done();
});

gulp.task("fonts:watch", (done) => {
    gulp.watch([
        "./assets/src/fonts/*",
        "./assets/src/webfonts/*",
    ], gulp.series("fonts:copy"));

    done();
});

gulp.task("fonts", gulp.series("fonts:copy"));

/**
 * 
 * Global tasks
 * 
 */

gulp.task("build", gulp.series("css", "js", "img", "fonts"));
gulp.task("watch", gulp.parallel("css:watch", "js:watch", "img:watch", "fonts:watch"));

/**
 * 
 * Default task
 * 
 */

gulp.task("default", gulp.series("build", "watch"));