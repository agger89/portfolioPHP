<div class="header-content-wrap">
    <div class="header-content relative clear">
        <div class="left-content content">
            <a href="#" class="scale"><img src="../images/photo_page/insta_icon.png" alt=""></a>
            <span class="line scale"></span>
            <a href="#" class="scale"><img src="../images/photo_page/insta_logo.png" alt=""></a>
        </div>
        <div class="right-content content">
            <ul class="icon-wrap">
                <li class="icon"><a href="#" class="block"><img src="../images/photo_page/header_icon_1.png" alt=""></a></li>
                <li class="icon"><a href="#" class="block"><img src="../images/photo_page/header_icon_2.png" alt=""></a></li>
                <li class="icon"><a href="#" class="block"><img src="../images/photo_page/header_icon_3.png" alt=""></a></li>
            </ul>
            <form method="post" action="../logout_process.php">
                <input type="submit" name="logout" value="로그아웃">
            </form>
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
    <?php foreach ($articles as $article) : ?>
        <div class="object-content-wrap">
            <div class="header-title-wrap">
                <div class="icon-wrap header-object">
                    <i class="inline-block" style="background-image: url(<?= $article['authors']['icon']?>)"></i>
                </div>
                <div class="text-wrap header-object">
                    <span class="title block">instagram</span>
                    <p class="location-title"><?= $article['location'] ?></p>
                </div>
            </div>
            <div class="body-image-wrap" style="background-image:url(<?= $article['pics']['url']?>)"></div>
            <div class="footer-comment-wrap test">
                <div class="like-wrap clear">
                    <span class="like inline-block"></span>
                    <span class="comment inline-block"></span>
                    <span class="option inline-block"></span>
                </div>
                <div class="comment-wrap">
                    <!-- htmlspecialchars() = 엔티티문자로 이스케이프하는 함수 -->
                    <div class="view-count">좋아요 <span class="status-number inline-block"></span>개</div>
                    <?php foreach ($article['comments'] as $comment) :?>
                    <p class="comment">
                        <span class="user-name inline-block"><?= $comment['name'] ?></span>
                        <span class="user-comment inline-block"><?= $comment['content'] ?></span>
                    </p>
                    <?php endforeach; ?>
                    <span class="record-time block"></span>
                </div>
                <div class="comment-typing-board clear">
                    <form action="" class="comment-form">
                        <textarea class="comment-textarea inline-block" placeholder="댓글 달기..."></textarea>
                    </form>
                    <a href="#" class="modal-menu inline-block"><img src="../images/photo_page/modal_icon.png" alt=""></a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>





















