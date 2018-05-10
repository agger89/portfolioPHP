$(document).ready(function() {

    // 게시글 삭제 클릭 event
    $(".delete-input").click(function(){
        if(confirm("정말 삭제하시겠습니까??") == true){
            document.form.submit();
        }else{
            return false;
        }
    });

    // 말풍선 클릭시 댓글 입력창으로 focus
    $(".comment-icon").on("click", function() {
        $(this).closest(".footer-comment-wrap").find(".comment-textarea").focus();
    });

    // 좋아요 0개 글 텍스트 안보이게
    var num = $(".status-number");
    var array = [];
    for(var i = 0; i < num.length; i++) {
        var numParent = num.parent();
        array[i] = numParent;

        if(array[0][i].dataset['likecnt'] == 0) {
            $(array[0][i]).hide();
        }
    }

    // 좋아요 AJAX
    $(".like-submit").on("click", function() {
        // 공통 변수
        var thisParentData = $(this).parent(".like-data-pass");
        var thisParentNum = $(this).parent().closest(".footer-comment-wrap").find(".status-number");
        var thisParentView = $(this).parent().closest(".footer-comment-wrap").find(".view-count");
        var thisInt = parseInt(thisParentNum.text());

        // data
        var likeUser = thisParentData.find(".like-user").attr('data-likeUser');
        var articleId = thisParentData.find(".article-id").attr('data-articleId');
        var articleAuthorId = thisParentData.find(".article-author-id").attr('data-articleAuthorId');
        var articlePicUrl = thisParentData.find(".article-pic-url").attr('data-articlePicUrl');

        // 좋아요 아이콘 모양 바뀌는
        thisParentData.find(".like-submit").removeClass("block").addClass("hide");
        thisParentData.find(".unlike-submit").removeClass("hide").addClass("block");

        // 좋아요 갯수 +1
        var statusNum = thisParentNum.text();
        var change = parseInt(statusNum)+1;
        thisParentNum.text(change);

        // 좋아요 카운트 텍스트 보이게
        if(thisInt == 0) {
            thisParentView.show();
        }

        $.ajax({
            type: "POST",
            url: "../like.php",
            data: {users_id:likeUser,target_id:articleId,target_user_id:articleAuthorId,target_pic_url:articlePicUrl},
            dataType: 'json'
        });
    });
    $(".unlike-submit").on("click", function() {
        // 공통 변수
        var thisParentData = $(this).parent(".like-data-pass");
        var thisParentNum = $(this).parent().closest(".footer-comment-wrap").find(".status-number");
        var thisParentView = $(this).parent().closest(".footer-comment-wrap").find(".view-count");
        var thisInt = parseInt(thisParentNum.text());

        // data
        var unlikeUser = thisParentData.find(".like-user").attr('data-likeUser');
        var articleId = thisParentData.find(".article-id").attr('data-articleId');

        // 좋아요 아이콘 모양 바뀌는
        thisParentData.find(".unlike-submit").removeClass("block").addClass("hide");
        thisParentData.find(".like-submit").addClass("block");

        // 좋아요 갯수 -1
        var statusNum = thisParentNum.text();
        var change = parseInt(statusNum)-1;
        thisParentNum.text(change);

        // 좋아요 카운트 텍스트 안보이게
        if(thisInt == 1) {
            thisParentView.hide();
        }

        $.ajax({
            type: "POST",
            url: "../unlike.php",
            data: {users_id:unlikeUser,target_id:articleId},
            dataType: 'json'
        });
    });


    // 댓글 AJAX
    $(".comment-submit").on("click", function () {
        // 공통 변수
        var thisParentBoard = $(this).parent(".comment-typing-board");

        var sessionId = thisParentBoard.find(".session-id").attr('data-sessionid');
        var sessionNic = thisParentBoard.find(".session-nic").attr('data-sessionNic');
        var articleId = thisParentBoard.find(".article-id").attr('data-articleId');
        var articleAuthorId = thisParentBoard.find(".article-author-id").attr('data-articleAuthorId');
        var articlePicUrl = thisParentBoard.find(".article-pic-url").attr('data-articlePicUrl');
        var articleContent = thisParentBoard.find(".comment-textarea").val();

        var pTag = $('<p>').attr('class','comment');
        var aLink = $('<a>').attr({
            href: "/profile.php?id="+sessionId+"&page=1",
            class: "inline-block"
        }).prependTo(pTag);
        $('<span>').attr('class','user-name inline-block').text(sessionNic).prependTo(aLink);
        $('<span>').attr({
            class: "user-comment inline-block",
            style: "margin-left: 5px"
        }).text(articleContent).appendTo(pTag);
        var delComm = $('<span>').attr({
            class: "delete-comment pointer"
        }).appendTo(pTag);
        $('<img>').attr({
            src: "../images/icon/comment-delete-btn.png"
        }).prependTo(delComm);

        // loder gif image
        $("html").css("cursor", "wait");
        $(thisParentBoard).find(".loader.sm").show();

        var thisParentWrap = $(this).parent().closest(".footer-comment-wrap").find(".comment-wrap");
        $(this).parent().find(".comment-textarea").val("");

        var delay = 1000;
        $.ajax({
            type: "POST",
            url: "../comment_process.php",
            data: {target_id:articleId,target_user_id:articleAuthorId,target_pic_url:articlePicUrl,target_content:articleContent},
            dataType: 'json',
            success: function(data) {
                setTimeout(function() {
                    pTag.appendTo(thisParentWrap);
                    $("html").css("cursor", "auto");
                    $(thisParentBoard).find(".loader.sm").hide();
                }, delay);
            }
        });

    });

    // delete comment Ajax
    // append 후 refresh 전에 클릭이벤트가 먹지 않을때 밑에처럼 한다
    // 이벤트할 엘리먼트의 최상위 부모를 지정해주고 클릭이벤트 실행
    $(".comment-wrap").on("click", ".delete-comment", function() {
        var content = $(this).parent().find(".user-comment").text();
        var articleId = $(this).parent().closest(".footer-comment-wrap").find(".article-id").attr("data-articleId");
        // 현재 날짜
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth()+1;
        var yyyy = today.getFullYear();
        if(dd<10) {
            dd='0'+dd
        }
        if(mm<10) {
            mm='0'+mm
        }
        var date = yyyy+'-' + mm+'-'+dd;

        console.log(content);
        console.log(articleId);
        console.log(date);

        if(confirm("정말 삭제하시겠습니까??") == true) {
            $(this).parent().remove();
            $.ajax({
                type: "POST",
                url: "../delete_comment_process.php",
                data: {content:content,articleId:articleId,date:date},
                dataType: 'json',
                success: function(data) {
                }
            });
        } else {
            return false;
        }

    });


    // Enter submit comment
    $(".comment-textarea").on("keypress", function(event) {
        if(event.keyCode == 13) {
            if(!event.shiftKey) {
                event.preventDefault();
                if($(this).val() != "") {
                    $(this).parent().find(".comment-submit").click();
                }
            }
        }
    });

});