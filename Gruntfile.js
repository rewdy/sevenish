module.exports = function(grunt) {

  grunt.initConfig({
    less: {
      dist: {
        files: {
          'sevenish.css': 'sevenish.less'
        }
      }
    },
    postcss: {
      options: {
        processors: [
          require('autoprefixer')({browsers: '> 5% in US'})
        ]
      },
      dist: {
        src: '*.css'
      }
    },
    watch: {
      files: ['*.less'],
      tasks: [
        'less',
        'postcss'
      ]
    }
  });

  grunt.loadNpmTasks('grunt-contrib-less');
  grunt.loadNpmTasks('grunt-postcss');
  grunt.loadNpmTasks('grunt-contrib-watch');

  grunt.registerTask('default', ['less', 'postcss']);

}
