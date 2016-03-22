/* Globals module, grunt */

module.exports = function(grunt) {

    require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);

    grunt.initConfig({
        pkd       : grunt.file.readJSON('package.json'),
        bowerPath : "bower_components",
        libPath   : "js/libraries/",

        //------------------------------------------------
        // Clean/Lint Tasks
        //------------------------------------------------

        jshint : {
            options : {
                jshintrc : true
            },
            all : ["Gruntfile.js", "js/script.js"]
        },

        //------------------------------------------------
        // Copy Tasks
        //------------------------------------------------

        copy : {
            main : {
                files : [
                    {
                        expand : true,
                        cwd : '<%= bowerPath %>/html5shiv/dist/',
                        dest : '<%= libPath %>',
                        src : 'html5shiv.min.js',
                    }
                ],
            },
        },

        //------------------------------------------------
        // Bower Concatination Tasks
        //------------------------------------------------

        bower_concat : {
            all: {
                options: {
                    separator : ';\n',
                },
                dest: 'js/bower.js',
                cssDest : 'css/bower.css',
                dependencies: {
                    'Slidebars' : 'jquery',
                },
                mainFiles: {
                    'jquery' : ['dist/jquery.js'],
                    'Slidebars' : ['dist/slidebars.js'],
                },
                exclude: [ 'font-awesome', 'reading-time' ],
            },
        },

        //------------------------------------------------
        // Sass Processing Tasks
        //------------------------------------------------

        sass : {
            dist : {
                files : {
                    "style.css" : "css/sass/style.scss"
                },
                options : {
                    includePaths : require('node-bourbon').includePaths,
                    includePaths : require('node-neat').includePaths
                }
            }
        },

        //------------------------------------------------
        // Watch Tasks
        //------------------------------------------------

        watch : {
            scripts : {
                files : ["js/script.js"],
                tasks : ["serve"],
                options : {
                    spawn : false,
                    reload : true,
                },
            },
            php : {
                files : ["**/*.php"],
                tasks : ["serve"],
                options : {
                    spawn : false,
                    reload : true,
                },
            },
            sass : {
                files : ["css/scss/**/*.scss"],
                tasks : ["sass"],
            },
            livereload : {
                options : {
                    livereload : true
                },
                files : [ "style.css", "**/*.php", "js/script.js"],
            },
        },

    })// end grunt.initConfig

    grunt.registerTask('serve', ['build', 'watch']);
    grunt.registerTask('server', 'serve');
    grunt.registerTask('test', ['jshint']);
    grunt.registerTask('default', ['serve']);
    grunt.registerTask('build', ['sass']);
    grunt.registerTask('myCopy', ['copy:main']);
    grunt.registerTask('bowerBuild', ['bower_concat']);
}


