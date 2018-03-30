$(document).ready(function() {

    // 게시물 종류 title on
    $("#sorts > a").on("click", function() {
        $(this).parent().find(".on").removeClass("on");
        $(this).addClass("on");
    });

    // 팔로우 리스트 모달
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });

    // 프로필 사진 자동 제출
    $("#input_img").on("change", function() {
        $("#frm").submit();
    });

    // 포토 스와이프
    $(".article-list a").on("click", function(k) {
        var data = $(this).parent().find(".pic").data('pic');


        var openPhotoSwipe = function() {
            var pswpElement = document.querySelectorAll('.pswp')[0];

            var options = {
                history: false,
                focus: false,

                showAnimationDuration: 0,
                hideAnimationDuration: 0
            };

            var items = [{}];
            items[0].src = data;
            items[0].w = 0;
            items[0].h = 0;


            var gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);
            gallery.listen('gettingData', function(index, item) {
                if (item.w < 1 || item.h < 1) { // unknown size
                    var img = new Image();
                    img.onload = function() { // will get size after load
                        item.w = this.width; // set image width
                        item.h = this.height; // set image height
                        gallery.invalidateCurrItems(); // reinit Items
                        gallery.updateSize(true); // reinit Items
                    };
                    img.src = item.src; // let's download image
                }
            });

            gallery.init();
        };
        openPhotoSwipe();
    });

    // bxslider
    var windowWidth = $(window).width();
    var myslider;
    if (windowWidth<736) {
        myslider = $('.bxslider').bxSlider({
            mode: 'horizontal',// 가로 방향 수평 슬라이드
            speed: 1000,        // 이동 속도를 설정
            pager: false,      // 현재 위치 페이징 표시 여부 설정
            moveSlides: 4,     // 슬라이드 이동시 개수
            slideWidth: 150,   // 슬라이드 너비
            minSlides: 2,      // 최소 노출 개수
            maxSlides: 2,      // 최대 노출 개수
            slideMargin: 10,    // 슬라이드간의 간격
            auto: false,        // 자동 실행 여부
            controls: true,    // 이전 다음 버튼 노출 여부
            responsive: true,
            hideControlOnEnd: true
        });
    } else if(windowWidth>736) {
        myslider = $('.bxslider').bxSlider({
            mode: 'horizontal',// 가로 방향 수평 슬라이드
            speed: 1500,        // 이동 속도를 설정
            pager: false,      // 현재 위치 페이징 표시 여부 설정
            moveSlides: 4,     // 슬라이드 이동시 개수
            slideWidth: 350,   // 슬라이드 너비
            minSlides: 5,      // 최소 노출 개수
            maxSlides: 5,      // 최대 노출 개수
            slideMargin: 20,    // 슬라이드간의 간격
            auto: false,        // 자동 실행 여부
            controls: true,    // 이전 다음 버튼 노출 여부
            responsive: true,
            hideControlOnEnd: true
        });
    }

    // 회원 추천 리스트
    $(".recommend-person").click(function() {
        $(".recommend-person-listwrap").toggleClass("on");
        myslider.reloadSlider();
    });

    // 현재 페이지에 클래스 추가
    $("[href]").each(function() {
        if (this.href == window.location.href) {
            $(this).addClass("active");
        }
    });

    // Shuffle
    var $grid = $('.grid').isotope({
        itemSelector: '.element-item',
        layoutMode: 'fitRows',
        getSortData: {
            numberLike: '.numberLike',
            numberComment: '.numberComment'
        }
    });

    $('#sorts').on( 'click', '.button', function() {
        var sortByValue = $(this).attr('data-sort-by');
        $grid.isotope({ sortBy: sortByValue, sortAscending: false });
    });

    $('.button-group').each( function( i, buttonGroup ) {
        var $buttonGroup = $( buttonGroup );
        $buttonGroup.on( 'click', '.button', function() {
            $buttonGroup.find('.is-checked').removeClass('is-checked');
            $( this ).addClass('is-checked');
        });
    });


});


