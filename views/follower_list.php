<div class="follow-list-background">
    <div class="follow-list-wrap">
        <h2 class="follow-list-title">팔로잉</h2>
        <div class="follow-list-content">
            <?php foreach ($list as $lists) : ?>
            <div class="follow-member relative">
                <a href="/profile.php?nickname=<?= htmlspecialchars($lists['follow_nickname']);?>" class="block">
                    <div class="pic"><?= $lists['profile_pic'] ?></div>
                    <div class="right-group">
                        <div class="nickname"><?= $lists['follow_nickname'] ?></div>
                        <div class="name"><?= $lists['follow_name'] ?></div>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>