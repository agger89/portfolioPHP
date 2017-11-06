<?php
    $dbh = new PDO('mysql:host=localhost;dbname=contents', 'root', '111111');
    $stmt = $dbh->prepare('SELECT * FROM member');
    $stmt->execute();
    $list = $stmt->fetchAll();

?>
<div class="header-content-wrap">
    <div class="header-content relative clear">
        <div class="left-content content">
            <a href="#" class="scale"><img src="../insta/image/photo_page/insta_icon.png" alt=""></a>
            <span class="line scale"></span>
            <a href="#" class="scale"><img src="../insta/image/photo_page/insta_logo.png" alt=""></a>
        </div>
        <div class="right-content content">
            <ul class="icon-wrap">
                <li class="icon"><a href="#" class="block"><img src="../insta/image/photo_page/header_icon_1.png" alt=""></a></li>
                <li class="icon"><a href="#" class="block"><img src="../insta/image/photo_page/header_icon_2.png" alt=""></a></li>
                <li class="icon"><a href="#" class="block"><img src="../insta/image/photo_page/header_icon_3.png" alt=""></a></li>
            </ul>
        </div>
        <div class="search-wrap content">
            <div class="static-search">
                <span class="inline-block"><img src="../insta/image/photo_page/input_search_icon.png" alt=""></span>
                <span class="inline-block">검색</span>
            </div>
        </div>
    </div>
</div><!-- header-content-wrap -->
<div class="body-content-wrap">
    <?php foreach ($list as $key => $value) { ?>
    <div class="object-content-wrap">
        <div class="header-title-wrap">
            <div class="icon-wrap header-object">
                <img src="../insta/image/photo_page/insta_color_icon.png" alt="">
            </div>
            <div class="text-wrap header-object">
                <span class="title block">instagram</span>
                <p class="location-title"><?php echo $value['location']?></p>
            </div>
        </div>
        <div class="body-image-wrap" style="background-image:url(<?php echo $value['image'] ?>)"></div>
        <div class="footer-comment-wrap test">
            <div class="like-wrap clear">
                <span class="like inline-block"></span>
                <span class="comment inline-block"></span>
                <span class="option inline-block"></span>
            </div>
            <div class="comment-wrap">
                <div class="view-count">조회 <span class="status-number inline-block"><?php echo $value['view']?></span>회</div>
                <p class="comment">
                    <span class="user-name inline-block"><?php echo $value['id'] ?></span>
                    <span class="user-comment inline-block"><?php echo $value['comment'] ?></span>
                </p>
                <span class="record-time block">10시간 전</span>
            </div>
            <div class="comment-typing-board clear">
                <form action="" class="comment-form">
                    <textarea class="comment-textarea inline-block" placeholder="댓글 달기..."></textarea>
                </form>
                <a href="#" class="modal-menu inline-block"><img src="../insta/image/photo_page/modal_icon.png" alt=""></a>
            </div>
        </div>
    </div>
    <?php } ?>
</div>





















