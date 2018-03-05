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
            <ul class="row">
                <li class="person-info-wrap col-4">
                    <span class="block">
                        <span class="profile-pic"><a href="#" class="block" style="width:100%;height:100%;"></a></span>
                        <span class="nickname">test</span>
                        <span class="name">test1111111</span>
                        <form action="../follow_process.php" method="post" class="follow-form inline-block">
                            <input type="hidden" name="follow_id" value="">
                            <input type="hidden" name="users_id" value="">
                            <input type="submit" name="follow" value="팔로우" class="btn-custom">
                        </form>
                    </span>
                </li>
                <li class="person-info-wrap">
                    <span class="block">
                        <span class="profile-pic"><a href="#" class="block" style="width:100%;height:100%;"></a></span>
                        <span class="nickname">test</span>
                        <span class="name">test1111111</span>
                        <form action="../follow_process.php" method="post" class="follow-form inline-block">
                            <input type="hidden" name="follow_id" value="">
                            <input type="hidden" name="users_id" value="">
                            <input type="submit" name="follow" value="팔로우" class="btn-custom">
                        </form>
                    </span>
                </li>
                <li class="person-info-wrap">
                    <span class="block">
                        <span class="profile-pic"><a href="#" class="block" style="width:100%;height:100%;"></a></span>
                        <span class="nickname">test</span>
                        <span class="name">test1111111</span>
                        <form action="../follow_process.php" method="post" class="follow-form inline-block">
                            <input type="hidden" name="follow_id" value="">
                            <input type="hidden" name="users_id" value="">
                            <input type="submit" name="follow" value="팔로우" class="btn-custom">
                        </form>
                    </span>
                </li>
            </ul>
        </div>
    </div>
</div>