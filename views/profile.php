<div class="body-content-wrap">
    <div class="profile-body-wrap">
        <div class="profile-container">
            <div class="profile-header-wrap clear">
                <div class="profile-pic" style="background-image: url(<?= htmlspecialchars($authors['profile_pic'])?>)"></div>
                <div class="profile-top-status clear">
                    <span class="nickname inline-block"><?= htmlspecialchars($authors['nickname']) ?></span>
                    <?php if ($authors['nickname'] == $_SESSION['nickname']) : ?>
                    <form method="post" class="logout-form inline-block" action="../logout_process.php">
                        <input type="submit" name="logout" value="로그아웃" class="btn-custom">
                    </form>
                    <?php endif; ?>
                    <span class="profile-edit block md-inline-block">
                        <?php if($authors['nickname'] == $_SESSION['nickname']) { ?>
                            <form action="/profile_fileUp.php" enctype="multipart/form-data" method="post" id="frm">
                                <a href="javascript:void(0)" class="block btn-custom profile-upload">
                                    <label for="input_img" class="input-custom pointer">프로필 편집</label>
                                </a>
                                <span class="file-wrap input-block hide">
                                    <input type="file" name="fileToUpload" id="input_img">
                                </span>
                            </form>
                        <?php } else { ?>
                            <?php if($loginFollowlist) { ?>
                            <form action="../unfollow_process.php" method="post" class="inline-block">
                                <input type="hidden" name="unfollowId" value="<?= $authors['id'] ?>">
                                <input type="hidden" name="unfollower" value="<?= $_SESSION['id'] ?>">
                                <input type="submit" name="follow" value="팔로잉" class="btn-custom following-btn">
                            </form>
                             <span class="recommend-person btn-custom inline-block following-btn">
                                <i class="fa fa-caret-down" aria-hidden="true"></i>
                            </span>
                            <?php } else { ?>
                            <form action="../follow_process.php" method="post" class="inline-block">
                                <input type="hidden" name="follow_id" value="<?= $authors['id'] ?>">
                                <input type="hidden" name="users_id" value="<?= $_SESSION['id'] ?>">
                                <input type="submit" name="follow" value="팔로우" class="btn-custom follow-btn">
                            </form>
                             <span class="recommend-person btn-custom inline-block follow-btn">
                                <i class="fa fa-caret-down" aria-hidden="true"></i>
                            </span>
                            <?php } ?>
                        <?php } ?>
                    </span>
                </div>
                <div class="profile-bottom-status">
                    <span class="status-contents inline-block">게시물 <span class="status-count"><?=htmlspecialchars($countArticle['COUNT(*)']);?></span></span>
                    <span class="status-contents inline-block">
                        <a href="javascript:void(0)" id="myBtn">팔로우 </a>
                        <span class="status-count"><?= htmlspecialchars(count($list)); ?></span>
                    </span>
                    <?php if($errorMessage): ?>
                        <span class="error-message"><?= htmlspecialchars($errorMessage);?></span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <!-- follow list popup -->
        <button type="button" class="popup-close hide">&times;</button>
        <div class="popup-back hide"></div>
        <div class="popup-follow-list hide">
            <!-- Modal popup -->
            <div class="list-content">
                <div class="list-header">
                    <h2 class="follow-list-title">팔로잉</h2>
                </div>
                <div class="list-body">
                    <div class="follow-list-wrap">
                        <div class="follow-list-content">
                            <?php foreach ($list as $lists) : ?>
                                <div class="follow-member relative">
                                    <a href="/profile.php?id=<?= htmlspecialchars($lists['follow_id']);?>&page=1" class="block">
                                        <div class="pic" style="background-image: url(<?= htmlspecialchars($lists['profile_pic'])?>)"></div>
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
            </div>
        </div>
        <!-- follow list popup end -->
        <div class="recommend-person-listwrap">
            <h3>추천 계정</h3>
            <div class="list-wrap">
                <ul class="bxslider clear">
                    <?php foreach($not_follower as $users) : ?>
                        <?php if($_SESSION['id'] != $users['id'] ) : ?>
                        <li class="person-info-wrap">
                            <span class="profile-pic" style="background-image: url(<?= htmlspecialchars($users['profile_pic'])?>)"><a href="/profile.php?id=<?= $users['id']?>&page=1" class="block" style="width:100%;height:100%;"></a></span>
                            <span class="nickname"><?= $users['nickname'] ?></span>
                            <span class="name"><?= $users['name'] ?></span>
                            <form action="../follow_process.php" method="post" class="follow-form inline-block">
                                <input type="hidden" name="follow_id" value="<?= $users['id'] ?>">
                                <input type="hidden" name="users_id" value="<?= $_SESSION['id'] ?>">
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
                    <div class="tab-title on">
                        <div id="sorts" class="button-group">
                            <a href="javascript:void(0);" class="button is-checked on">최신순</a>
                            <a href="javascript:void(0);" class="button" data-sort-by="numberLike">좋아요순</a>
                            <a href="javascript:void(0);" class="button" data-sort-by="numberComment">댓글순</a>
                        </div>
                    </div>
                </div>
                <div class="tab-content-wrap">
                    <div class="tab-content-articles tab-cont on">
                        <ul class="article-list-wrap row grid">
                            <?php if(!empty($articles)) { ?>
                                <?php foreach ($articles as $article) : ?>
                                <li class="article-list col-4 element-item">
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
                                                <span class="numberLike"><i class="fas fa-heart"></i> <?= htmlspecialchars($article['likesCnt']['count(*)']); ?></span>
                                                <span class="numberComment"><i class="fas fa-comment"></i> <?= htmlspecialchars($article['comments']['count(*)']); ?></span>
                                            </span>
                                        </a>
                                    </span>
                                </li>
                                <?php endforeach; ?>
                            <?php } else { ?>
                                <span class="no-article-text">게시물이 없습니다.</span>
                            <?php } ?>
                        </ul>
                        <div class="paging">
                            <div class="prev-wrap">
                                <?php if($prevPage > 0) { ?>
                                    <a href="/profile.php?id=<?= htmlspecialchars($_SESSION['id'])?>&page=<?=$firstPage?>"><i class="fa-angle-left"></i><i class="fa-angle-left"></i></a>
                                    <a href="/profile.php?id=<?= htmlspecialchars($_SESSION['id'])?>&page=<?=$prevPage?>"><i class="fa-angle-left"></i></a>
                                <?php } ?>
                            </div>
                            <ul class="number-wrap">
                                <?php for($i = $firstPage; $i <= $lastPage; $i++) { ?>
                                    <li><a href="/profile.php?id=<?= htmlspecialchars($_SESSION['id'])?>&page=<?=$i?>"><?=$i?></a></li>
                                <?php } ?>
                            </ul>
                            <div class="next-wrap">
                                <?php if($nextPage <= $lastPage) { ?>
                                    <a href="/profile.php?id=<?= htmlspecialchars($_SESSION['id'])?>&page=<?=$nextPage?>"><i class="fa-angle-right"></i></a>
                                    <a href="/profile.php?id=<?= htmlspecialchars($_SESSION['id'])?>&page=<?=$lastPage?>"><i class="fa-angle-right"></i><i class="fa-angle-right"></i></a>
                                <?php } ?>
                            </div>
                        </div>
                    </div><!-- tab-content-articles -->
                </div>
            </div>
            <?php } else { ?>
            <div class="tab-wrap">
                <div class="tab-title-wrap">
                    <div class="tab-group clear">
                        <div class="tab-title on">
                            <div id="sorts" class="button-group">
                                <a href="javascript:void(0);" class="button is-checked on">최신순</a>
                                <a href="javascript:void(0);" class="button" data-sort-by="numberLike">좋아요순</a>
                                <a href="javascript:void(0);" class="button" data-sort-by="numberComment">댓글순</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-content-wrap">
                    <div class="tab-content-articles tab-cont on">
                        <ul class="article-list-wrap row grid">
                            <?php if(!empty($articles)) { ?>
                                <?php foreach ($articles as $article) : ?>
                                    <li class="article-list col-4 element-item">
                                        <span class="pic-wrap relative block">
                                            <a href="javascript:void(0)" class="block" style="border: 1px solid #dbdbdb;">
                                                <?php if($article['pics']['url']) { ?>
                                                <span class="pic relative"
                                                      style="background-image:url(<?= htmlspecialchars($article['pics']['url']);?>)"
                                                      data-pic="<?= $article['pics']['url']?>"
                                                      data-w="auto">
                                                <?php } else { ?>
                                                    <span class="pic relative"><span class="no-img">NO IMAGE</span></span>
                                                <?php } ?>
                                            </a>
                                            <a href="javascript:void(0)" class="pic-status hide">
                                                <span class="pic-status-text-wrap">
                                                    <span class="numberLike"><i class="fa fa-heart"></i> <?= htmlspecialchars($article['likesCnt']['count(*)']); ?></span>
                                                    <span class="numberComment"><i class="fa fa-comment"></i> <?= htmlspecialchars($article['comments']['count(*)']); ?></span>
                                                </span>
                                            </a>
                                        </span>
                                    </li>
                                <?php endforeach; ?>
                            <?php } else {?>
                                <span class="no-article-text">게시물이 없습니다.</span>
                            <?php } ?>
                        </ul>
                        <div class="paging">
                            <div class="prev-wrap">
                                <?php if($prevPage > 0) { ?>
                                    <a href="/profile.php?id=<?= htmlspecialchars($_GET['id'])?>&page=<?=$firstPage?>">first</a>
                                    <a href="/profile.php?id=<?= htmlspecialchars($_GET['id'])?>&page=<?=$prevPage?>">prev</a>
                                <?php } ?>
                            </div>
                            <ul class="number-wrap">
                                <?php for($i = $firstPage; $i <= $lastPage; $i++) { ?>
                                    <li><a href="/profile.php?id=<?= htmlspecialchars($_GET['id'])?>&page=<?=$i?>"><?=$i?></a></li>
                                <?php } ?>
                            </ul>
                            <div class="next-wrap">
                                <?php if($nextPage <= $lastPage) { ?>
                                    <a href="/profile.php?id=<?= htmlspecialchars($_GET['id'])?>&page=<?=$nextPage?>">next</a>
                                    <a href="/profile.php?id=<?= htmlspecialchars($_GET['id'])?>&page=<?=$lastPage?>">last</a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
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
    </div><!-- photoswipe end -->
</div><!-- body-content-wrap end -->
<script src="../js/profile.js"></script>