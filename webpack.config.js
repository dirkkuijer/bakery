var Encore = require('@symfony/webpack-encore');
Encore


    // directory where compiled assets will be stored
    .setOutputPath('web/build/')
    .copyFiles({
                  from: 'app/Resources/assets/images/',
        
                  // optional target path, relative to the output dir
                   to: 'web/build/images/[path][name].[ext]',
    })
         
    // public path used by the web server to access the output path
    .setPublicPath('/build')
    // only needed for CDN's or sub-directory deploy
    //.setManifestKeyPrefix('build/')
    /*
    * ENTRY CONFIG
    *
    .
     * Add 1 entry for each "page" of your app
     * (including one that's included on every page - e.g. "app")
     *
     * Each entry will result in one JavaScript file (e.g. app.js)
     * and one CSS file (e.g. app.css) if you JavaScript imports CSS.
     */

    .addEntry('formLoad', ['./app/Resources/assets/js/formLoad.js'])
    .addEntry('app', './app/Resources/assets/js/app.js')
    .addEntry('all', './app/Resources/assets/js/all.js')
    .addEntry('functions', './app/Resources/assets/js/functions.js')
    //.addEntry('page1', './assets/js/page1.js')
    //.addEntry('page2', './assets/js/page2.js')
    .addStyleEntry('app_style', './app/Resources/assets/scss/main.scss')
    .addStyleEntry('allFontawesome_scss', './app/Resources/assets/scss/fontawesome.scss')
    .addStyleEntry('allFontawesome', './app/Resources/assets/css/all.css')
    // will require an extra script tag for runtime.js
    // but, you probably want this, unless you're building a single-page app
    .enableSingleRuntimeChunk()

    .cleanupOutputBeforeBuild()
    .enableSourceMaps(!Encore.isProduction())
    // enables hashed filenames (e.g. app.abc123.css)
    .enableVersioning(Encore.isProduction())
    .enableVersioning()
    // uncomment if you use TypeScript
    //.enableTypeScriptLoader()

    // uncomment if you use Sass/SCSS files
    .enableSassLoader()

    // uncomment if you're having problems with a jQuery plugin
    //.autoProvidejQuery()

   
;

module.exports = Encore.getWebpackConfig();