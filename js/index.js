$(document).ready(function(){
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
});