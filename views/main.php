<div class="header-content-wrap nav-down trs-du-03">
    <div class="header-content relative clear">
        <div class="left-content content">
            <a href="#" class="scale"><img src="../images/photo_page/insta_icon.png" alt=""></a>
            <span class="line scale header-insta-line trs-du-03 trs-prop-opacity"></span>
            <a href="#" class="scale header-insta-logo trs-du-03 trs-prop-opacity"><img src="../images/photo_page/insta_logo.png" alt=""></a>
        </div>
        <div class="right-content content">
            <ul class="icon-wrap">
                <li class="icon"><a href="user_list.php?nickname=<?= htmlspecialchars($_SESSION['nickname']);?>" class="block"><img src="../images/photo_page/header_icon_1.png" alt=""></a></li>
                <li class="icon"><a href="#" class="block"><img src="../images/photo_page/header_icon_2.png" alt=""></a></li>
                <li class="icon"><a href="/profile.php?id=<?= htmlspecialchars($_SESSION['id']);?>&page=1" class="block"><img src="../images/photo_page/header_icon_3.png" alt=""></a></li>
            </ul>
        </div>
        <div class="search-wrap content">
            <div class="static-search">
                <span class="inline-block"><img src="../images/photo_page/input_search_icon.png" alt=""></span>
                <span class="inline-block">search</span>
            </div>
        </div>
    </div>
</div><!-- header-content-wrap end -->
<div class="body-content-wrap">
    <?php foreach ($articles as $article): ?>
        <?php $lastComment = count($article['comments']) -1; ?>
        <div class="object-content-wrap">
            <div class="header-title-wrap">
                <a href="/profile.php?id=<?= htmlspecialchars($article['authors']['id']);?>&page=1">
                    <div class="icon-wrap header-object">
                        <?php if($article['authors']['profile_pic']){ ?>
                        <i class="inline-block" style="background-image: url(<?= htmlspecialchars($article['authors']['profile_pic']);?>)"></i>
                        <?php } else { ?>
                        <i class="inline-block"></i>
                        <?php } ?>
                    </div>
                    <div class="text-wrap header-object">
                        <span class="title block"><?= htmlspecialchars($article['authors']['nickname']);?></span>
                    </div>
                </a>
            </div>
            <div class="body-image-wrap" style="background-image:url(<?= htmlspecialchars($article['pics']['url'])?>)"></div>
            <div class="footer-comment-wrap test">
                <div class="like-wrap clear">
                    <?php if($article['likes']['users_id'] != $_SESSION['id']) { ?>
                    <form method="post" action="../like.php" class="inline-block">
                        <input type="hidden" name="likeUser" value="<?= $_SESSION['id'] ?>">
                        <input type="hidden" name="articleId" value="<?= $article['id'] ?>">
                        <input type="submit" name="like" value="" class="like inline-block pointer">
                    </form>
                    <?php } else { ?>
                    <form method="post" action="../unlike.php" class="inline-block">
                        <input type="hidden" name="unlikeUser" value="<?= $_SESSION['id'] ?>">
                        <input type="hidden" name="articleId" value="<?= $article['id'] ?>">
                        <input type="submit" name="unlike" value="" class="unlike inline-block pointer">
                    </form>
                    <?php } ?>
                    <span class="comment-icon inline-block pointer"></span>
                    <?php if( $article['users_id'] == $_SESSION['id']) : ?>
                        <form method="post" class="delete inline-block" action="../write_delete_process.php">
                            <input type="hidden" name="picsId" value="<?= $article['pics']['id'] ?>">
                            <input type="hidden" name="articleId" value="<?= $article['id'] ?>">
                            <label for="delete-input" class="delete-label"></label>
                            <input type="submit" name="delete" class="delete-input hide" id="delete-input">
                        </form>
                    <?php endif; ?>
                </div>
                <div class="comment-wrap">
                    <!-- htmlspecialchars() = 엔티티문자를(html특수문자) 이스케이프하는(변환하는) 함수 -->
                    <?php if($article['likesCnt']) : ?>
                    <div class="view-count">좋아요 <span class="status-number inline-block"><?= htmlspecialchars(count($article['likesCnt'])) ?></span>개</div>
                    <?php endif; ?>
                    <?php foreach ($article['comments'] as $comment) :?>
                        <?php if($comment['content']) : ?>
                            <p class="comment">
                                <span class="user-name inline-block"><?= htmlspecialchars($comment['nickname']) ;?></span>
                                <span class="user-comment inline-block"><?= htmlspecialchars($comment['content']);?></span>
                            </p>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <span class="record-time block"><?= $article['comments']? htmlspecialchars($article['comments'][$lastComment]['datetime']) : ""; ?></span>
                </div>
                <div class="comment-typing-board clear">
                    <form action="../comment_process.php" method="POST" id="comment-form" class="comment-form">
                        <textarea name="comment" id="comment" class="comment-textarea inline-block" placeholder="댓글 달기..."></textarea>
                        <input type="hidden" name="articleId" value="<?= $article['id'] ?>">
                        <input type="submit" name="submit" value="댓글 달기" class="comment-submit hide">
                    </form>
                    <a href="#" class="modal-menu inline-block"><img src="../images/photo_page/modal_icon.png" alt=""></a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>