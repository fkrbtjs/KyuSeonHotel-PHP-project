<?php
session_start();

include('../db/main_db.php');

$id = $name = $total_rate = $point = $level = $check_in = $check_out = $person = $breakfast = $room_type = $request = $reserve_day ="";

if(isset($_POST['check_in'])  && isset($_POST['total_rate']) && isset($_SESSION['username']) && isset($_SESSION['userid']) && isset($_POST['check_out']) && isset($_POST['person']) && isset($_POST['breakfast']) && isset($_POST['request']) ){
    
    $id   = $_SESSION["userid"];
    $name = $_SESSION["username"];
    $point   = $_SESSION["userpoint"];
    $level = $_SESSION["userlevel"];
    $total_rate = $_POST["total_rate"];
    $check_in = $_POST["check_in"];
    $check_out = $_POST["check_out"];
    $person  = $_POST["person"];
    $breakfast  = $_POST["breakfast"];
    $room_type = $_POST["room_type"];
    $request  = $_POST["request"];
    $reserve_day = date("Y-m-d (H:i)");

     

    //7 insert
    $sql_insert = "insert into reservation(id, name , check_in, check_out , person , breakfast, room_type, request, total_rate, reserve_day) ";
    $sql_insert .= "values('$id', '$name', '$check_in', '$check_out' , '$person', '$breakfast','$room_type', '$request' ,'$total_rate', '$reserve_day')";
    $result = mysqli_query($con, $sql_insert);  // $sql 에 저장된 명령 실행
    
    // mysqli_close($con);
    if($result){
        $point_up = $total_rate / 1000;
        $sql = "select point from members where id='$id'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);
        $new_point = $row["point"] + $point_up;
        if($new_point>0){
            $new_level = "Member";
        }
        if($new_point>3000){
            $new_level = "Silver";
        }
        if($new_point>5000){
            $new_level = "Gold";
        }
        if($new_point>8000){
            $new_level = "Platinum";
        }
        if($new_point>10000){
            $new_level = "Vip";
        }
        $sql_update = "update members set point='$new_point' , level='$new_level'";
        $sql_update .= " where id='$id'";
        $result = mysqli_query($con, $sql_update);  // $sql 에 저장된 명령 실행
        mysqli_close($con);
        session_start();
        $_SESSION["userpoint"] = $new_point;
        $_SESSION["userlevel"] = $new_level;
        header("location:../main/index.php?success=예약이 완료되었습니다!!");
        exit();
    }else{
        header("location:reserve_form.php?error=예약이 실패되었습니다");
        exit();
    }
    
}else{
    header("location:reserve_form.php?error=알수없는 오류");
      exit();
}

?>