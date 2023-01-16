<meta charset='utf-8'>
<?php
 //1 데이터베이스 include한다
 include('../db/main_db.php');
 //2 전역변수를 한줄로 선언한다
 $send_id = $rv_id = $kind = $subject = $content = $regist_day = "";
 //3 $_POST isset() empty()

if (isset($_POST['send_id']) &&  isset($_POST['kind']) && isset($_POST['subject']) && isset($_POST['content'])) {
    //4 보안코딩
    $send_id = $_POST["send_id"];
    if(isset($_POST['rv_id'])){
			$rv_id= $_POST['rv_id'];
		}else{
			$rv_id = 'KyuSeonHotel';
		}
    $kind = $_POST["kind"];
    $subject = $_POST["subject"];
    $content = $_POST["content"];
    $regist_day = date("Y-m-d (H:i)");
    $subject = htmlspecialchars($subject, ENT_QUOTES);
		$content = htmlspecialchars($content, ENT_QUOTES);
    
    // if(!$send_id) {
	// 	echo("
	// 		<script>
	// 		alert('로그인 후 이용해 주세요! ');
	// 		history.go(-1)
	// 		</script>
	// 		");
	// 	exit;
	// }
			
  $sql = "select * from members where id='$rv_id'";
	$result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result)==1)
	{
		$sql = "insert into message (send_id, rv_id, kind , subject, content,  regist_day) ";
		$sql .= "values('$send_id', '$rv_id', '$kind' , '$subject', '$content', '$regist_day')";
		mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행
	} else {
		echo("
			<script>
			alert('수신 아이디가 잘못 되었습니다!');
			history.go(-1)
			</script>
			");
		exit;
	}
	mysqli_close($con);                // DB 연결 끊기
	echo "
	   <script>
	    location.href = 'message_box.php?mode=send';
	   </script>
	";
}
?>

  
