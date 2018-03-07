$(document).ready(function() {

    $(".article-list a").on("click", function(k) {
        var data = $(this).parent().find(".pic").data('pic');
        console.log(data);

        // photoSwipe
        var openPhotoSwipe = function() {
            var pswpElement = document.querySelectorAll('.pswp')[0];
            // build items array

            // define options (if needed)
            var options = {
                // history & focus options are disabled on CodePen
                history: false,
                focus: false,

                showAnimationDuration: 0,
                hideAnimationDuration: 0
            };

            var items = [{}];
            items[0].src = data;
            items[0].w = 300;
            items[0].h = 300;


            var gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);
            gallery.init();
        };
        openPhotoSwipe();
    });

});


