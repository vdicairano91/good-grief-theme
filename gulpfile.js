"use strict";

// Load plugins
const autoprefixer = require("autoprefixer");
const browsersync = require("browser-sync").create();
const cp = require("child_process");
const cssnano = require("cssnano");
const del = require("del");
const eslint = require("gulp-eslint");
const gulp = require("gulp");
const imagemin = require("gulp-imagemin");
const newer = require("gulp-newer");
const plumber = require("gulp-plumber");
const concat = require('gulp-concat');
const postcss = require("gulp-postcss");
const rename = require("gulp-rename");
const sass = require("gulp-sass");
const sourcemaps = require('gulp-sourcemaps');
const webpack = require("webpack");
const webpackconfig = require("./webpack.config.js");
const webpackstream = require("webpack-stream");

// JS Files to compile
const jsFiles = [
  "library/js/**/*"
];

// BrowserSync
function browserSync(done) {
  browsersync.init({
    proxy: "localhost"
  });
  done();
}

// BrowserSync Reload
function browserSyncReload(done) {
  browsersync.reload();
  done();
}

// Clean assets
function clean() {
  return del(["library/javascript/", "library/css/"]);
}

// Optimize Images
function images() {
  return gulp
    .src("library/images/*")
    .pipe(newer("library/images/*"))
    .pipe(
      imagemin([
        imagemin.gifsicle({ interlaced: true }),
        imagemin.jpegtran({ progressive: true }),
        imagemin.optipng({ optimizationLevel: 5 }),
        imagemin.svgo({
          plugins: [
            {
              removeViewBox: false,
              collapseGroups: true
            }
          ]
        })
      ])
    )
    .pipe(gulp.dest("library/images/*"));
}

// CSS task
function css() {
  return gulp
    .src("library/scss/*.scss")
    .pipe(sourcemaps.init())
    .pipe(sass({ outputStyle: "compressed" }).on('error', sass.logError))
    .pipe(concat('styles.css'))
    .pipe(sourcemaps.write('/'))
    .pipe(gulp.dest("library/css/"))
    //.pipe(rename({ suffix: ".min" }))
    //.pipe(postcss([autoprefixer(), cssnano()]))
    //.pipe(gulp.dest("library/css/"))
    .pipe(browsersync.stream());
}

// Lint scripts
function scriptsLint() {
  return gulp
    .src(jsFiles)
    .pipe(plumber())
    .pipe(eslint())
    .pipe(eslint.format())
    .pipe(eslint.failAfterError());
}

// Transpile, concatenate and minify scripts
function scripts() {
  return (
    gulp
      .src(jsFiles)
      //.src(["library/js/**/*"])
      .pipe(plumber())
      .pipe(webpackstream(webpackconfig, webpack))
      // folder only, filename is specified in webpack config
      .pipe(gulp.dest("library/javascript/"))
      .pipe(browsersync.stream())
  );
}

// Jekyll
function jekyll() {
  return cp.spawn("bundle", ["exec", "jekyll", "build"], { stdio: "inherit" });
}

// Watch files
function watchFiles() {
  gulp.watch("library/scss/**/*", gulp.series(css));
  gulp.watch("library/js/**/*", gulp.series(scriptsLint, scripts, browserSyncReload));
  gulp.watch(
    [
      "**/*.php"
    ],
    gulp.series(browserSyncReload)
  );
  //gulp.watch("./assets/img/**/*", images);
}

// define complex tasks
const js = gulp.series(scriptsLint, scripts);
const build = gulp.series(clean, gulp.parallel(css, js));
const watch = gulp.parallel(watchFiles, browserSync);

// export tasks
exports.images = images;
exports.css = css;
exports.js = js;
exports.jekyll = jekyll;
exports.build = build;
exports.watch = watch;
exports.default = watch;