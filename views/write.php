<div class="header-content-wrap">
    <div class="header-content relative clear">
        <div class="left-content content">
            <a href="/" class="scale"><img src="../images/photo_page/insta_icon.png" alt=""></a>
            <span class="line scale"></span>
            <a href="/" class="scale"><img src="../images/photo_page/insta_logo.png" alt=""></a>
        </div>
        <div class="right-content content">
            <ul class="icon-wrap">
                <li class="icon"><a href="#" class="block"><img src="../images/photo_page/header_icon_4.png" alt=""></a></li>
                <li class="icon"><a href="#" class="block"><img src="../images/photo_page/header_icon_1.png" alt=""></a></li>
                <li class="icon"><a href="#" class="block"><img src="../images/photo_page/header_icon_2.png" alt=""></a></li>
                <li class="icon"><a href="profile.php?nickname=<?= htmlspecialchars($_SESSION['nickname']);?>" class="block"><img src="../images/photo_page/header_icon_3.png" alt="프로필"></a></li>
            </ul>
        </div>
        <div class="search-wrap content">
            <div class="static-search">
                <span class="inline-block"><img src="../images/photo_page/input_search_icon.png" alt=""></span>
                <span class="inline-block">검색</span>
            </div>
        </div>
    </div>
</div><!-- header-content-wrap end -->
<div class="body-content-wrap">
    <div class="profile-body-wrap">
        <div class="upload-wrap relative">
            <h3 class="upload-title">이미지 올리기</h3>
            <div class="image-preview">
                <img src="" id="img">
            </div>
            <form action="/write_process.php" enctype="multipart/form-data" method="post" class="center-align">
                <textarea name="comment" class="comment-textarea block" placeholder="댓글 달기..."></textarea>
                <label for="input_img" class="input-custom">이미지 선택</label>
                <span class="file-wrap input-block">
                    <input type="file" name="fileToUpload" id="input_img">
                </span>
                <input type="submit" value="글 등록" name="submit" class="submit-btn input-custom pointer">
            </form>
        </div>
        <?php if($errorMessage): ?>
            <div class="error-message center-align"><?= htmlspecialchars($errorMessage);?></div>
        <?php endif; ?>
    </div>
</div>















