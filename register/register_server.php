<?php
include('../db/main_db.php');

$id = $name = $email1 = $email2 = $phone = $pass1 = $pass2 = $regist_day ="";

if(isset($_POST['id']) && isset($_POST['name']) && isset($_POST['email1']) && isset($_POST['email2']) && isset($_POST['phone']) && isset($_POST['pass1']) && isset($_POST['pass2'])){
    $id   = $_POST["id"];
    $name = $_POST["name"];
    $email1 = $_POST["email1"];
    $email2 = $_POST["email2"];
    $phone  = $_POST["phone"];
    $pass1  = $_POST["pass1"];
    $pass2  = $_POST["pass2"];
    $regist_day = date("Y-m-d (H:i)"); 

   
    //6 패스워드 해쉬코드 변환
    $pass = password_hash($pass1,PASSWORD_DEFAULT);
    $email = $email1 . "@" . $email2;
    $sql_same = "select * from members where id = '$id'";
    $record_set = mysqli_query($con, $sql_same);  // $sql 에 저장된 명령 실행
    if(mysqli_num_rows($record_set) > 0){
        header("location:register.php?error_id_confirm=아이디가 이미 존재합니다");
        exit();
    }else{
        //7 insert
        $sql_insert = "insert into members(id, name , email, phone , pass , regist_day, level, point) ";
        $sql_insert .= "values('$id', '$name', '$email', '$phone' , '$pass', '$regist_day', 'Member' , 0)";
        $result = mysqli_query($con, $sql_insert);  // $sql 에 저장된 명령 실행
        mysqli_close($con);
        if($result){
            header("location:../main/index.php?success=가입이 완료되었습니다!!");
            exit();
        }else{
          header("location:register.php?error=가입이 실패되었습니다");
          exit();
        }
    }
}else{
    header("location:register.php?error=알수없는 오류");
      exit();
}

?>