/*!
 * Grunt file
 */

module.exports = function ( grunt ) {
	/*
	 * PostCSS processors
	 */
	// Without minifier
	var postCssProcessorsDev = [
			require( 'postcss-import' )( {
				from: 'css/wiklovesmonuments.dev.css'
			} ),
			require( 'postcss-custom-properties' )( {
				preserve: false
			} ),
			require( 'autoprefixer' )( {
				browsers: [
					'Android >= 2.3',
					'Chrome >= 10',
					'Edge >= 12',
					'Firefox >= 3.6',
					'IE >= 8',
					'IE_mob 11',
					'iOS >= 5.1',
					'Opera >= 12.5',
					'Safari >= 5.1'
				]
			} )
		],
		// With minifier
		postCssProcessorsMin = postCssProcessorsDev.concat( [ require( 'cssnano' )() ] );

	grunt.loadNpmTasks( 'grunt-contrib-watch' );
	grunt.loadNpmTasks( 'grunt-contrib-less' );
	grunt.loadNpmTasks( 'grunt-eslint' );
	grunt.loadNpmTasks( 'grunt-postcss' );
	grunt.loadNpmTasks( 'grunt-stylelint' );

	grunt.initConfig( {
		// Lint – JavaScript
		eslint: {
			dev: [
				'Gruntfile.js',
				'!js/vendor/**/*.js'
			]
		},

		// Lint – Stylesheets
		stylelint: {
			src: [
				'css/wikilovesmonuments.dev.css',
				'!node_modules/**'
			]
		},

		// Postprocessing Stylesheets
		postcss: {
			// Output unminified compiled CSS file into `build` dir
			dev: {
				options: {
					processors: postCssProcessorsDev
				},
				src: 'css/wikilovesmonuments.dev.css',
				dest: 'css/build/wikilovesmonuments.concat.css'
			},
			// Output minified compiled CSS file +  src maps into `build` dir
			min: {
				options: {
					map: {
						inline: false, // save all sourcemaps as separate files…
						annotation: './' // …to the specified directory
					},
					processors: postCssProcessorsMin
				},
				src: 'css/wikilovesmonuments.dev.css',
				dest: 'style.css'
			}
		},

		// Development
		watch: {
			files: [
				'**/*.dev.css',
				'.{stylelintrc}'
			],
			tasks: 'default'
		}
	} );

	grunt.registerTask( 'lint', [ 'stylelint' ] );
	grunt.registerTask( 'default', [ 'lint', 'postcss:dev', 'postcss:min' ] );
};
