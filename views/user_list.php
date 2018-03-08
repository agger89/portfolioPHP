<div class="header-content-wrap nav-down trs-du-03">
    <div class="header-content relative clear">
        <div class="left-content content">
            <a href="/" class="scale"><img src="../images/photo_page/insta_icon.png" alt=""></a>
            <span class="line scale header-insta-line trs-du-03 trs-prop-opacity"></span>
            <a href="/" class="scale header-insta-logo trs-du-03 trs-prop-opacity"><img src="../images/photo_page/insta_logo.png" alt=""></a>
        </div>
        <div class="right-content content">
            <ul class="icon-wrap">
                <li class="icon"><a href="user_list.php?nickname=<?= htmlspecialchars($_SESSION['nickname']);?>" class="block"><img src="../images/photo_page/header_icon_1.png" alt=""></a></li>
                <li class="icon"><a href="#" class="block"><img src="../images/photo_page/header_icon_2.png" alt=""></a></li>
                <li class="icon"><a href="/profile.php?id=<?= htmlspecialchars($_SESSION['id'])?>&page=1" class="block"><img src="../images/photo_page/header_icon_3.png" alt=""></a></li>
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
    <div class="user-find-body-wrap">
        <div class="recommend-person-listwrap md-half-block">
            <h3 class="sub-common-title">사람 찾기</h3>
            <a href="#" class="all-show-person">모두 보기</a>
            <ul class="row">
                <?php foreach ($followTops as $followTop) :?>
                <li class="person-info-wrap col-4">
                    <span class="block">
                        <a href="/profile.php?id=<?= htmlspecialchars($followTop['users_id']);?>&page=1" class="inline-block">
                            <span class="profile-pic" style="background-image:url(<?= htmlspecialchars($followTop['profile_pic']); ?>)"></span>
                        </a>
                        <span class="nickname"><?= $followTop['nickname'] ?></span>
                        <span class="name"><?= $followTop['name'] ?></span>
                        <form action="../follow_process.php" method="post" class="follow-form inline-block">
                            <input type="hidden" name="follow_id" value="">
                            <input type="hidden" name="users_id" value="">
                            <input type="submit" name="follow" value="팔로우" class="btn-custom">
                        </form>
                    </span>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>