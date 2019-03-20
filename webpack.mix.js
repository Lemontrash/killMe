const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/profile.sass', 'public/css')
   .sass('resources/sass/main-page.sass', 'public/css')
   .sass('resources/sass/upload-files.sass', 'public/css')
   .sass('resources/sass/formpage.sass', 'public/css')
   .sass('resources/sass/deposit.sass', 'public/css')
   .sass('resources/sass/accept-user.sass', 'public/css')
   .sass('resources/sass/common.sass', 'public/css');

mix
  .js('resources/assets/js/admin/admin.js', 'public/js')
  .sass('resources/assets/scss/admin/admin.scss', 'public/css')

mix.webpackConfig({
	resolve: {
		alias: {
			'@': path.resolve('resources/assets/scss/admin'),
		}
	},
});
