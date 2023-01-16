<?php
include('../db/main_db.php');

$id = $pass1 = $regist_day ="";

if(isset($_POST['id']) && isset($_POST['pass1'])){
    //4 보안코딩
    $id   = mysqli_real_escape_string($con,$_POST['id']);
    $pass1  = mysqli_real_escape_string($con,$_POST['pass1']);
   
    $sql_same = "select * from members where id = '$id'";
    $record_set = mysqli_query($con, $sql_same);  // $sql 에 저장된 명령 실행
    
    if(mysqli_num_rows($record_set) == 1){
        $row = mysqli_fetch_assoc($record_set);
        $hash_value = $row["pass"];

        //hash 비교하기 위한 방법
        if(password_verify($pass1,$hash_value)){
            session_start();
             $_SESSION["userid"] = $row["id"];
             $_SESSION["username"] = $row["name"];
             $_SESSION["userphone"] = $row["phone"];
             $_SESSION["userlevel"] = $row["level"];
             $_SESSION["userpoint"] = $row["point"];
          header("location:../main/index.php");
          exit();
        }else{
          header("location:login.php?error=비밀번호가 틀렸습니다");
          exit();
        }
    }else{
        header("location:login.php?error=아이디가 존재하지않습니다");
        exit();
    }
}else{
    // header("location:login.php?error=알수없는 오류");
    // exit();
}

?>