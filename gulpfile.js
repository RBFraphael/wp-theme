const gulp = require('gulp');
const sass = require('gulp-sass')(require('node-sass'));
const imagemin = require('gulp-imagemin');
const browserify = require('browserify');
const babelify = require('babelify');
const source = require('vinyl-source-stream');
const purgecss = require('gulp-purgecss');
const rename = require('gulp-rename');

/**
 * 
 * All CSS tasks
 * 
 */

gulp.task("css:build", () => {
    return gulp.src(["./assets/src/scss/admin/admin.scss", "./assets/src/scss/theme/theme.scss"])
        .pipe(sass.sync({
            outputStyle: "compressed"
        }).on("error", sass.logError))
        .pipe(gulp.dest("./assets/dist/css"));
});

gulp.task("css:purge", () => {
    return gulp.src(["./assets/dist/css/*.css", "!./assets/dist/css/*.min.css"])
        .pipe(purgecss({
            content: [
                "./*.php",
                "./templates/**/*.php",
                "./includes/classes/**/*.php",
                "./includes/helpers/**/*.php",
                "./assets/dist/js/*.js",
                "./.purgecssignore"
            ]
        }))
        .pipe(rename({
            suffix: ".min"
        }))
        .pipe(gulp.dest("./assets/dist/css"));
});

gulp.task("css:watch", (done) => {
    gulp.watch("./assets/src/scss/**/*.scss", gulp.series("css:build", "css:purge"));

    gulp.watch([
        "./*.php",
        "./templates/**/*.php",
        "./includes/classes/**/*.php",
        "./includes/helpers/**/*.php",
        "./assets/dist/js/*.js",
        "./.purgecssignore"
    ], gulp.series("css:purge"));

    done();
});

gulp.task("css", gulp.series("css:build", "css:purge"));

/**
 * 
 * All JavaScript tasks
 * 
 */

gulp.task("js:build", (done) => {
    browserify({entries: './assets/src/js/theme/theme.js'})
        .transform(babelify.configure({
            presets: ['@babel/preset-env']
        }))
        .bundle()
        .on("error", (e) => {
            console.error(e.message);
        })
        .pipe(source("theme.js"))
        .pipe(gulp.dest("./assets/dist/js"));

    browserify({entries: ['./assets/src/js/admin/admin.js']})
        .transform(babelify.configure({
            presets: ['@babel/preset-env']
        }))
        .bundle()
        .on("error", (e) => {
            console.error(e.message);
        })
        .pipe(source("admin.js"))
        .pipe(gulp.dest("./assets/dist/js"));

    done();
});

gulp.task("js:watch", () => {
    return gulp.watch("./assets/src/js/**/*.js", gulp.series("js:build"));
});

gulp.task("js", gulp.series("js:build"));

/**
 * 
 * All images tasks
 * 
 */

gulp.task("img:build", () => {
    return gulp.src("./assets/src/img/*")
        .pipe(imagemin())
        .pipe(gulp.dest("./assets/dist/img"));
});

gulp.task("img:watch", (done) => {
    return gulp.watch("./assets/src/img/*", gulp.series("img:build"));
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

gulp.task("fonts:watch", () => {
    return gulp.watch([
        "./assets/src/fonts/*",
        "./assets/src/webfonts/*",
    ], gulp.series("fonts:copy"));
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