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
        <div class="recommend-person-listwrap md-half-block">
            <h3 class="sub-common-title">사람 찾기 <span>(나와 팔로우가 아닌 유저 중 팔로우가 많은 유저 3명)</span></h3>
            <a href="all_user_list.php?id=<?= htmlspecialchars($_SESSION['id']);?>" class="all-show-person">모두 보기</a>
            <ul class="row">
                <?php foreach ($followTops as $followTop) : ?>
                    <li class="person-info-wrap col-4">
                        <span class="block">
                            <a href="/profile.php?id=<?= htmlspecialchars($followTop['users_id']);?>&page=1" class="inline-block">
                                <span class="profile-pic" style="background-image:url(<?= htmlspecialchars($followTop['profile_pic']); ?>)"></span>
                            </a>
                            <span class="nickname"><?= $followTop['nickname'] ?></span>
                            <span class="name"><?= $followTop['name'] ?></span>
                            <form action="../follow_process.php" method="post" class="follow-form inline-block">
                                <input type="hidden" name="follow_id" value="<?= $followTop['users_id'] ?>">
                                <input type="hidden" name="users_id" value="<?= $_SESSION['id'] ?>">
                                <input type="submit" name="follow" value="팔로우" class="btn-custom">
                            </form>
                        </span>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="articles-container">
            <div class="tab-content-wrap">
                <h3 class="sub-common-title">둘러보기 <span>(나와 팔로우가 아닌 유저들의 게시물)</span></h3>
                <ul class="article-list-wrap row" style="margin-top: -1%; margin-bottom: 60px;">
                    <?php foreach ($notFollowerArti as $article) : ?>
                        <li class="article-list col-4">
                            <span class="pic-wrap relative block">
                                <a href="javascript:void(0)" class="block" style="border: 1px solid #dbdbdb;">
                                    <?php if($article['pics']['url']) { ?>
                                        <span class="pic relative"
                                              style="background-image:url(<?= htmlspecialchars($article['pics']['url']);?>)"
                                              data-pic="<?= $article['pics']['url']?>"
                                              data-w="auto">
                                        </span>
                                    <?php } else { ?>
                                        <span class="pic relative"><span class="no-img">NO IMAGE</span></span>
                                    <?php } ?>
                                </a>
                                <a href="javascript:void(0)" class="pic-status hide">
                                    <span class="pic-status-text-wrap">
                                        <span><i class="fas fa-heart"></i> <?= htmlspecialchars($article['likesCnt']['count(*)']); ?></span>
                                        <span><i class="fas fa-comment"></i> <?= htmlspecialchars($article['comments']['count(*)']); ?></span>
                                    </span>
                                </a>
                            </span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
    <!-- 포토스와이프 버튼 -->
    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="pswp__bg" style="opacity: .75 !important;"></div>
        <div class="pswp__scroll-wrap">
            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>
            <div class="pswp__ui pswp__ui--hidden">
                <div class="pswp__top-bar">
                    <div class="pswp__counter"></div>
                    <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                    <button class="pswp__button pswp__button--share" title="Share"></button>
                    <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                    <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                    <div class="pswp__preloader">
                        <div class="pswp__preloader__icn">
                            <div class="pswp__preloader__cut">
                                <div class="pswp__preloader__donut"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip"></div>
                </div>
                <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
                </button>
                <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
                </button>
                <div class="pswp__caption">
                    <div class="pswp__caption__center"></div>
                </div>
            </div>
        </div>
    </div><!-- 스와이프 end -->
</div>
<script src="../js/profile.js"></script>