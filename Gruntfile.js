
module.exports = function(grunt) {
 
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),


        dirs: {
            js: 'wp-content/themes/Kollektiv/assets/js',
            scss: 'wp-content/themes/Kollektiv/assets/scss',
            css: 'wp-content/themes/Kollektiv/css',
            root: 'wp-content/themes/Kollektiv/'
        },


        // Watches files for changes and runs tasks based on the changed files
        watch: {
            sass: {
                files: ['<%= dirs.scss %>/{,*/}*.{scss,sass}', '<%= dirs.root %>/THEME_INFO.txt'],
                tasks: ['sass:dev', 'autoprefixer', 'cssmin', 'concat']
            },
            scripts: {
                files: [
                    '<%= dirs.js %>/{,*/}*.js',
                    '!<%= dirs.js %>/app.min.js'
                ],
                tasks: ['uglify:dist']
            },
            copy: {
                files: ['readme.txt'],
                tasks: ['copy:dist']
            }
        },


        jshint: {
            files: [
                '<%= dirs.js %>/app.js',
                'assets/dynamic/paths/**/*.js'
            ],
            options: {
                expr: true,
                globals: {
                    jQuery: true,
                    console: true,
                    module: true,
                    document: true
                }
            }
        },


        sass: {
            dev: {
                options: {
                    banner: '/*! <%= pkg.name %> <%= pkg.version %> styles.css <%= grunt.template.today("yyyy-mm-dd h:MM:ss TT") %> */\n',
                    style: 'minified'
                },
                files: {
                    '<%= dirs.css %>/app.css': '<%= dirs.scss %>/app.scss'
                }
            }
        },


        // Add vendor prefixed styles
        autoprefixer: {
            options: {
                browsers: ['> 1%','last 10 versions','ie 9']
            },
            dist: {
                files: [{
                    expand: false,
                    src: '<%= dirs.css %>/app.css',
                    dest: '<%= dirs.css %>/app-prefix.css'
                }]
            }
        },

        // Minify css and save to main directory for wordpress
        cssmin: {
            target: {
                files: [{
                    '<%= dirs.css %>/app-prefix.min.css': [ '<%= dirs.css %>/app-prefix.css' ]
                }]
            }
        },


        concat: {
            // Adds the wordpress theme information
            WordpressStyleInformation: {
                src: ['<%= dirs.root %>/THEME_INFO.txt', '<%= dirs.css %>/app-prefix.min.css'],
                dest: '<%= dirs.root %>/style.css'
            }
        },



        uglify: {
            dist: {
                options: {
                    banner: '/*! <%= pkg.name %> <%= pkg.version %> app.min.js <%= grunt.template.today("yyyy-mm-dd h:MM:ss TT") %> */\n',
                    report: 'gzip'
                },
                files: {
                    '<%= dirs.js %>/app.min.js': [
                        '<%= dirs.js %>/vendor/jquery.waypoints.min.js',
                        '<%= dirs.js %>/vendor/jquery.scrollTo.min.js',
                        '<%= dirs.js %>/vendor/snap.svg-min.js',
                        '<%= dirs.js %>/app.js' // add other app js files here
                    ]
                }
            }
        },

        // Minimize svgs
        //svgmin: {
        //    dist: {
        //        files: [{
        //            expand: true,
        //            cwd: '<%= config.app %>/images',
        //            src: '{,*/}*.svg',
        //            dest: '<%= config.dist %>/images'
        //        }]
        //    }
        //},

        // The actual grunt server settings
        //connect: {
        //    options: {
        //        port: 9000,
        //        open: true,
        //        livereload: 35729,
        //        // Change this to '0.0.0.0' to access the server from outside
        //        hostname: 'localhost'
        //    },
        //    livereload: {
        //        options: {
        //            middleware: function(connect) {
        //                return [
        //                    connect.static(''),
        //                    connect().use('/bower_components', connect.static('./bower_components')),
        //                    connect.static(config.app)
        //                ];
        //            }
        //        }
        //    }
        //}

        // Empties dist folder to start fresh
        clean: {
            dist: {
                src: ['.dist']
            },
            // Deletes minified js file
            scripts: {
                src: ['<%= dirs.js %>/app.min.js']
            }
        },

        copy: {
            dist: {
                files: [{
                    expand: true,
                    dest: '.dist/',
                    src: [
                        // 'assets/fonts/**',
                        // 'assets/images/**',
                        // 'assets/js/app.min.js', //TODO: minify app.js
                        // 'assets/js/modernizr.min.js', //TODO: minify modernizr
                        // 'content-templates/**',
                        // 'partials/**',
                        // '*.php',
                        // 'THEME_INFO.txt',
                        // 'screenshot.png',
                        // 'style.css',
                        // 'README.md'
                    ]
                }]
            }
        }
    });
 
    require('load-grunt-tasks')(grunt);

    /**
     * @task grunt build
     * Creates a .dist directory and puts everything we need for production in it
     */
    grunt.registerTask('build', [
        'clean:dist',
        'uglify:dist',
        'sass:dev',
        'autoprefixer',
        'cssmin',
        'concat',
        'copy:dist'
    ]);

    /**
     * @task grunt serve
     * Watches sass and then runs css compile, autoprefixer, minify and adds wordpress info at the top.
     */
    grunt.registerTask('serve', [
        'watch'
    ]);
};