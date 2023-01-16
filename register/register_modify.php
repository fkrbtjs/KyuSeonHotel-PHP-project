<?php
if (isset($_GET) && !empty($_GET)){
    $em = $_GET['error'];
   if ($em) {
       echo "
      <script>
          alert(`${em}`); 
      </script>
      ";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/register.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a26d62cab7.js" crossorigin="anonymous"></script>
    <script src="../js/register.js"></script>
    <title>Register</title>
</head>
<body>
    <header>
        <?php include "../main/header.php"; ?>
    </header>
    <?php    
   	include('../db/main_db.php');
    $sql    = "select * from members where id='$userid'";
    $result = mysqli_query($con, $sql);
    $row    = mysqli_fetch_array($result);

    $pass = $row["pass"];
    $name = $row["name"];
    $phone = $row["phone"];
    $email = $row["email"];

    mysqli_close($con);
    ?>
    <section>
           <h1>회원 정보수정</h1>
           <form name="register_form" method="post" action="register_modify_server.php">
            <label for="">아이디</label>
            <input type="text" name="id" class="id" value="<?=$userid?>" readonly="readonly">
            <div class="confirm_id">
            <!-- <?php
                if(isset($_GET['error'])){
                    echo "<p class ='error'>{$_GET['error']}</p>";
                }
            ?> -->
            </div>
           
            <label for="">이름</label>
            <input type="text" placeholder="이름" name="name">
            <div class="confirm_name"></div>
            <?php
                if(isset($_GET['error_name'])){
                    echo "<p class ='error'>{$_GET['error_name']}</p>";
                }
            ?>

            <label for="">이메일</label>
            <input type="text" name="email1" placeholder="이메일" class="email1"> @ 
            <select name="email2">
                <option value="naver">naver.com</option>
                <option value="google">google.com</option>
                <option value="daum">daum.net</option>
            </select>
            <div class="confirm_email1"></div>
            <?php
                if(isset($_GET['error_email1'])){
                    echo "<p class ='error'>{$_GET['error_email1']}</p>";
                }
            ?>

            <label for="">전화번호</label>
            <input type="text" placeholder="전화번호" name="phone">
            <div class="confirm_phone"></div>
            <?php
                if(isset($_GET['error_phone'])){
                    echo "<p class ='error'>{$_GET['error_phone']}</p>";
                }
            ?>

            <label for="">비밀번호</label>
            <input type="password" placeholder="비밀번호" name="pass1">
            <div class="confirm_pass1"></div>
            <?php
                if(isset($_GET['error_pass1'])){
                    echo "<p class ='error'>{$_GET['error_pass1']}</p>";
                }
            ?>

            <label for="">비밀번호 확인</label>
            <input type="password" placeholder="비밀번호 확인" name="pass2" class="password2">
            <div class="confirm_pass2"></div>
            <?php
                if(isset($_GET['error_pass2'])){
                    echo "<p class ='error'>{$_GET['error_pass2']}</p>";
                }
                if(isset($_GET['error_pass2_confirm'])){
                    echo "<p class ='error'>{$_GET['error_pass2_confirm']}</p>";
                }
            ?>
            
            <div class="submit_buttons">
            <input type="button" onclick="check_input()" class="submit" value="수정완료">
            <input type="button" onclick="reset_input()" class="submit" value="초기화">
            </div>
           </form>
    </section>
    <footer>
        <?php include "../main/footer.php";?>
    </footer>
</body>
</html>