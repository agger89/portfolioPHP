<?php foreach ($articlesOffset as $article): ?>
    <?php $lastComment = count($article['comments']) -1; ?>
    <div class="object-content-wrap" id="<?= $article['id']?>">
        <div class="header-title-wrap">
            <a href="/profile.php?id=<?= htmlspecialchars($article['authors']['id']);?>&page=1" name="article_<?=$article['id']?>" class="inline-block">
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
        <div class="footer-comment-wrap">
            <div class="like-wrap clear">
                <form class="like-data-pass inline-block">
                    <input type="hidden" data-likeUser="<?= $_SESSION['id'] ?>" name="likeUser" class="like-user">
                    <input type="hidden" data-articleId="<?= $article['id'] ?>" name="articleId" class="article-id">
                    <input type="hidden" data-articleAuthorId="<?= $article['authors']['id'] ?>" name="articleAuthorId" class="article-author-id">
                    <input type="hidden" data-articlePicUrl="<?= $article['pics']['url'] ?>" name="articlePicUrl" class="article-pic-url">
                    <?php if($article['likes']['users_id'] != $_SESSION['id']) { ?>
                        <span class="like-submit data-pass pointer"></span>
                        <span class="unlike-submit data-pass pointer hide"></span>
                    <?php } else { ?>
                        <span class="like-submit data-pass pointer hide"></span>
                        <span class="unlike-submit data-pass pointer"></span>
                    <?php } ?>
                </form>
                <span class="comment-icon inline-block pointer"></span>
                <?php if( $article['users_id'] == $_SESSION['id']) : ?>
                    <form method="post" class="delete inline-block" action="../write_delete_process.php">
                        <input type="hidden" name="picsId" value="<?= $article['pics']['id'] ?>">
                        <input type="hidden" name="articleId" value="<?= $article['id'] ?>">
                        <label for="delete-input" class="delete-label icon"></label>
                        <input type="submit" name="delete" class="delete-input hide" id="delete-input">
                    </form>
                <?php endif; ?>
            </div>
            <div class="comment-wrap">
                <div class="view-count" data-likeCnt="<?= count($article['likesCnt']) ?>">좋아요 <span class="status-number inline-block"><?= htmlspecialchars(count($article['likesCnt'])) ?></span>개</div>
                <?php foreach ($article['comments'] as $comment) : ?>
                    <?php if($comment['content']) : ?>
                        <p class="comment">
                            <a href="/profile.php?id=<?= htmlspecialchars($comment['id']);?>&page=1" class="inline-block"><span class="user-name inline-block"><?= htmlspecialchars($comment['nickname']) ;?></span></a>
                            <span class="user-comment inline-block"><?= htmlspecialchars($comment['content']);?></span>
                        </p>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
            <span class="record-time block"><?= htmlspecialchars($article['date']); ?></span>
            <div class="comment-typing-board clear relative">
                <span class="loader sm" style="display: none;"></span>
                <textarea name="comment" id="comment" class="comment-textarea inline-block" placeholder="댓글 달기..."></textarea>
                <input type="hidden" data-sessionId="<?= $_SESSION['id'] ?>" name="sessionId" class="session-id">
                <input type="hidden" data-sessionNic="<?= $_SESSION['nickname'] ?>" name="sessionNic" class="session-nic">
                <input type="hidden" data-articleId="<?= $article['id'] ?>" name="articleId" class="article-id">
                <input type="hidden" data-articleAuthorId="<?= $article['authors']['id'] ?>" name="articleAuthorId" class="article-author-id">
                <input type="hidden" data-articlePicUrl="<?= $article['pics']['url'] ?>" name="articlePicUrl" class="article-pic-url">
                <input name="submit" value="댓글 달기" class="comment-submit hide">
            </div>
        </div>
    </div>
<?php endforeach; ?>
<script src="js/articles.js"></script>