$(document).ready(function() {

    // 이미지 미리보기 함수
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

    // 이미지 미리보기 이벤트 실행
    $("#input_img").on("change", handleImgFileSelect);

});