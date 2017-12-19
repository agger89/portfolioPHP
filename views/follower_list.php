<div class="follow-list-background">
    <div class="follow-list-wrap">
        <h2 class="follow-list-title">팔로잉</h2>
        <div class="follow-list-content">
            <?php foreach ($list as $lists) : ?>
            <div class="follow-member relative">
                <a href="/profile.php?id=<?= htmlspecialchars($lists['follow_id']);?>" class="block">
                    <div class="pic"><?= $lists['profile_pic'] ?></div>
                    <div class="right-group">
                        <div class="nickname"><?= $lists['nickname'] ?></div>
                        <div class="name"><?= $lists['name'] ?></div>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>