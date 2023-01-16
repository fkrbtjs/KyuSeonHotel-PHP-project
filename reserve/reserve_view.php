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
        <script src="../js/main.js"></script>
        <title>Reserve</title>
    </head>
    <body>
        <header>
            <?php include "../main/header.php"; ?>
        </header>
        <section>
            <div class="main">
                <h1>예약 조회</h1>
            </div>

            <ul class="reserve_list">
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
                        
             if (isset($_GET["page"]) || !empty($_GET["page"])){
                $page = $_GET["page"];
            }else{
                $page = 1;
            }
	include("../db/main_db.php");  

    $sql = "select count(*) from reservation where id = '$userid' order by num desc";
	$result = mysqli_query($con, $sql);
	$row    = mysqli_fetch_array($result);
	$total_record = intval($row[0]); // 전체 글 수
  
	$scale = 2;
    $total_page = ceil($total_record / $scale);

	// 표시할 페이지($page)에 따라 $start 계산  
	$start = ($page - 1) * $scale;      
	$number = $total_record - $start;

  //현재페이지 레코드 결과값을 저장하기 위해서 배열선언
  $list = array(); 

  $sql = "select * from reservation where id = '$userid' order by num desc LIMIT $start, $scale";
  $result = mysqli_query($con, $sql);
  $i = 0;
  while($row = mysqli_fetch_array($result)){
    $list[$i] = $row;
    //번호순서
    $list_num = $total_record - ($page - 1) * $scale; 
    $list[$i]['no'] = $list_num -$i;
    $i++;
  }
  // for (; $row = mysqli_fetch_assoc($result); $i++) {
  //   //$row 배열을 $list[$i] 저장하기 따라서 2차원배열이 진행이 됨. 
  //   $list[$i] = $row;
  //   //번호순서
  //   $list_num = $total_record - ($page - 1) * $scale; 
  //   $list[$i]['no'] = $list_num -$i;
  // }
  for($i=0; $i< count($list); $i++){
?>
                <div class="info_box">
                <div class="room_img">
                <?php
                if( $list[$i]['room_type']=='그랜드 디럭스 더블'){
                    echo "<img src='../img/room-1.jpg'>";
                }else if( $list[$i]['room_type']=='프리미어 더블'){
                    echo "<img src='../img/room-2.jpg'>";
                }else if( $list[$i]['room_type']=='스위트 더블'){
                    echo "<img src='../img/room-3.jpg'>";
                }else if( $list[$i]['room_type']=='로얄 스위트'){
                    echo "<img src='../img/room-4.jpg'>";
                  }
                ?>
                </div>
                <div class="reserve_info">
                <h2 class="room_type"><?= $list[$i]['room_type'] ?></h2><br>
                <span class="check_in">
                <strong>숙박 일자</strong> : <?= $list[$i]['check_in'] ?>~</span>
            <span class="check_out">  
                <?= $list[$i]['check_out'] ?></span><br>
        <span class="name"><strong>예약자 명</strong> :  
            <?= $list[$i]['name'] ?>님</span><br>
        <span class="person"><strong>예약 인원</strong> : 
            <?= $list[$i]['person'] ?>명</span><br>
    <span class="breakfast"><strong>조식 인원</strong> : 
        <?= $list[$i]['breakfast'] ?>명</span><br>
<span class="request"><strong>요청 사항</strong> :  
    <?= $list[$i]['request'] ?></span><br>
<span class="reserve_day"><strong>예약 일자</strong> : 
<?= $list[$i]['reserve_day'] ?></span><br>
<span class="reserve_day"><strong>예약금</strong> : 
<?= $list[$i]['total_rate'] ?> KRW</span><br>
</div>
</div>
<?php
    }//end of form
    mysqli_close($con);
?>
</ul>

<ul class="page_num">
<?php
	$url = "reserve_view.php?";
  include('../message/get_paging.php');
	echo get_paging($scale, $page, $total_page, $url);
?>
</ul>
<!-- page -->
</div>
<!-- board_box -->
</section>
<footer>
<?php include "../main/footer.php";?>
</footer>
</body>
</html>