<?php
include('../db/main_db.php');

$id = $name = $email1 = $email2 = $phone = $pass1 = $pass2 ="";

if(isset($_POST['id']) && isset($_POST['name']) && isset($_POST['email1']) && isset($_POST['email2']) && isset($_POST['phone']) && isset($_POST['pass1']) && isset($_POST['pass2'])){
    $id   = $_POST["id"];
    $name = $_POST["name"];
    $email1 = $_POST["email1"];
    $email2 = $_POST["email2"];
    $phone  = $_POST["phone"];
    $pass1  = $_POST["pass1"];
    $pass2  = $_POST["pass2"];

    // $user_info = "id={$id}&name={$name}";
    // if(empty($id)){
    //     header("location:register.php?error_id=아이디를 입력해주세요");
    //     exit();
    // }
    // if(empty($name)){
    //     header("location:register.php?error_name=이름을 입력해주세요");
    //     exit();
    // }
    // if(empty($email1)){
    //     header("location:register.php?error_email1=이메일 입력해주세요");
    //     exit();
    // }
    // if(empty($phone)){
    //     header("location:register.php?error_phone=전화번호를 입력해주세요");
    //     exit();
    // }
    // if(empty($pass1)){
    //     header("location:register.php?error_pass1=비밀번호를 입력해주세요");
    //     exit();
    // }
    // if(empty($pass2)){
    //     header("location:register.php?error_pass2=비밀번호를 확인해주세요");
    //     exit();
    // }
    // if($pass1 != $pass2){
    //     header("location:register.php?error_pass2_confirm=비밀번호가 일치하지않습니다");
    //     exit();
    // }

    //6 패스워드 해쉬코드 변환
    $pass = password_hash($pass1,PASSWORD_DEFAULT);
    $email = $email1 . "@" . $email2;
    $sql_same = "select * from members where email = '$email' or phone ='$phone'";
    $record_set = mysqli_query($con, $sql_same);  // $sql 에 저장된 명령 실행
    if(mysqli_num_rows($record_set) > 0){
        header("location:register_modify.php?error=가입된 이메일 또는 전화번호가 이미 존재합니다");
        exit();
    }else{
        //7 insert
        $sql_update = "update members set pass='$pass' , name='$name' ,email='$email' , phone='$phone'";
        $sql_update .= " where id='$id'";
        $result = mysqli_query($con, $sql_update);  // $sql 에 저장된 명령 실행
        mysqli_close($con);
        if($result){
            session_start();
            $_SESSION["username"] = $name;
            header("location:../main/index.php?success=수정이 완료되었습니다!!");
            exit();
        }else{
          header("location:register_modify.php?error=수정이 실패되었습니다");
          exit();
        }
    }
}else{
    header("location:register_modify.php?error=알수없는 오류");
      exit();
}

?>