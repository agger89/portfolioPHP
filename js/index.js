$(document).ready(function(){

    // 프로필 사진 자동 제출
    $("#input_img").on("change", function() {
        $("#frm").submit();
    });

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

    // enter submit comment
    $(".comment-textarea").on("keypress", function(event) {
        if(event.keyCode == 13) {
            if(!event.shiftKey) {
                event.preventDefault();
                $(this).parent().find(".comment-submit").click();
            }
        }
    });

    // 이미지 미리보기 함수
    $("#input_img").on("change", handleImgFileSelect);

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
            speed: 1000,        // 이동 속도를 설정
            pager: false,      // 현재 위치 페이징 표시 여부 설정
            moveSlides: 4,     // 슬라이드 이동시 개수
            slideWidth: 350,   // 슬라이드 너비
            minSlides: 5,      // 최소 노출 개수
            maxSlides: 5,      // 최대 노출 개수
            slideMargin: 26,    // 슬라이드간의 간격
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

    // 말풍선 클릭시 댓글 입력창으로 focus
    $(".comment-icon").on("click", function() {
        $(this).closest(".footer-comment-wrap").find(".comment-textarea").focus();
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

// ajax로 파일업로드 자동 제출
// $(function() {
//     $('#input_img').on('change', function() {
//         $("<form action='/profile.php' enctype='multipart/form-data' method='post'/>")
//             .ajaxForm({
//                 dataType: 'json',
//                 beforeSend: function() {
//                     $('#result').append( "beforeSend...\n" );
//                 },
//                 complete: function(data) {
//                     $('#result')
//                         .append( "complete...\n" )
//                         .append( JSON.stringify( data.responseJSON ) + "\n" );
//                 }
//             })
//             .append( $(this) )
//             .submit();
//     });
// });