/**
 * This theme comes with some pre-installed JavaScript
 * libraries, to help you developing feature-rich and
 * badass themes.
 * 
 * These libraries are:
 * 
 * - jQuery;
 * - Bootstrap;
 * - FontAwesome;
 * - AOS Animate On Scroll;
 * - Slick Carousel;
 * - Vanilla Lazyload;
 * - Rellax; and
 * - BarbaJS.
 * 
 * To enable them globally, you need to uncomment the
 * lines above, according to your needs. Instead doing
 * this, we recommend you to import only needed features
 * from them, in specific JS files. Check out the
 * CoreFeatures.js file for an example.
 */

// import "jquery/dist/jquery"; // jQuery - https://jquery.com/
// import "bootstrap/dist/js/bootstrap.bundle"; // Bootstrap - https://getbootstrap.com/
// import "@fortawesome/fontawesome-free/js/all"; // Font Awesome - https://fontawesome.com/
// import "rellax/rellax"; // Rellax - https://dixonandmoe.com/rellax/
// import "slick-carousel/slick/slick"; // Slick Carousel - https://kenwheeler.github.io/slick/
// import "@barba/core/dist/barba"; // BarbaJS - https://barba.js.org/

import { CoreFeatures } from "./CoreFeatures";

class Theme {
  constructor()
  {
    new CoreFeatures();
  }
}

new Theme();