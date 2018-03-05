<div class="store-down-content">
    <div class="text-wrap">
        <h3 class="insta-title">Instagram</h3>
        <p class="info-text"><span>Windows</span> 스토어에서 무료로 다운로드하세요.</p>
    </div>
    <a href="https://www.microsoft.com/en-us/store/p/instagram/9nblggh5l9xt" class="down-btn" target="_blank">받기</a>
</div>
<div class="content-wrap relative">
    <div class="login-wrap clear">
        <div class="device-image hide md-inline-block"></div>
        <div class="right-area">
            <div class="login-area">
                <div class="top-login-area">
                    <h1 class="insta-logo"></h1>
                    <p class="insta-logo-subtext">친구들의 사진과 동영상을 보려면<br class="hide sm-block"> 가입하세요.</p>
                    <a href="#" class="common-btn-login-form block"><i class="facebook-icon"></i>Facebook으로 로그인</a>
                    <div class="common-half-line"><span class="common-half-line-text">또는</span></div>
                    <form id="form1" name="form1">
                        <div class="form-wrap">
                            <div class="input-content-wrap">
                                <label for="email" class="input-label"></label>
                                <input type="text" id="email" name="email" class="login-custom-input" placeholder="이메일 주소 (example@gmail.com)" value="<?= isset($formSession['submitBtn']['email']) ? $formSession['submitBtn']['email'] : '' ; ?>">
                            </div>
                            <div class="input-content-wrap">
                                <label for="name" class="input-label"></label>
                                <input type="text" id="name" name="name" class="login-custom-input" placeholder="이름" value="<?= isset($formSession['submitBtn']['name']) ? $formSession['submitBtn']['name'] : '' ; ?>">
                            </div>
                            <div class="input-content-wrap">
                                <label for="nickname" class="input-label"></label>
                                <input type="text" id="nickname" name="nickname" class="login-custom-input" placeholder="닉네임" value="<?= isset($formSession['submitBtn']['nickname']) ? $formSession['submitBtn']['nickname'] : '' ; ?>">
                            </div>
                            <div class="input-content-wrap">
                                <label for="password" class="input-label"></label>
                                <input type="password" id="password" name="password" class="login-custom-input" placeholder="비밀번호">
                            </div>
                        </div>
                        <button type="submit" name="submitBtn" class="common-btn-login-form block pointer submit-btn" formmethod="post" formaction="../register.php">가입</button>
                        <?php if($errorMessage): ?>
                            <div class="error-message"><?= htmlspecialchars($errorMessage);?></div>
                        <?php endif; ?>
                    </form>
                    <p class="signup-info-text">가입하면 Instagram의 <b>약관</b> 및 <b>개인<br class="hide sm-block"> 정보처리방침</b>에 동의하게 됩니다.</p>
                </div>
                <div class="bottom-login-area">
                    <p>계정이 있으신가요? <a href="login.php" class="move-login-link inline-block">로그인</a></p>
                </div>
            </div><!-- login-area -->
            <div class="app-download-area">
                <p class="app-info-text">앱을 다운로드하세요.</p>
                <a href="https://itunes.apple.com/app/instagram/id389801252?mt=8" class="app-store-link store-link-custom" target="_blank"></a>
                <a href="https://play.google.com/store/apps/details?id=com.instagram.android&referrer=utm_source%3Dinstagramweb%26utm_campaign%3DsignupPage%26utm_medium%3Dbadge" class="google-play-link store-link-custom" target="_blank"></a>
                <a href="https://www.microsoft.com/en-us/store/p/instagram/9nblggh5l9xt" class="microsoft-link store-link-custom" target="_blank"></a>
            </div>
        </div><!-- right-area -->
    </div>
</div>
