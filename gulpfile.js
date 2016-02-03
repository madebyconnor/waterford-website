var scripts = ['js/headroom.min.js', 'js/jquery.min.js', 'js/height.js', 'js/slick.js', 'js/slick-lightbox.min.js', 'js/script.js'];


// Include plugins
var gulp = require('gulp'),
autoprefixer = require('gulp-autoprefixer'),
minifycss = require('gulp-minify-css'),
rename = require('gulp-rename'),
concat = require('gulp-concat'),
notify = require('gulp-notify'),
del = require('del'),
myth = require('gulp-myth'),
livereload = require('gulp-livereload'),
plumber = require('gulp-plumber'),
watch = require("gulp-watch"),
jshint = require('gulp-jshint'),
uglify = require('gulp-uglify');


// Lint Task
// gulp.task('lint', function() {
//     return gulp.src('js/*.js')
//         .pipe(jshint())
//         .pipe(jshint.reporter('default'));
// });


// Styles
gulp.task('styles', function() {
  return gulp.src('css/style.css')
  // .pipe(watch('css/*.css'))
  .pipe(plumber())
  .pipe(myth())
  .pipe(gulp.dest('dist'))
  .pipe(autoprefixer({
    browsers: ['last 4 versions'],
    cascade: false
  }))
  .pipe(minifycss())
  .pipe(gulp.dest('dist'))
  // .pipe(livereload());
  // .pipe(notify({ message: 'Styles task complete' }));
});


// Scripts
gulp.task('scripts', function () {
  return gulp.src(scripts)
  .pipe(plumber())
  .pipe(concat('all.js'))
  .pipe(uglify())
  .pipe(gulp.dest('dist'))
  // .pipe(livereload());
  // .pipe(notify({ message: 'Scripts task complete' }));
});

// Default task
gulp.task('default', function() {
  gulp.start(['styles', 'scripts', 'watch']);
});

// Watch
gulp.task('watch', function() {
  // livereload.listen();
    // Watch .scss files
    gulp.watch('css/*.css', ['styles']);
    //Watch .js files
    gulp.watch('js/script.js', ['scripts']);
});
