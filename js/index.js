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
    });

    function hasScrolled() {
        var st = $(this).scrollTop();

        if(Math.abs(lastScrollTop - st) <= delta)
            return;

        if (st > lastScrollTop && st > navbarHeight){
            // Scroll Down
            $('.header-content-wrap').addClass('nav-up');
            $('.modal.status').addClass("modal-down");
        } else {
            // Scroll Up
            if(st < lastScrollTop && st < navbarHeight) {
                $('.header-content-wrap').removeClass('nav-up');
                $('.modal.status').removeClass("modal-down");

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

    // 페이지를 끝낼때(페이지 이동전) 이벤트
    $(window).on("beforeunload" ,function() {
        addProgress();
        move();
    });

    // Header Modal
    // 클래스 추가
    $('body').addClass("modal-custom");

    // Modal click event
    $("#header-btn-status").on("click", function(){
        $("#status-modal").addClass("in").modal();
        modalStatus();
    });

    // Header Modal Ajax
    function modalStatus() {
        $.ajax({
            url: '/modal_status.php',
            beforeSend: function() {
                $("html").css("cursor", "wait");
                $(".modal-dialog .loader.md").show();
            },
            success: function(data) {
                $("#status-modal .modal-dialog").append(data);
            },
            complete: function() {
                $("html").css("cursor", "auto");
                $(".modal-dialog .loader.md").hide();
            }
        })
    }

    // ajax data remove
    $("body").on("click", function(){
        $("#status-modal .modal-content").remove();
    });

});
