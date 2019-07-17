// require('../css/app.css');
// import 'foundation-sites';

import jQuery from 'jquery'

window.jQuery = jQuery
window.$ = jQuery

import 'foundation-sites'

console.log('Hello Webpack Encore');

const logoPath = require('../images/logo.jpeg');

var html = `<img src="${logoPath}">`;