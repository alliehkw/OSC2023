// Initialize modules
// Importing specific gulp API functions lets us write them below as series() instead of gulp.series()
const { src, dest, watch, series, parallel } = require('gulp');
// Importing all the Gulp-related packages we want to use
const sass = require('gulp-sass')(require('sass'));
const concat = require('gulp-concat');
const terser = require('gulp-terser');
const fsCache = require( 'gulp-fs-cache' );
const postcss = require('gulp-postcss');
const autoprefixer = require('autoprefixer');
const cssnano = require('cssnano');
const replace = require('gulp-replace');
const browsersync = require('browser-sync').create();

// File paths
const localSite = 'starter-theme-2022.local'
const FOUNDATION = 'node_modules/foundation-sites';

const files = {
	scssPath: 'assets/styles/scss/**/*.scss',
	jsPath: 'assets/scripts/js/**/*.js',
    phpPath: '**/*.php',
};

// Sass task: compiles the style.scss file into style.css
function scssTask() {
	return src(files.scssPath, { sourcemaps: true }) // set source and turn on sourcemaps
		.pipe(sass()) // compile SCSS to CSS
		.pipe(postcss([autoprefixer(), cssnano()])) // PostCSS plugins
		.pipe(dest('assets/styles', { sourcemaps: '.' })); // put final CSS in dist folder with sourcemap
}

// JS task: concatenates and uglifies JS files to script.js
function jsTask() {
	return src(
		[
			files.jsPath,
		],
		{ sourcemaps: true }
	)
		.pipe(concat('scripts.js'))
		.pipe(terser())
		.pipe(dest('assets/scripts', { sourcemaps: '.' }));
}

function vendorJSTask() {
	return src(
		[
			'node_modules/what-input/dist/what-input.js',
			'node_modules/swiper/swiper-bundle.min.js',
			FOUNDATION + '/dist/js/plugins/foundation.core.js',
			FOUNDATION + '/dist/js/plugins/foundation.util.*.js',

			// Pick the components you need in your project
			FOUNDATION + '/dist/js/plugins/foundation.abide.js',
			FOUNDATION + '/dist/js/plugins/foundation.accordion.js',
			FOUNDATION + '/dist/js/plugins/foundation.accordionMenu.js',
			FOUNDATION + '/dist/js/plugins/foundation.drilldown.js',
			FOUNDATION + '/dist/js/plugins/foundation.dropdown.js',
			FOUNDATION + '/dist/js/plugins/foundation.dropdownMenu.js',
			FOUNDATION + '/dist/js/plugins/foundation.equalizer.js',
			FOUNDATION + '/dist/js/plugins/foundation.interchange.js',
			FOUNDATION + '/dist/js/plugins/foundation.offcanvas.js',
			FOUNDATION + '/dist/js/plugins/foundation.orbit.js',
			FOUNDATION + '/dist/js/plugins/foundation.responsiveMenu.js',
			FOUNDATION + '/dist/js/plugins/foundation.responsiveToggle.js',
			FOUNDATION + '/dist/js/plugins/foundation.reveal.js',
			FOUNDATION + '/dist/js/plugins/foundation.slider.js',
			FOUNDATION + '/dist/js/plugins/foundation.smoothScroll.js',
			FOUNDATION + '/dist/js/plugins/foundation.magellan.js',
			FOUNDATION + '/dist/js/plugins/foundation.sticky.js',
			FOUNDATION + '/dist/js/plugins/foundation.tabs.js',
			FOUNDATION + '/dist/js/plugins/foundation.responsiveAccordionTabs.js',
			FOUNDATION + '/dist/js/plugins/foundation.toggler.js',
			FOUNDATION + '/dist/js/plugins/foundation.tooltip.js',
		],
		{ sourcemaps: true }
	)
		.pipe(concat('vendor-scripts.js'))
		.pipe(terser())
		.pipe(dest('assets/scripts', { sourcemaps: '.' }));
}

// Cachebust
function cacheBustTask() {
	var cbString = new Date().getTime();
	return src([files.phpPath])
		.pipe(replace(/cb=\d+/g, 'cb=' + cbString))
		.pipe(dest('.'));
}

// Browsersync to spin up a local server
function browserSyncServe(cb) {
	// initializes browsersync server
	var files = [
        '**/*.php',
        '**/*.{png,jpg,gif}'
    ];
	browsersync.init(files, {
        proxy: localSite
    });
	cb();
}
function browserSyncReload(cb) {
	// reloads browsersync server
	browsersync.reload();
	cb();
}

// Watch task: watch SCSS and JS files for changes
// If any change, run scss and js tasks simultaneously
function watchTask() {
	watch(
		[files.scssPath, files.jsPath],
		{ interval: 1000, usePolling: true }, //Makes docker work
		series(parallel(scssTask, jsTask), cacheBustTask)
	);
}

// Browsersync Watch task
// Watch HTML file for change and reload browsersync server
// watch SCSS and JS files for changes, run scss and js tasks simultaneously and update browsersync
function bsWatchTask() {
	watch(files.phpPath, browserSyncReload);
	watch(
		[files.scssPath, files.jsPath],
		{ interval: 1000, usePolling: true }, //Makes docker work
		series(parallel(scssTask, jsTask), cacheBustTask, browserSyncReload)
	);
}

// Export the default Gulp task so it can be run
// Runs the scss and js tasks simultaneously
// then runs cacheBust, then watch task
exports.watch = series(parallel(scssTask, jsTask), cacheBustTask, watchTask);

exports.buildit = series(scssTask, jsTask, vendorJSTask, cacheBustTask);

// Runs all of the above but also spins up a local Browsersync server
// Run by typing in "gulp bs" on the command line
exports.bs = series(
	parallel(scssTask, jsTask),
	cacheBustTask,
	browserSyncServe,
	bsWatchTask
);