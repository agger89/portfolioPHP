<div class="header-content-wrap trs-du-03">
    <div class="header-content relative clear">
        <div class="left-content content">
            <?php if(strpos($_SERVER['REQUEST_URI'], 'main.php')) {?> <!-- main page -->
                <a href="#" class="scale header-insta-logo">Portfolio</a>
            <?php }else { ?>
                <a href="/" class="scale header-insta-logo">Portfolio</a>
            <?php } ?>
        </div>
        <div class="right-content content">
            <ul class="icon-wrap">
                <?php if(strpos($_SERVER['REQUEST_URI'], 'profile.php')) :?> <!-- profile page -->
                    <li class="icon"><a href="../write.php" class="block" title="게시글 작성"><img src="/images/photo_page/header_icon_4.png" alt=""></a></li>
                <?php endif; ?>
                <?php if(strpos($_SERVER['REQUEST_URI'], 'user_list.php')) {?> <!-- user_list page -->
                    <li class="icon"><a href="javascript:void (0);" class="block" title="회원리스트"><img src="/images/photo_page/header_icon_1.png" alt=""></a></li>
                <?php } else { ?>
                    <li class="icon"><a href="../user_list.php?id=<?= htmlspecialchars($_SESSION['id']);?>" class="block" title="회원리스트"><img src="/images/photo_page/header_icon_1.png" alt=""></a></li>
                <?php } ?>
                <li class="icon"><a href="javascript:void (0);" id="header-btn-status" class="block" title="실시간 알림"><img src="/images/photo_page/header_icon_2.png" alt=""></a></li>
                <?php if(strpos($_SERVER['REQUEST_URI'], 'profile.php') && $_SESSION['id'] == $authors['id']) {?> <!-- profile page -->
                    <li class="icon"><a href="#" class="block" title="프로필"><img src="/images/photo_page/header_icon_3.png" alt=""></a></li>
                <?php } else { ?>
                    <li class="icon"><a href="/profile.php?id=<?= htmlspecialchars($_SESSION['id']);?>&page=1" class="block" title="프로필"><img src="/images/photo_page/header_icon_3.png" alt=""></a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>
<div class="modal fade status trs-prop-transform trs-du-017" id="status-modal" role="dialog">
    <div class="block relative" style="max-width: 1010px; margin: 0 auto;">
        <div class="modal-dialog">
            <span class="loader md xmd"></span>
        </div>
    </div>
</div>