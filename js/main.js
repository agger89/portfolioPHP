// // 하단까지 스크롤시 데이터 불러오기
// $(window).scroll(function() {
//     if($(window).scrollTop() + $(window).height() >= $(document).height()) {
//         var last_id = $(".object-content-wrap:last").attr("id");
//         if(last_id > 1) {
//             loadMoreData(last_id);
//             console.log(last_id);
//         } else {
//             alert('더이상 게시물이 없습니다.');
//         }
//
//     }
// });
//
// // 데이터 불러올 함수
// function loadMoreData(last_id){
//     $.ajax(
//         {
//             url: '/article_offset.php?last_id=' + last_id,
//             type: "get",
//             beforeSend: function() {
//                 $("html").css("cursor", "wait");
//                 $(".loader.md").show();
//             },
//             success: function(data) {
//                 $(".body-content-wrap").append(data);
//             },
//             complete: function() {
//                 $("html").css("cursor", "auto");
//                 $(".loader.md").hide();
//             }
//         });
// }













