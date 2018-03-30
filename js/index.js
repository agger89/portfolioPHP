$(document).ready(function(){

    //When Scroll header event
    var didScroll;
    var lastScrollTop = 0;
    var delta = 0;
    var navbarHeight = $('.header-content-wrap').outerHeight();

    $(window).scroll(function(event){
        didScroll = true;
    });

    setInterval(function() {
        if (didScroll) {
            hasScrolled();
            didScroll = false;
        }
    }, 250);

    function hasScrolled() {
        var st = $(this).scrollTop();

        if(Math.abs(lastScrollTop - st) <= delta)
            return;

        if (st > lastScrollTop && st > navbarHeight){
            // Scroll Down
            $('.header-content-wrap').removeClass('nav-down').addClass('nav-up');
        } else {
            // Scroll Up
            if(st < lastScrollTop && st < navbarHeight) {
                $('.header-content-wrap').removeClass('nav-up').addClass('nav-down');
            }
        }

        lastScrollTop = st;
    }
    // login progress bar
    function move() {
        var elem = document.getElementById("login-bar");
        var width = 1;
        var id = setInterval(frame, 3);
        function frame() {
            if (width >= 100) {
                clearInterval(id);
            } else {
                width++;
                elem.style.width = width + '%';
            }
        }
    }

    function addProgress() {
        var progress = $('<div>').attr('id','login-progress');
        $('<div>').attr('id','login-bar').appendTo(progress);
        progress.prependTo(document.body);
    }

    // Double Submit Stop
    $('form').submit(function(){
        $(this).find(':submit').attr('disabled','disabled');
        addProgress();
        move();
    });

    $(window).on("beforeunload" ,function() {
        addProgress();
        move();
    });

});
