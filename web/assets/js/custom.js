jQuery(document).ready(function ($) {

});

function collapseDescription(elementToOpen) {
    console.log('collapse !');
    jQuery('.collapse.in').collapse('hide');
    jQuery(elementToOpen).collapse("toggle");
}