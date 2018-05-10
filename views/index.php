<div class="store-down-content">
    <div class="text-wrap">
        <h3 class="insta-title">Portfoliooo</h3>
    </div>
</div>
<div class="content-wrap relative">
    <div class="login-wrap clear">
        <div class="right-area">
            <div class="login-area">
                <div class="top-login-area">
                    <h1 class="insta-logo">Portfolio</h1>
                    <p class="insta-logo-subtext">친구들의 사진을 보려면 가입하세요.</p>
                    <form id="form1" name="form1">
                        <div class="form-wrap">
                            <div class="input-content-wrap">
                                <label for="email" class="input-label"></label>
                                <input type="text" id="email" name="email" class="login-custom-input" placeholder="이메일 주소 (example@gmail.com)" value="<?= isset($formSession['submitBtn']['email']) ? $formSession['submitBtn']['email'] : '' ; ?>">
                            </div>
                            <div class="input-content-wrap">
                                <label for="name" class="input-label"></label>
                                <input type="text" id="name" name="name" class="login-custom-input" placeholder="이름 (2~4자)" value="<?= isset($formSession['submitBtn']['name']) ? $formSession['submitBtn']['name'] : '' ; ?>">
                            </div>
                            <div class="input-content-wrap">
                                <label for="nickname" class="input-label"></label>
                                <input type="text" id="nickname" name="nickname" class="login-custom-input" placeholder="닉네임 (2~10자)" value="<?= isset($formSession['submitBtn']['nickname']) ? $formSession['submitBtn']['nickname'] : '' ; ?>">
                            </div>
                            <div class="input-content-wrap">
                                <label for="password" class="input-label"></label>
                                <input type="password" id="password" name="password" class="login-custom-input" placeholder="비밀번호 (8~12자)">
                            </div>
                        </div>
                        <button type="submit" name="submitBtn" class="common-btn-login-form block pointer submit-btn" formmethod="post" formaction="../register.php" onclick="move();">가입</button>
                        <?php if($errorMessage): ?>
                            <div class="error-message"><?= htmlspecialchars($errorMessage);?></div>
                        <?php endif; ?>
                    </form>
                </div>
                <div class="bottom-login-area">
                    <p>계정이 있으신가요? <a href="login.php" class="move-login-link inline-block">로그인</a></p>
                </div>
            </div><!-- login-area -->
        </div><!-- right-area -->
    </div>
</div>
