<?php
   //1 데이터베이스 include한다
   include('../db/main_db.php');
   //2 전역변수를 한줄로 선언한다
   $message = $id ="";
   //3 $_GET isset()
   if(isset($_GET['id'])){
     //4 보안코딩
     $id = $_GET["id"];
   }
   //5 에러코딩체크 메시지만보여준다
   if(empty($id)) 
   {
     $message = "<li>아이디를 입력해 주세요!</li>";
    }
    else
    {
      //6 select 진행
      $sql = "select * from members where id='$id'";
      $result = mysqli_query($con, $sql);

      if (mysqli_num_rows($result)==1)
      {
         $message = "<li>".$id." 아이디는 중복됩니다.</li>";
         $message .= "<li>다른 아이디를 사용해 주세요!</li>";
      }
      else
      {
         $message = "<li>".$id." 아이디는 사용 가능합니다.</li>";
      }
      mysqli_close($con);
   }
?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR&display=swap" rel="stylesheet">
<style>
body {
  width: 250px;
  height: 150px;  
  padding: 0 0 0 60px;
  font-family: 'Noto Sans KR', sans-serif;
}

h3 {
   padding-left: 15px;
   border-left: solid 5px #78909c;
}
#close {
   margin:20px 0 0 80px;
   cursor:pointer;
   display: flex;
}

input {
    width: 50px;
    height: 30px;
    background-color: #78909c ;
    border: 1px solid #78909c;
    color: white;
}
</style>
</head>
<body>
<h3>아이디 중복체크</h3>
<p>
<?php
echo "$message";
?>
</p>
<!-- input button 으로 변경 -->
<div id="close">
   <input type="button" onclick="javascript:self.close()" value="확인">
</div>
</body>
</html>

