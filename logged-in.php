<div class="header-content-wrap">
    <div class="header-content relative clear">
        <div class="left-content content">
            <a href="#" class="scale"><img src="../insta/image/photo_page/insta_icon.png" alt=""></a>
            <span class="line scale"></span>
            <a href="#" class="scale"><img src="../insta/image/photo_page/insta_logo.png" alt=""></a>
        </div>
        <div class="right-content content">
            <ul class="icon-wrap">
                <li class="icon"><a href="#" class="block"><img src="../insta/image/photo_page/header_icon_1.png" alt=""></a></li>
                <li class="icon"><a href="#" class="block"><img src="../insta/image/photo_page/header_icon_2.png" alt=""></a></li>
                <li class="icon"><a href="#" class="block"><img src="../insta/image/photo_page/header_icon_3.png" alt=""></a></li>
            </ul>
        </div>
        <div class="search-wrap content">
            <div class="static-search">
                <span class="inline-block"><img src="../insta/image/photo_page/input_search_icon.png" alt=""></span>
                <span class="inline-block">검색</span>
            </div>
        </div>
    </div>
</div><!-- header-content-wrap -->
<div class="body-content-wrap">
    <?php
    $contents = [
        [
            "title" => "title1",
            "image" => "../insta/image/photo_page/content01_body_img.jpg",
            "views" => "1,111,111",
            "comments" => [
                    [
                        'user-name'=>'user1-1',
                        'comment'=>'comment1-1'
                    ],
                    [
                        'user-name'=>'user1-2',
                        'comment'=>'comment1-2'
                    ],
                    [
                        'user-name'=>'user1-3',
                        'comment'=>'comment1-3'
                    ]
            ],
        ],
        [
            "title" => "title2",
            "image" => "../insta/image/photo_page/content02_body_img.jpg",
            "views" => "2,222,222",
            "comments" => [
                [
                    'user-name'=>'user2-1',
                    'comment'=>'comment2-1'
                ],
                [
                    'user-name'=>'user2-2',
                    'comment'=>'comment2-2'
                ],
                [
                    'user-name'=>'user2-3',
                    'comment'=>'comment2-3'
                ]
            ],
        ],
        [
            "title" => "title3",
            "image" => "../insta/image/photo_page/content03_body_img.jpg",
            "views" => "3,333,333",
            "comments" => [
                [
                    'user-name'=>'user3-1',
                    'comment'=>'comment3-1'
                ],
                [
                    'user-name'=>'user3-2',
                    'comment'=>'comment3-2'
                ],
                [
                    'user-name'=>'user3-3',
                    'comment'=>'comment3-3'
                ]
            ],
        ],
    ];
    ?>
    <?php foreach ($contents as $key => $value) { ?>
    <div class="object-content-wrap">
        <div class="header-title-wrap">
            <div class="icon-wrap header-object">
                <img src="../insta/image/photo_page/insta_color_icon.png" alt="">
            </div>
            <div class="text-wrap header-object">
                <span class="title block">instagram</span>
                <p class="sub-title"><?php echo $value["title"] ?></p>
            </div>
        </div>
        <div class="body-image-wrap" style="background-image:url('<?php echo $value["image"] ?>')"></div>
        <div class="footer-comment-wrap test">
            <div class="like-wrap clear">
                <span class="like inline-block"></span>
                <span class="comment inline-block"></span>
                <span class="option inline-block"></span>
            </div>
            <div class="comment-wrap">
                <div class="view-count">조회 <span class="status-number inline-block"><?php echo $value["views"]?></span>회</div>
                <?php foreach ($value["comments"] as $keys => $values ){?>
                <p class="comment">
                    <span class="user-name inline-block"><?php echo $values['user-name'] ?></span>
                    <span class="user-comment inline-block"><?php echo $values['comment'] ?></span>
                </p>
                <?php } ?>
                <span class="record-time block">10시간 전</span>
            </div>
            <div class="comment-typing-board clear">
                <form action="" class="comment-form">
                    <textarea class="comment-textarea inline-block" placeholder="댓글 달기..."></textarea>
                </form>
                <a href="#" class="modal-menu inline-block"><img src="../insta/image/photo_page/modal_icon.png" alt=""></a>
            </div>
        </div>
    </div>
    <?php } ?>
</div>





















