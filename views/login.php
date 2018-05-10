<div class="store-down-content">
    <div class="text-wrap">
        <h3 class="insta-title">Portfolio</h3>
    </div>
</div>
<div class="content-wrap relative">
    <div class="login-wrap clear">
        <div class="right-area login-right-area">
            <div class="login-area">
                <div class="top-login-area">
                    <h1 class="insta-logo">Portfolio</h1>
                    <form action="../login_process.php" method="post" id="login-form">
                        <div class="form-wrap">
                            <div class="input-content-wrap">
                                <label for="email" class="input-label"></label>
                                <input type="text" id="email" name="email" class="login-custom-input" placeholder="이메일 주소 (example@gmail.com)" value="<?= isset($emailSession) ? $emailSession : '' ; ?>">
                            </div>
                            <div class="input-content-wrap">
                                <label for="password" class="input-label"></label>
                                <input type="password" id="password" name="password" class="login-custom-input" placeholder="비밀번호">
                            </div>
                        </div>
                        <button type="submit" name="submitBtn" class="common-btn-login-form block pointer submit-btn">로그인</button>
                        <?php if($errorMessage): ?>
                            <div class="error-message"><?= htmlspecialchars($errorMessage);?></div>
                        <?php endif; ?>
                    </form>
                </div>
                <div class="bottom-login-area">
                    <p>계정이 없으신가요? <a href="index.php" class="move-login-link inline-block">가입하기</a></p>
                </div>
            </div><!-- login-area -->
        </div><!-- right-area -->
    </div>
</div>
