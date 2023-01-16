<?php
    //세션값 체크
    //세션값이 있으면 세션값으로 변수에 저장하고,없으면 "" 취급한다
    session_start();
    $userid = $username = $userlevel = $userpoint = "";
    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    if (isset($_SESSION["username"])) $username = $_SESSION["username"];
    if (isset($_SESSION["userlevel"])) $userlevel = $_SESSION["userlevel"];
    if (isset($_SESSION["userpoint"])) $userpoint = $_SESSION["userpoint"];
?>	

<div class="top">
            <div class="logo"><a href="../main/index.php"><i class="fa-solid fa-hotel"></i>Kyuseon Hotel</a></div>
            <ul class="quick_nav">
            <?php
            if(!$userid) {
             ?>             
                <li><a href="">예약조회</a></li>
                <li><a href="../login/login.php">로그인</a></li>
                <li><a href="../register/register.php">회원가입</a></li>
            <?php
            } else {
                $logged = $username."(".$userid.")님 [Level : ".$userlevel." , Point : ".$userpoint."]";
            ?>
                <li><?= $logged ?></li>
                <li><a href="../reserve/reserve_view.php">예약조회</a></li>
                <li><a href="../login/logout.php">로그아웃</a></li>
                <li><a href="../register/register_modify.php">정보수정</a></li>
            <?php
             }
            ?>
            <?php
            if($userlevel=='admin') {
            ?>
                <li><a href="../admin/admin.php">관리자 모드</a></li>
            <?php
            }
            ?>
            </ul>
        </div>
        <div class="bottom">
            <ul class="main_nav">
                <li><a href="../reserve/reserve_list.php">객실 예약</a></li>
                <li><a href="../introduce/introduce.php">호텔 소개</a></li>
                <li><a href="../message/message.php">고객 문의</a></li>
                <li><a href="../specialoffer/specialoffer_list.php">스페셜 오퍼</a></li>
            </ul>
        </div>