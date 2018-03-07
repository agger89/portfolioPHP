<!DOCTYPE html>
<html>
<head>
    <!-- 메타 태그 -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php if(isset($authors)) {?>
        <title><?= $authors['nickname'] ?> (<?= $authors['email'] ?>)</title>
    <?php } else { ?>
        <title>Instagram</title>
    <?php } ?>
    <!-- favicon -->
    <link rel="icon" type="image/png" href="../images/photo_page/insta_profile.png">
    <!-- css -->
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/helper.css">
    <link rel="stylesheet" href="../css/default.css">
    <link rel="stylesheet" href="../css/default_small.css" media="all and (min-width: 450px)">
    <link rel="stylesheet" href="../css/default_small_half.css" media="all and (min-width: 736px)">
    <link rel="stylesheet" href="../css/default_medium.css" media="all and (min-width: 876px)">
    <!-- lib css -->
    <link rel="stylesheet" href="../lib/jquery.bxslider.css">
    <link rel="stylesheet" href="../css/photoswipe.css">
    <link rel="stylesheet" href="../css/default-skin.css">
    <!-- lib js-->
    <link rel="stylesheet" href="../lib/font-awesome-4.7.0/css/font-awesome.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src='//cdnjs.cloudflare.com/ajax/libs/jquery.form/3.51/jquery.form.min.js'></script>
    <script src="../lib/jquery.bxslider.js"></script>
    <!-- js -->
    <script src="../js/index.js"></script>
    <script src="../js/photoswipe.min.js"></script>
    <script src="../js/photoswipe-ui-default.min.js"></script>
</head>
<body>
