<div class="body-content-wrap">
    <div class="profile-body-wrap">
        <div class="upload-wrap relative">
            <h3 class="upload-title">이미지 올리기</h3>
            <div class="image-preview">
                <img src="" id="img">
            </div>
            <form action="/write_process.php" enctype="multipart/form-data" method="post" class="center-align">
                <textarea name="comment" class="comment-textarea block" placeholder="댓글 달기..."></textarea>
                <label for="input_img" class="input-custom">이미지 선택</label>
                <span class="file-wrap input-block">
                    <input type="file" name="fileToUpload" id="input_img">
                </span>
                <input type="submit" value="글 등록" name="submit" class="submit-btn input-custom pointer">
            </form>
        </div>
        <?php if($errorMessage): ?>
            <div class="error-message center-align"><?= htmlspecialchars($errorMessage);?></div>
        <?php endif; ?>
    </div>
</div>
<script src="../js/write.js"></script>















