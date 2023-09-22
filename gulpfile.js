const { src, dest, parallel } = require('gulp');
const gulp = require('gulp');

const port = '3000';

// Include Our Plugins
const sass = require('gulp-sass');
const babel = require('gulp-babel');
const concat = require('gulp-concat');
const uglify = require('gulp-uglify');
const rename = require('gulp-rename');
const autoprefixer = require('gulp-autoprefixer');
const image = require('gulp-image');
const cleanCSS = require('gulp-clean-css');
const sourcemaps = require('gulp-sourcemaps');
const browserSync = require('browser-sync').create();
const del = require('del');

/* Not all tasks need to use streams, a gulpfile is just another node program
 * and you can use all packages available on npm, but it must return either a
 * Promise, a Stream or take a callback and call it
 */
function clean() {
  // You can use multiple globbing patterns as you would with `gulp.src`,
  // for example if you are using del 2.0 or above, return its promise
  return del(['dist/css/style.min.css', 'dist/js/all/min.css']);
}

const paths = {
  styles: {
      src: ['src/scss/*.scss', 'src/scss/**/*.scss'],
      dest: 'dist/css/',
      node: '../../node_modules'
  },
  scripts: {
      src: 'src/js/',
      dest: 'dist/js/',
      node: '../../node_modules'
  },
  images: {
      src: 'dist/images/**/*',
      dest: 'dist/images/**/*'
  }
};


/*
* Define our tasks using plain functions
*/


function styles() {
  return src(paths.styles.src)

  .pipe(sourcemaps.init())
  .pipe(sass({ outputStyle: 'compressed' }).on('error', sass.logError ))
  .pipe(autoprefixer())
  .pipe(cleanCSS())
  .pipe(sourcemaps.write('.'))
  .pipe(gulp.dest(paths.styles.dest))
  .pipe(browserSync.stream());
}

function scripts() {

  var bootstrap = src([    
    paths.scripts.node + '/bootstrap/dist/js/bootstrap.js',
    paths.scripts.node + '/lazysizes/lazysizes.js',
    paths.scripts.node + '/swiper/swiper-bundle.min.js',
  ])
  .pipe(concat('base.min.js'))
  .pipe(dest(paths.scripts.dest))

  var script = src([    
    paths.scripts.src + '/device-detect.js',
    // paths.scripts.src + '/loader.js',
    paths.scripts.src + '/ui-tab-filter.js',
    paths.scripts.src + '/dropdown.js',
    paths.scripts.src + '/scroll.js',
    paths.scripts.src + '/ui-menu.js',
    paths.scripts.src + '/ui-close.js',
    paths.scripts.src + '/swiper.js',
    paths.scripts.src + '/ui-video.js',
  ])
  .pipe(sourcemaps.init())
  .pipe(babel({
    "presets": ["@babel/env"]
  }))  
  .pipe(uglify())
  .pipe(concat('all.min.js'))    
  .pipe(sourcemaps.write('.'))
  .pipe(dest(paths.scripts.dest))

  return bootstrap, script;

}

function images(){
  return gulp.src(paths.styles.src)
      .pipe(image())
      .pipe(gulp.dest(paths.images.dest));
}

function watch() {
  browserSync.init({
    port: port,
    server: {
      baseDir: "./",
    }
  });
  gulp.watch(paths.scripts.src, scripts);
  gulp.watch(paths.styles.src, styles);
  // gulp.watch('*.html').on('change',browserSync.reload);
  gulp.watch(paths.scripts.src).on('change', browserSync.reload);
}

/*
 * Specify if tasks run in series or parallel using `gulp.series` and `gulp.parallel`
 */
const build = gulp.series(clean, gulp.parallel(styles, scripts));

/*
* You can use CommonJS `exports` module notation to declare tasks
*/
exports.clean = clean;
exports.styles = styles;
exports.scripts = scripts;
exports.images = images;
exports.watch = watch;
exports.default = parallel(clean, styles, scripts, watch);

// /*
//  * You can still use `gulp.task` to expose tasks
//  */
gulp.task('dist', build);

/*
 * Define default task that can be called by just running `gulp` from cli
 */
gulp.task('default', build);