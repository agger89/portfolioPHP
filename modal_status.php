<?php include 'main_process.php'; ?>
<div class="modal-content">
    <div class="modal-body">
        <div class="follow-list-wrap">
            <div class="follow-list-content">
                <?php foreach ($follow_status as $status) : ?>
                    <?php if($status['target_user_id'] == $_SESSION['id'] && $status['id'] != $_SESSION['id']) :?>
                        <div class="follow-member relative">
                            <a href="main.php#article_<?= $status['target_id']?>" class="block">
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
