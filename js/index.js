$(document).ready(function(){

    // 프로필 탭
    function TabClick(){
        $('.tab-wrap .tab-title-wrap a').on("click",function(e){
            e.preventDefault();
            var tab_eq = $(this).parent().index();
            tabOn(tab_eq);
        });
        function tabOn(tab_eq){
            $('.tab-wrap .tab-title-wrap .tab-title').removeClass("on").eq(tab_eq).addClass("on");
            $('.tab-wrap .tab-cont').removeClass("on").eq(tab_eq).addClass("on");
        }
    }
    TabClick();

    // 게시글 삭제 클릭 event
    $(".delete-input").click(function(){
        if(confirm("정말 삭제하시겠습니까??") == true){
            document.form.submit();
        }else{
            return false;
        }
    });

    $(".comment-textarea").keypress(function (e) {
        if(e.which == 13 && !e.shiftKey) {
            $(this).closest("form").submit();
            e.preventDefault();
            return false;
        }
    });

    // 이미지 미리보기 함수
    $("#input_img").on("change", handleImgFileSelect);

    //bxslider
    $('.bxslider').bxSlider( {
        mode: 'horizontal',// 가로 방향 수평 슬라이드
        speed: 1500,        // 이동 속도를 설정
        pager: false,      // 현재 위치 페이징 표시 여부 설정
        moveSlides: 4,     // 슬라이드 이동시 개수
        slideWidth: 176,   // 슬라이드 너비
        minSlides: 4,      // 최소 노출 개수
        maxSlides: 4,      // 최대 노출 개수
        slideMargin: 30,    // 슬라이드간의 간격
        auto: false,        // 자동 실행 여부
        autoHover: true,   // 마우스 호버시 정지 여부
        controls: true,    // 이전 다음 버튼 노출 여부
        responsive : true
    });

    // 회원 추천 리스트
    $(".recommend-person").click(function() {
        $(".recommend-person-listwrap").toggleClass("on");
    });


    //header offset top
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

    // 현재 페이지에 클래스 추가
    $("[href]").each(function() {
        if (this.href == window.location.href) {
            $(this).addClass("active");
        }
    });

});

// 이미지 미리보기
function handleImgFileSelect(e) {
    var files = e.target.files;
    var filesArr = Array.prototype.slice.call(files);

    filesArr.forEach(function(f) {
       sel_file = f;

       var reader = new FileReader();
       reader.onload = function(e) {
           $("#img").attr("src", e.target.result);
       };
       reader.readAsDataURL(f);
    });
}

