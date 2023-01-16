<?php
    $type = "";
    if(isset($_GET['type'])){
    $type = ($_GET['type']);
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="../css/reserve.css">
        <link
            href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR&display=swap"
            rel="stylesheet">
        <script src="https://kit.fontawesome.com/a26d62cab7.js" crossorigin="anonymous"></script>
        <script src="../js/reserve.js"></script>
        <title>Reserve</title>
    </head>
    <body onload="calc_rate()">
        <header>
            <?php include "../main/header.php"; ?>
        </header>
        <?php
        if (!isset($userid) || empty($userid))
        {
            echo("<script>
                    alert('로그인 후 이용해주세요!');
                    history.go(-1);
                    </script>
                ");
            exit;
        }
        if (isset($_SESSION['userlevel']))
            $level = $_SESSION['userlevel'];
            
        ?>
        <section>
            <h1 id="h1"><?=$type?></h1>
            <div class="input_form">
                <div class="rate_box">
                    <ul class="rate">
                        <li>
                            객실 요금
                            <ul class="rate_detail">
                                <li>체크인
                                    <span class="check_in2">0000-00-00</span>
                                    ~ 체크아웃
                                    <span class="check_out2">0000-00-00</span></li>
                                <li> 
                                    <span class="person2">2</span>명
                                    X
                                    <span class="day"></span>박 =
                                    <span class="room_rate"></span>
                                    KRW</li>
                            </ul>
                        </li>
                        <li>
                            옵션 요금
                            <ul class="rate_detail">
                                <li>조식신청</li>
                                <li> 
                                    <span class="breakfast2">1</span>명
                                    X
                                    <span class="day"></span>박 =
                                    <span class="option_rate"></span>
                                    KRW</li>
                            </ul>
                        </li>
                        <li>
                            할인 요금
                            <ul class="rate_detail">
                                <li>회원 등급 : <?=$level?> (
                                    <span class="discount">
                                    <?php
                                    if($level =='Member'){
                                        echo "0";
                                    }else if($level == 'Silver'){
                                        echo "2";
                                    }else if($level == 'Gold'){
                                        echo "6";
                                    }else if($level == 'Platinum'){
                                        echo "8";
                                    }else if($level == 'Vip'){
                                        echo "10";
                                    }
                                ?></span>% Discount
                                )</li>
                                <li>
                                    할인가 : <span class="dis_price"></span> KRW
                                </li>
                               
                            </ul>
                        </li>
                        <li>총 요금
                            <span class="total_rate"></span>
                            KRW</li>
                            
                    </ul>
                </div>
                <form name="reserve_form" method="post" action="reserve_server.php">
                    <input type ="hidden" name="room_type" value ="<?=$type?>" />
                    <input type ="hidden" name="total_rate" class="total_rate2"/>
                    <label for="">체크인</label>
                    <input
                        type="date"
                        name="check_in"
                        class="check_in"
                        min="2023-01-13"
                        max="2023-02-13">
                    <label for="">체크아웃</label>
                    <input
                        type="date"
                        name="check_out"
                        class="check_out"
                        min="2023-01-13"
                        max="2023-02-13">
                    <label for="">인원 선택</label>
                    <input type="number" name="person" class="person" value="2" min="1" max="4">
                    <div class="confirm_name"></div>
                    <label for="">조식 신청</label>
                    <input
                        type="number"
                        name="breakfast"
                        class="breakfast"
                        value="0"
                        min="0"
                        max="4">
                    <div class="confirm_email1"></div>
                    <label for="">추가 요청</label>
                    <textarea name="request" cols="30" rows="10"></textarea>
                    

                </div>
                <div class="submit_box">
                    <input type="button" onclick="check_input()" class="submit" value="예약하기">
                </div>
            </form>
        </section>
        <footer>
            <?php include "../main/footer.php";?>
        </footer>
    </body>
</html>