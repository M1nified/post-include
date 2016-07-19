module.exports = function(grunt){
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-watch');

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        uglify:{
            base:{
                options:{
                    compress: true,
                    sourceMap: true
                },
                files:[
                    {
                        expand:true,
                        cwd: 'src',
                        src: ['includes/*.js'],
                        dest: '.',
                        ext: '.js'
                    }
                ]
            }
        },
        sass:{
            base:{
                options:{
                    style: 'compressed'
                },
                files:[
                    {
                        expand:true,
                        cwd : 'src',
                        src: ['includes/*.scss'],
                        dest: '.',
                        ext: '.css'
                    }
                ]
            }
        }
    })

    grunt.registerTask('default',['sass:base','uglify:base']);
};