const gulp              = require('gulp');
const minCss            = require('gulp-clean-css');
const concat            = require('gulp-concat');
const concatSourcemap   = require('gulp-concat-sourcemap');
const less              = require('gulp-less');
const notify            = require('gulp-notify');
const rename            = require('gulp-rename');
const sourcemaps        = require('gulp-sourcemaps');
const uglify            = require('gulp-uglify');
const del               = require('del');
const browserSync       = require('browser-sync');
const imagemin       = require('gulp-imagemin');


var src = {
    btsp:{
        less: "bower_components/bootstrap/less/",
        css: "bower_components/bootstrap/dist/css/",
        fonts: "bower_components/bootstrap/fonts/",
        js: "bower_components/bootstrap/dist/js/bootstrap.js"
    },
    web: {
        styles: "app/template/web/styles",
        less: "app/template/web/styles/less/",
        fonts: "app/template/web/fonts/",
        build: {
            base: "app/template/build/",
            fonts: "app/template/build/fonts/",
            styles: "app/template/build/styles/",
            js: "app/template/build/js/",
            img: "app/template/build/img/"
        },
        js: "app/template/web/js/",
        img: "app/template/web/img/**/*"
    },
    bowerLibs: {
        jquery: "bower_components/jquery/dist/jquery.js",
        fontAwesome: {
            css: "bower_components/font-awesome/css/",
            less: "bower_components/font-awesome/less/",
            fonts: "bower_components/font-awesome/fonts/"
        }
    }
};

// LiveReload
gulp.task('browser-sync', function() {
    browserSync({
        server: {
            baseDir: "/",
            directory: true
        },
        notify: false
    });
});

// Delete Font-Awesome internal maps
gulp.task("fawesome:del:maps",function(){
    return del(src.bowerLibs.fontAwesome.css + '*.map')
});

// Font-awesome. Less to CSS.
gulp.task("fawesome:less",["fawesome:del:maps"],function(){
    return gulp.src(src.bowerLibs.fontAwesome.less + 'font-awesome.less')
        .pipe(sourcemaps.init())
        .pipe(less())
        .pipe(sourcemaps.write())
        .pipe(gulp.dest(src.bowerLibs.fontAwesome.css))
        .pipe(notify("Task [fawesome:less] completed. Changes *.less files fixed"))
        .pipe(browserSync.reload({stream:true}));
});

// Less to Sass Bootstrap. Relationship to [btsp:less] task
gulp.task("btsp:less:dep",["del:btsp:maps"], function () {

    return gulp.src(src.btsp.less + "bootstrap.less")
        .pipe(sourcemaps.init())
        .pipe(less())
        .pipe(sourcemaps.write())
        .pipe(gulp.dest(src.btsp.css));

});

// Delete BTSP css maps. Relationship to [btsp:less:dep] task
gulp.task('del:btsp:maps', function () {
    return del([
        src.btsp.css + '*.*',
        '!' + src.btsp.css + '*theme.*'
    ]);
});

// Create *.min.css file with sourcemaps
gulp.task("btsp:less",["btsp:less:dep"], function () {

    return gulp.src(src.btsp.css + "bootstrap.css")
        .pipe(sourcemaps.init())
        .pipe(minCss())
        .pipe(sourcemaps.write())
        .pipe(gulp.dest(src.btsp.css))
        .pipe(notify("Changes in BTSP *.less fixed"));
        //.pipe(browserSync.reload({stream:true}));
});

// Less to Sass Custom
gulp.task('less:custom',function(){
    return gulp.src( src.web.less + "custom.less")
        .pipe(sourcemaps.init())
        .pipe(less())
        .pipe(sourcemaps.write())
        .pipe(gulp.dest(src.web.styles))
        .pipe(notify("Changes in Custom files *.less fixed"));
        //.pipe(browserSync.reload({stream:true}));
});

gulp.task("custom:js", function(){
    return gulp.src(src.web.js + '*.js')
        .pipe(gulp.dest(src.web.js))
        .pipe(notify("Changes in Custom *.js files fixed"));
});

// Watch task
gulp.task("watch", [
        //'browser-sync',
        "btsp:less",
        "less:custom",
        "fawesome:less",
        "custom:js"
    ],
    function(){

    // If changed all BTSP *.less files.
    gulp.watch(src.btsp.less + "**/*.less",["btsp:less"]);

    // If changed all Custom *.less files.
    gulp.watch(src.web.less + "**/*.less",["less:custom"]);

    // If changed all Font-Awesome *.less files.
    gulp.watch(src.bowerLibs.fontAwesome.less + "*.less",["fawesome:less"]);

    // If changed all Custom *.js files.
    //gulp.watch(src.web.js + "*.js").on('change', function(e){
    //
    //   return gulp.src(src.web.js + "*.js")
    //        .pipe(notify("Custom Scripts Changed Fix !! Yuiee !!"));
    //        .pipe(browserSync.reload({stream:true}));
    //});

    // For DEVELOPMENT.
    //gulp.watch("web/*.html").on('change', browserSync.reload);
    gulp.watch(src.web.js + "*.js",["custom:js"]);
});

// Default task. Relationship to ["watch"] task.
gulp.task("default",["watch"]);

// Build Font-Awesome Fonts. Relationship to [build:all:fonts] task
gulp.task("build:fontAwesome:fonts",function(){
    return gulp.src(src.bowerLibs.fontAwesome.fonts + '*')
        .pipe(gulp.dest(src.web.build.fonts))
        .pipe(notify("Build all Font-Awesome Fonts -- completed"));
});

// Build all Bootstrap, Bower Libs and Custom Fonts
gulp.task('build:all:fonts',["build:fontAwesome:fonts"],function(){
    return gulp.src([
        src.btsp.fonts + "*.*",
        //src.web.fonts + "**/*.*"
    ])
        .pipe(gulp.dest(src.web.build.fonts))
        .pipe(notify("Build all fonts -- completed"));
});

// Delete [web/build] directory.
// Triggered before each run ['build:all:styles'] task.
// Relationship to ['build:all:styles']
gulp.task('del:build', function () {
    return del(src.web.build.base);
});

gulp.task('img:build',function(){
    return gulp.src(src.web.img)
        .pipe(imagemin())
        .pipe(gulp.dest(src.web.build.img))
        .pipe(notify('Images compressed.'));
});


// Build all Bootstrap, Bower Libs and Custom Styles
gulp.task('build:all:styles',['del:build'],function(){

//!!!!!!!!!!!!! Works Sourcemaps !! Yuppie !!!
    return gulp.src([
        src.bowerLibs.fontAwesome.less + 'font-awesome.less',
        src.btsp.less + "bootstrap.less",
        src.web.less + "custom.less"
    ])
        .pipe(sourcemaps.init())
        .pipe(less())
        .pipe(minCss())
        .pipe(concat('build.min.css'))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest(src.web.build.styles))
        .pipe(notify("Build all styles -- completed"));
});

// Build all Bootstrap, Bower Libs and Custom JS files
gulp.task('build:all:js',function(){
    return gulp.src([
        src.bowerLibs.jquery,
        src.btsp.js,
        src.web.js + '*.js'
    ])
        .pipe(sourcemaps.init())
        .pipe(uglify())
        .pipe(concat("build.min.js"))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest(src.web.build.js))
        .pipe(notify("Build all js -- completed"));

});

// Final Build task.
gulp.task("build",[
    'build:all:styles',
    'build:all:js',
    'build:all:fonts',
    'img:build'
]);

