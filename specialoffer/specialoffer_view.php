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
          <?php
           
        include("../db/main_db.php");  
      
        $num = $_GET["num"];
        $page = $_GET["page"];
      
        $sql = "select * from image_board where num=$num";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);
      
        $id = $row["id"];
        $name = $row["name"];
        $regist_day = $row["regist_day"];
        $subject = $row["subject"];
        $content = $row["content"];
        $file_name = $row["file_name"];
        $file_type = $row["file_type"];
        $file_copied = $row["file_copied"];
        $hit = $row["hit"];
        $content = str_replace(" ", "&nbsp;", $content);
        $content = str_replace("\n", "<br>", $content);
            echo "<h1>
                $subject
            </h1>";
            ?>
            <ul class="board_list2">
      <?php

  if ($userid !== $id) {
      $new_hit = $hit + 1;
      $sql = "update image_board set hit=$new_hit where num=$num";
      mysqli_query($con, $sql);
  }

  $file_name = $row['file_name'];
  $file_copied = $row['file_copied'];
  $file_type = $row['file_type'];
  //이미지 정보를 가져오기 위한 함수 width, height, type
  if (!empty($file_name)) {
      $image_info = getimagesize("../data/" . $file_copied);
      $image_width = $image_info[0];
      $image_height = $image_info[1];
      $image_type = $image_info[2];
      $image_width = 900;
      $image_height = 300;
      if ($image_width < 300) $image_width = 500;
  }
?>
 <ul class="view_content">
          
          <li>
            <?php
            echo "<img src='../data/$file_copied' width='$image_width'><br>";
?>

    <div class="hit_box"><span class="hit">조회수 : <?= $hit ?><br></span></div>
    <span><?= $content ?></span>
          </li>
        </ul>
    </section>
    <footer>
        <?php include "../main/footer.php";?>
    </footer>
</body>
</html>