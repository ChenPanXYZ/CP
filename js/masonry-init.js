(function( $ ) {
    "use strict";
    $(function() {
            // set the container that Masonry will be inside of in a var
            // adjust to match your own wrapper/container class/id name
            var container = document.querySelector( '.homepage-content' );
            //create empty var msnry
            var msnry;
            // initialize Masonry after all images have loaded
            imagesLoaded( container, function() {
                msnry = new Masonry( container, {
                // adjust to match your own block wrapper/container class/id name
                itemSelector: '.article-wrapper',
                // option that allows for your website to center in the page
                isFitWidth: true
                });
            });
    });
}(jQuery));