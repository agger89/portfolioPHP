<div class="header-content-wrap nav-down trs-du-03">
    <div class="header-content relative clear">
        <div class="left-content content">
            <a href="#" class="scale header-insta-logo">Portfolio</a>
        </div>
        <div class="right-content content">
            <ul class="icon-wrap">
                <li class="icon"><a href="user_list.php?id=<?= htmlspecialchars($_SESSION['id']);?>" class="block"><img src="../images/photo_page/header_icon_1.png" alt=""></a></li>
                <li class="icon"><a href="#" id="header-btn-status" class="block"><img src="../images/photo_page/header_icon_2.png" alt=""></a></li>
                <li class="icon"><a href="/profile.php?id=<?= htmlspecialchars($_SESSION['id']);?>&page=1" class="block"><img src="../images/photo_page/header_icon_3.png" alt=""></a></li>
            </ul>
        </div>
    </div>
</div><!-- header-content-wrap end -->
<div class="body-content-wrap">
    <?php include ('main_articles.php') ?>
    <span class="loader md" style="display: none;"></span>
</div>
<!-- Modal -->
<div class="modal fade status" id="status-modal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="arrow-custom"></div>
        <div class="modal-content">
            <div class="modal-body">
                <div class="follow-list-wrap">
                    <div class="follow-list-content">
                        <?php foreach ($follow_status as $status) : ?>
                            <?php if($status['target_user_id'] == $_SESSION['id'] && $status['id'] != $_SESSION['id']) :?>
                                <div class="follow-member relative">
                                    <a href="#article_<?= $status['target_id']?>" class="block">
                                        <div class="pic-wrap">
                                            <span class="pic" style="background-image: url(<?= $status['profile_pic']?>)"></span>
                                        </div>
                                        <div class="right-group relative">
                                            <span class="target-text">
                                                <?php if($status['action'] == "like") {?>
                                                    <span class="status-nickname"><?= $status['nickname'] ?></span>님이 회원님의 사진을 좋아합니다. <span class="status-date"><?= $status['date'] ?></span>
                                                <?php } elseif($status['action'] == "comment") { ?>
                                                    <span class="status-nickname"><?= $status['nickname'] ?></span>님이 댓글을 남겼습니다 : <?= $status['target_content'] ?> <span class="status-date"><?= $status['date'] ?></span>
                                                <?php } ?>
                                            </span>
                                            <span class="target-pic f_r" style="background-image: url(<?= $status['target_pic_url'] ?>)"></span>
                                        </div>
                                    </a>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- Modal end -->
<script src="../js/main.js"></script>
