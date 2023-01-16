<?php
if (isset($_GET) && !empty( $_GET)){
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
    <script src="../js/login.js"></script>
    <title>Login</title>
</head>
<body>
    <header>
        <?php include "../main/header.php"; ?>
    </header>
    <section>
           <h1>로그인</h1>
           <form name="login_form" method="post" action="login_server.php">
            <label for="">아이디</label>
            <input type="text" placeholder="아이디" name="id" class="id">
            <div class="confirm_id"></div>

            <label for="">비밀번호</label>
            <input type="password" placeholder="비밀번호" name="pass1">
            <div class="confirm_pass1"></div>

            <div class="submit_buttons">
            <input type="button" class="submit" onclick="check_input()" value="로그인">
            </div>
           </form>
    </section>
    <footer>
        <?php include "../main/footer.php";?>
    </footer>
</body>
</html>