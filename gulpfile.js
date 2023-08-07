const gulp = require('gulp');
const sass = require('gulp-sass')(require('node-sass'));
const autoprefixer = require('gulp-autoprefixer');
const concat = require('gulp-concat');
const uglify = require("gulp-uglify");
const plumber = require("gulp-plumber");
const purgecss = require("gulp-purgecss");
const cleancss = require("gulp-clean-css");
const webp = require('gulp-webp');
const rename = require('gulp-rename');

// SCSSのファイル名とCSSの出力先を指定
gulp.task('sass', () => {
    return gulp.src('./assets/scss/**/*.scss')
        .pipe(sass({outputStyle: 'expanded'}))
        .pipe(autoprefixer())
        .pipe(cleancss())   
        .pipe(rename({
            suffix: '.min',
          }))
        .pipe(gulp.dest('./dist/css'));
});

// エディター用にファイルを出力
gulp.task('sass-editor', () => {
    return gulp.src('./assets/scss/**/*.scss')
        .pipe(sass({outputStyle: 'expanded'}))
        .pipe(autoprefixer())
        .pipe(cleancss())   
        .pipe(rename({
            suffix: '-editor.min',
          }))
        .pipe(gulp.dest('./dist/css'));
});

gulp.task("js", function() {
    return gulp.src([
        './assets/js/slick/slick.min.js',
        './assets/js/form/form.js', 
        './assets/js/main/main.js'
    ])
      .pipe(concat('script.min.js'))
      .pipe(gulp.dest('./dist/js'));
  });

gulp.task('image', () => {
return gulp.src('./assets/images/**/*.{jpg,jpeg,png}')
    .pipe(webp())
    .pipe(webp({
        quality: 100,
        method: 6,
    }))
    .pipe(gulp.dest('./dist/images'))
});

// 自動監視のタスクを作成
gulp.task('watch', () => {
    gulp.watch('./assets/js/**/*.js', gulp.task('js')),
    gulp.watch('./assets/scss/**/*.scss', gulp.task('sass'));
    gulp.watch('./assets/scss/**/*.scss', gulp.task('sass-editor'));
});

// "npm run gulp" コマンドでsass:watchが実行されるように指定
gulp.task('default', gulp.task('watch'));


// 画像返還タスク
gulp.task('webp', gulp.task('image'));

// デフォルト
gulp.task('default', gulp.task('watch'));
