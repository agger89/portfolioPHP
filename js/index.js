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

    $("#input_img").on("change", handleImgFileSelect);

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