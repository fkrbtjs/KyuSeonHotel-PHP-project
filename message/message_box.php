<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="../css/message.css">
        <link
            href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR&display=swap"
            rel="stylesheet">
        <script src="https://kit.fontawesome.com/a26d62cab7.js" crossorigin="anonymous"></script>
        <script src="../js/message.js"></script>
        <title>Kyuseon Hotel</title>
    </head>
    <body>
        <header>
            <?php include "../main/header.php";?>
        </header>
        <section>
            <h1>
            <?php
        if (isset($_GET["page"]) || !empty($_GET["page"])){
            $page = $_GET["page"];
        }else{
			$page = 1;
        }
        $mode = $_GET["mode"];
		if($mode=="send"){
            echo "송신함 > 목록보기";
        }else {
            echo "수신함 > 목록보기";
        }
        ?>
            </h1>
            <div class="list">
                <ul id="message">
                    <li>
                        <span class="col1">번호</span>
                        <span class="col2">제목</span>
                        <span class="col3">
                        <?php						
						if ($mode=="send")
							echo "받은이";
						else
            echo "보낸이";
?>
                        </span>
                        <span class="col4">등록일</span>
                    </li>
                <?php
	include('../db/main_db.php');
  
  //전체 페이지를 구한다. 
  if ($mode=="send")
  $sql = "select count(*) from message where send_id='$userid' order by num desc";
  else
  $sql = "select count(*) from message where rv_id='$userid' order by num desc";
  
  $scale = 5;
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_array($result);
  $total_record = intval($row[0]);
  $total_page = ceil($total_record / $scale) ; // 전체 페이지
  $start = ($page -1) * $scale;

  //원하는 페이지에 있는 시작위치 ~ 끝위치 레코드셋을 가져온다.
	if ($mode=="send")
		$sql = "select * from message where send_id='$userid' order by num desc limit $start , $scale";
	else
		$sql = "select * from message where rv_id='$userid' order by num desc limit $start , $scale";

	$result = mysqli_query($con, $sql);

	// 전체 페이지 수($total_page) 계산 
	// if ($total_record % $scale == 0)     
	// 	$total_page = floor($total_record/$scale);      
	// else
	// 	$total_page = floor($total_record/$scale) + 1; 
 
	// 표시할 페이지($page)에 따라 $start 계산  
	// $start = ($page - 1) * $scale; 

  // 전체갯수 34개 -> 2페이지 : 34-10 =24  -> 24,23,22....0순서로 보여줌
	$number = $total_record - $start;

  //가져올 레코드수를 출력한다
  while($row = mysqli_fetch_array($result)){
    // 하나의 레코드 가져오기
    $num    = $row["num"];
    $subject     = $row["subject"];
    $regist_day  = $row["regist_day"];

    if ($mode=="send")
      $msg_id = $row["rv_id"];
    else
      $msg_id = $row["send_id"];
  
    $result2 = mysqli_query($con, "select name from members where id='$msg_id'");
    $record = mysqli_fetch_array($result2);
    $msg_name = $record["name"];	  
?>
                    <li>
                        <span class="col1"><?=$number?></span>
                        <span class="col2">
                            <a href="message_view.php?mode=<?=$mode?>&num=<?=$num?>"><?=$subject?></a>
                        </span>
                        <span class="col3"><?=$msg_name?>(<?=$msg_id?>)</span>
                        <span class="col4"><?=$regist_day?></span>
                    </li>
                    <?php
      $number--;
  }//end of while
  mysqli_close($con);
?>
                    <!-- 페이지를 출력한다 -->
                </ul>
                <ul id="page_num">
                <?php
  include ('./get_paging.php');
  $url = "message_box.php?mode=".$mode."&page=1";
  
  // echo get_paging($scale, $page, $total_page, $url);
  echo get_paging2($mode, $page, $total_page, $url);
?>
                </ul>
                <!-- page -->
                <ul class="buttons">
                    <li>
                        <button onclick="location.href='message_box.php?mode=rv'">수신함</button>
                    </li>
                    <li>
                        <button onclick="location.href='message_box.php?mode=send'">송신함</button>
                    </li>
                    <li>
                        <button onclick="location.href='message.php'">문의하기</button>
                    </li>
                </ul>
            </div>
            <!-- message_box -->
        </section>
        <footer>
            <?php include "../main/footer.php";?>
        </footer>
    </body>
</html>