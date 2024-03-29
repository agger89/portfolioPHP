<div class="body-content-wrap">
    <div class="user-find-body-wrap">
        <div class="recommend-person-listwrap all">
            <h3 class="sub-common-title">추천 계정 <span>(나와 팔로우가 아닌 유저들)</span></h3>
            <ul class="person-info-container">
                <?php foreach ($not_follower as $users) :?>
                    <li class="person-info-wrap relative">
                        <span class="block clear">
                            <a href="/profile.php?id=<?= htmlspecialchars($users['id']);?>&page=1" class="inline-block f_l">
                                <span class="profile-pic" style="background-image:url(<?= htmlspecialchars($users['profile_pic']); ?>)"></span>
                            </a>
                            <span class="block f_l nickname-wrap">
                                <span class="nickname"><?= $users['nickname'] ?></span>
                                <span class="name"><?= $users['name'] ?></span>
                            </span>
                            <form action="../follow_process.php" method="post" class="follow-form inline-block f_r">
                                <input type="hidden" name="follow_id" value="<?= $users['id'] ?>">
                                <input type="hidden" name="users_id" value="<?= $_SESSION['id'] ?>">
                                <input type="submit" name="follow" value="팔로우" class="btn-custom">
                            </form>
                        </span>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>