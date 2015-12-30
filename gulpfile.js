// Include Gulp
var gulp = require( 'gulp' );

// Include Plugins
var sass = require( 'gulp-sass' );
var autoprefixer = require( 'gulp-autoprefixer' );
var sourcemaps = require( 'gulp-sourcemaps' );
var csscomb = require( 'gulp-csscomb' );

// Styles tasks
gulp.task( 'styles', function() {
	return gulp.src( 'assets/stylesheets/style.scss' )
		.pipe( sourcemaps.init() )
		.pipe( sass( { style: 'expanded' } ).on( 'error', sass.logError ) )
		.pipe( autoprefixer( { browsers: ['last 2 versions', 'ie >= 9'], cascade: false } ) )
		.pipe( sourcemaps.write( './', { includeContent: false, sourceRoot: 'source' } ) )
		.pipe( csscomb() )
		.on( 'error', function ( err ) {
			console.error( 'Error!', err.message );
		} )
		.pipe( gulp.dest( './' ) )
});

// Watch files for changes
gulp.task( 'watch', function() {
	gulp.watch( 'assets/stylesheets/**/*.scss', ['styles'] );
});

// Default Task
gulp.task( 'default', ['styles', 'watch'] );
