$(document).ready(function() {
    // Main Page addClass cause modal custom
    $('body').addClass("modal-custom");

    // 팔로우 리스트 모달
    $("#header-btn-status").click(function(){
        $("#status-modal").modal();
    });

    $(window).scroll(function() {
        var scrollHeight = $(document).height();
        var scrollPosition = $(window).height() + $(window).scrollTop();
        if ((scrollHeight - scrollPosition) / scrollHeight === 0) {
            var last_id = $(".object-content-wrap").attr("id");
            loadArticle(last_id);
        } else {

        }
    });

    $('.header-content-wrap').on("click", function() {
        var last_id = $(".object-content-wrap").attr("id");
        console.log(last_id);
        loadArticle(last_id);
    });

    function loadArticle(last_id) {
        $.ajax({
            type: "get",
            url: "../main_articles.php?last_id=" + last_id,
            beforeSend: function() {
                $("html").css("cursor", "wait");
                $(".loader.md").show();
            },
            success: function(data) {
                $(".body-content-wrap").append(data);
                alert(data);
            },
            complete: function() {
                $("html").css("cursor", "auto");
                $(".loader.md").hide();
            }
        })
    }
});














