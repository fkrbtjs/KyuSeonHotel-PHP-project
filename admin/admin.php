<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>admin</title>
<link rel="stylesheet" type="text/css" href="../css/main.css">
<link rel="stylesheet" type="text/css" href="../css/admin.css">
<script src="https://kit.fontawesome.com/a26d62cab7.js" crossorigin="anonymous"></script>
</head>
<body> 
<header>
    <?php include "../main/header.php";?>
</header>  
<section>
      <div class="admin_box">
       <h3 class="member_title">
          관리자 모드 > 회원 관리
      </h3>
       <ul class="member_list">
            <li>
               <div class="col1">번호</div>
               <div class="col2">아이디</div>
               <div class="col4">레벨</div>
               <div class="col5">포인트</div>
               <div class="col6">가입일</div>
               <div class="col7">수정</div>
               <div class="col8">삭제</div>
            </li>
<?php
   include ('../db/main_db.php');
   $sql = "select * from members order by num desc";
   $result = mysqli_query($con, $sql);
   $total_record = mysqli_num_rows($result); // 전체 회원 수

   $number = $total_record;

   while ($row = mysqli_fetch_array($result))
   {
      $num         = $row["num"];
     $id          = $row["id"];
     $name        = $row["name"];
     $level       = $row["level"];
      $point       = $row["point"];
      $regist_day  = $row["regist_day"];
?>
         
      <li>
      <form method="post" action="admin_member_dui.php?mode=update">
         <input type="hidden" name="num" value="<?=$num?>">
         <input type="hidden" name="name" value="<?=$name?>">
         <div class="col1"><?=$number?></div>
         <div class="col2"><?=$id?></a></div>
         <div class="col4"><input type="text" name="level" value="<?=$level?>"></div>
         <div class="col5"><input type="text" name="point" value="<?=$point?>"></div>
         <div class="col6"><?=$regist_day?></div>
         <div class="col7"><button type="submit">수정</button></div>
         <div class="col8"><button type="button" onclick="location.href='admin_member_dui.php?mode=delete&num=<?=$num?>'">삭제</button></div>
      </form>
      </li>   
         
<?php
         $number--;
   }
?>
       </ul>
       <h3 class="member_title">
          관리자 모드 > 스페셜오퍼 관리
      </h3>
       <ul class="board_list">
      <li class="title">
         <div class="col1">선택</div>
         <div class="col2">번호</div>
         <div class="col4">제목</div>
         <div class="col5">첨부파일명</div>
         <div class="col6">작성일</div>
      </li>
      <?php
   $sql = "select * from image_board order by num desc";
   $result = mysqli_query($con, $sql);
   $total_record = mysqli_num_rows($result); // 전체 글의 수
   
   $number = $total_record;
   
   while ($row = mysqli_fetch_array($result)) {
      $num         = $row["num"];
      $subject     = $row["subject"];
      $file_name   = $row["file_name"];
      $regist_day  = $row["regist_day"];
      $regist_day  = substr($regist_day, 0, 10)
      ?>
      <li>
         <form method="post" action="admin_member_dui.php?mode=board_delete">
         <div class="col1"><input type="checkbox" name="item[]" value="<?=$num?>"></div>
         <div class="col2"><?=$number?></div>
         <div class="col4"><?=$subject?></div>
         <div class="col5"><?=$file_name?></div>
         <div class="col6"><?=$regist_day?></div>
      </li>   
      <?php
    $number--;
   }
   mysqli_close($con);
   ?>
      <button type="submit">선택된 글 삭제</button>
   </form>
      <button type="submit" onclick="location.href='../specialoffer/specialoffer_form.php'">게시글 추가</button>
   </ul>
   </div> <!-- admin_box -->
</section> 
<footer>
    <?php include "../main/footer.php";?>
</footer>
</body>
</html>
