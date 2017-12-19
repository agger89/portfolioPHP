<div class="header-content-wrap">
    <div class="header-content relative clear">
        <div class="left-content content">
            <a href="/" class="scale"><img src="../images/photo_page/insta_icon.png" alt=""></a>
            <span class="line scale"></span>
            <a href="/" class="scale"><img src="../images/photo_page/insta_logo.png" alt=""></a>
        </div>
        <div class="right-content content">
            <ul class="icon-wrap">
                <li class="icon"><a href="write.php" class="block"><img src="../images/photo_page/header_icon_4.png" alt=""></a></li>
                <li class="icon"><a href="#" class="block"><img src="../images/photo_page/header_icon_1.png" alt=""></a></li>
                <li class="icon"><a href="#" class="block"><img src="../images/photo_page/header_icon_2.png" alt=""></a></li>
                <li class="icon"><a href="/profile.php?id=<?= htmlspecialchars($_SESSION['id'])?>" class="block"><img src="../images/photo_page/header_icon_3.png" alt=""></a></li>
            </ul>
        </div>
        <div class="search-wrap content">
            <div class="static-search">
                <span class="inline-block"><img src="../images/photo_page/input_search_icon.png" alt=""></span>
                <span class="inline-block">검색</span>
            </div>
        </div>
    </div>
</div><!-- header-content-wrap end -->
<div class="body-content-wrap">
    <div class="profile-body-wrap">
        <div class="profile-container">
            <div class="profile-header-wrap clear">
                <?php if($authors['profile_pic']){ ?>
                <div class="profile-pic" style="background-image: url(<?= htmlspecialchars($authors['profile_pic'])?>)"></div>
                <?php } else { ?>
                <div class="profile-pic"></div>
                <?php } ?>
                <div class="profile-top-status clear">
                    <span class="nickname inline-block"><?= htmlspecialchars($authors['nickname']) ?></span>
                    <?php if ($authors['nickname'] == $_SESSION['nickname']) : ?>
                    <form method="post" class="logout-form inline-block" action="../logout_process.php">
                        <input type="submit" name="logout" value="로그아웃" class="btn-custom">
                    </form>
                    <?php endif; ?>
                    <span class="profile-edit block md-inline-block">
                        <?php if($authors['nickname'] == $_SESSION['nickname']) { ?>
                        <a href="#" class="block btn-custom">프로필 편집</a>
                        <?php } else { ?>
                            <?php if($loginFollowlist) { ?>
                            <form action="../unfollow_process.php" method="post" class="inline-block">
                                <input type="hidden" name="unfollowId" value="<?= $authors['id'] ?>">
                                <input type="hidden" name="unfollower" value="<?= $_SESSION['id'] ?>">
                                <input type="submit" name="follow" value="팔로잉" class="btn-custom">
                            </form>
                            <?php } else { ?>
                            <form action="../follow_process.php" method="post" class="inline-block">
                                <input type="hidden" name="follow_id" value="<?= $authors['id'] ?>">
                                <input type="hidden" name="users_id" value="<?= $_SESSION['id'] ?>">
                                <input type="submit" name="follow" value="팔로우" class="btn-custom">
                            </form>
                            <?php } ?>
                            <span class="recommend-person btn-custom inline-block">
                                <i class="fa fa-caret-down" aria-hidden="true"></i>
                            </span>
                        <?php } ?>
                    </span>
                </div>
                <div class="profile-bottom-status">
                    <span class="status-contents inline-block">게시물 <span class="status-count"><?=htmlspecialchars(count($articles));?></span></span><!-- count = 배열의 숫자를 센다-->
                    <span class="status-contents inline-block">팔로워 <span class="status-count">?</span></span>
                    <span class="status-contents inline-block">
                        <a href="/follower_list.php?id=<?= htmlspecialchars($authors['id']);?>">팔로우 </a>
                        <span class="status-count"><?= htmlspecialchars(count($list)); ?></span>
                    </span>
                </div>
            </div>
        </div>
        <div class="recommend-person-listwrap">
            <h3>추천 계정</h3>
            <div class="list-wrap">
                <ul class="bxslider clear">
                    <?php foreach($members as $member) : ?>
                        <?php if($_SESSION['nickname']) : ?>
                            <li class="person-info-wrap">
                                <span class="profile-pic"><?= $member['profile_pic'] ?></span>
                                <span class="nickname"><?= $member['nickname'] ?></span>
                                <span class="name"><?= $member['name'] ?></span>
                                <form action="../follow_process.php" method="post" class="follow-form inline-block">
                                    <input type="hidden" name="users_id" value="<?= $_SESSION['id'] ?>">
                                    <input type="hidden" name="follow_nickname" value="<?= $authors['nickname'] ?>">
                                    <input type="hidden" name="follow_name" value="<?= $authors['name'] ?>">
                                    <input type="submit" name="follow" value="팔로우" class="btn-custom">
                                </form>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <div class="articles-container">
            <?php if($_SESSION['nickname'] == $authors['nickname']) { ?>
            <div class="tab-wrap">
                <div class="tab-title-wrap">
                    <div class="tab-group clear">
                        <div class="tab-title on">
                            <a href="#" class="block md-half-hide">
                                <i class="fa fa-th-large" aria-hidden="true"></i>
                            </a>
                            <a href="#" class="hide md-half-block">게시물</a>
                        </div>
                        <div class="tab-title">
                            <a href="#" class="block md-half-hide">
                                <i class="fa fa-bookmark-o" aria-hidden="true"></i>
                            </a>
                            <a href="#" class="hide md-half-inline-block">저장됨</a>
                        </div>
                    </div>
                </div>
                <div class="tab-content-wrap">
                    <div class="tab-content-articles tab-cont on">
                        <ul class="article-list-wrap row">
                            <?php foreach ($articles as $article): ?>
                            <li class="article-list col-4">
                                <a href="#" class="block">
                                    <span style="background-image:url(<?= htmlspecialchars($article['url']);?>)"></span>
                                </a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="tab-content-save tab-cont">
                        <div class="info-text-wrap">
                            <h3>저장</h3>
                            <p>다시 보고 싶은 사진과 동영상을 저장하세요.
                                콘텐츠를<br> 저장해도 다른 사람에게 알림이 전송되지 않으며,
                                저장된<br> 콘텐츠는 회원님만 볼 수 있습니다.</p>
                        </div>
                    </div>
                </div>
            </div>
            <?php } else { ?>
            <div class="tab-content-wrap">
                <div class="tab-content-articles tab-cont on">
                    <ul class="article-list-wrap row">
                        <?php foreach ($articles as $article): ?>
                            <li class="article-list col-4">
                                <a href="#" class="block">
                                    <span style="background-image:url(<?= htmlspecialchars($article['url']);?>)"></span>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>