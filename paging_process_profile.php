<?php
$pageSet = 9; // 한페이지 출력 수
$blockSet = 5; // 한페이지 블럭 수

if(isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
} // 현재페이지(넘어온값)

$block = ceil ($page /  $blockSet); // 현재 블럭

$limitIdx = ($page - 1) * $pageSet; // limit 시작위치

$users_id = $_GET['id'];
$countArticle = $profile->countArticle($users_id); // $articles 변수에 main 클래스에 소속된 articles 메소드를 담음
$total = $countArticle['COUNT(*)']; // 전체 글 수

$totalPage = ceil($total / $pageSet); // 전체 페이지 수
$totalBlock = ceil($totalPage / $blockSet); // 전체 블럭 수

$currentPage = $profile->articles($users_id, $limitIdx, $pageSet); // 현재 페이지 글 수

// 페이지번호 & 블럭 설정
$firstPage = (($block - 1) * $blockSet) + 1; // 첫번째 페이지 번호
$lastPage = min ($totalPage, $block * $blockSet); // 마지막 페이지 번호

$prevPage = $page - 1; // 이전 페이지
$nextPage = $page + 1; // 다음 페이지

$prevBlock = $block - 1; // 이전 블럭
$nextBlock = $block + 1; // 다음 블럭

$prevBlockPage = $prevBlock * $blockSet; // 이전 블럭 페이지 번호
$nextBlockPage = $nextBlock * $blockSet; // 다음 블럭 페이지 번호