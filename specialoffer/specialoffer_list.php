<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="../css/specialoffer.css">
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
                스페셜 오퍼
            </h1>
            <ul class="board_list">
            <?php
	include("../db/main_db.php");  

	if (isset($_GET["page"]))
		$page = $_GET["page"];
	else
		$page = 1;

  $sql = "select count(*) from image_board order by num desc";
	$result = mysqli_query($con, $sql);
	$row    = mysqli_fetch_array($result);
	$total_record = intval($row[0]); // 전체 글 수
  
	$scale = 4;
  $total_page = ceil($total_record / $scale);

	// 표시할 페이지($page)에 따라 $start 계산  
	$start = ($page - 1) * $scale;      
	$number = $total_record - $start;

  //현재페이지 레코드 결과값을 저장하기 위해서 배열선언
  $list = array(); 

  $sql = "select * from image_board order by num desc LIMIT $start, $scale";
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

  $image_width = 500;
  $image_height = 300;

  for($i=0; $i< count($list); $i++){
    $file_image = (!empty($list[$i]['file_name']))?"<img src='../img/file.gif'>" :" ";
    $date = substr($list[$i]['regist_day'], 0, 10);

    if (!empty($list[$i]['file_name'])) {
      $image_info = getimagesize("../data/".$list[$i]['file_copied']);
      $image_width = $image_info[0];
      $image_height = $image_info[1];
      $image_type = $image_info[2];
      if ($image_width <= 500 ) $image_width = 500;
      if ($image_height <= 300 ) $image_height = 300;
      $file_copied_0 = $list[$i]['file_copied'];
    }
?>
                <li>
                    <span>
                        <a href="specialoffer_view.php?num=<?= $list[$i]['num'] ?>&page=<?= $page ?>">
                    <div class="img">    
                        <?php 
  if (strpos($list[$i]['file_type'],"image") !== false) 
        echo "<img src='../data/$file_copied_0' width='$image_width' height='$image_height'><br>";
  else 
        echo "<img src='../img/user.jpg' width='$image_width' height='$image_height'><br>"; 
?>
                    </div>
                        <?= $list[$i]['subject'] ?></a><br>
                        <span class="content"><?= $list[$i]['content'] ?></span></a><br>
                        <span>등록일 : <?= $date ?></span>
                    </span>
                </li>
                <?php
    }//end of form
    mysqli_close($con);
?>
            </ul>

            <ul class="page_num">
                <?php
	$url = "specialoffer_list.php?";
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