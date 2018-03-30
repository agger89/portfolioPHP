<div class="header-content-wrap nav-down trs-du-03">
    <div class="header-content relative clear">
        <div class="left-content content">
            <a href="/" class="scale header-insta-logo">Portfolio</a>
        </div>
        <div class="right-content content">
            <ul class="icon-wrap">
                <li class="icon"><a href="user_list.php?id=<?= htmlspecialchars($_SESSION['id']);?>" class="block"><img src="../images/photo_page/header_icon_1.png" alt=""></a></li>
                <li class="icon"><a href="#" class="block"><img src="../images/photo_page/header_icon_2.png" alt=""></a></li>
                <li class="icon"><a href="/profile.php?id=<?= htmlspecialchars($_SESSION['id'])?>&page=1" class="block"><img src="../images/photo_page/header_icon_3.png" alt=""></a></li>
            </ul>
        </div>
    </div>
</div><!-- header-content-wrap end -->
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