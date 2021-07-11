const gulp          = require('gulp');
const minifycss 		= require('gulp-minify-css');
const notify 				= require('gulp-notify');
const autoprefixer 	= require('gulp-autoprefixer');
const sass 					= require('gulp-sass');
const plumber       = require('gulp-plumber');
const webpack       = require('webpack-stream');
var browserSync     = require('browser-sync').create();
const sourcemaps    = require('gulp-sourcemaps');

// CSS
gulp.task('css:build',() => {
  return gulp.src('src/scss/style.scss')
    .pipe(sourcemaps.init())
    .pipe(sass())
    .pipe(minifycss())
    .pipe(autoprefixer('last 3 version'))
    .pipe(sourcemaps.write())
    .pipe(gulp.dest('./'))
    .pipe(notify({
      title: 'Cool!',
      message: '\nCSS built!',
      icon: __dirname + '/node_modules/gulp-notify/assets/gulp.png'
    }));
});

gulp.task('css:watch', () => {
  return gulp.watch(['src/scss/**/*.scss', 'src/scss/*.scss'], gulp.series('css:build'));
});

gulp.task('css', gulp.series('css:build', 'css:watch'));

gulp.task('js:watch', () => {
  return gulp.watch('src/js/*.js', gulp.series('webpack'));
});


gulp.task('webpack', () => {
  return gulp.src('src/js/index.js')
    .pipe(plumber())
    .pipe(webpack(require('./webpack.config.js')))
    .pipe(gulp.dest('./dist'));
})

gulp.task('js', gulp.series('webpack', 'js:watch'));

// BUILD
gulp.task('build', gulp.parallel('css', 'js'));

// Serve
gulp.task('serve', function() {

  browserSync.init({
    proxy: "gabriel.localhost"
  });

  gulp.watch("style.css").on('change', browserSync.reload);
});
