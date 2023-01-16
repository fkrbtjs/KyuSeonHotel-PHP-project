<meta charset='utf-8'>

<?php
    //1 데이터베이스 include한다
		include ('../db/main_db.php');
    //2 전역변수를 한줄로 선언한다
    //3 $_GET isset() 
    //4 보안코딩
    //5 에러코딩체크
    //7 select

	$num = $_GET["num"];
	$mode = $_GET["mode"];

	$sql = "delete from message where num=$num";
	mysqli_query($con, $sql);
	mysqli_close($con);                // DB 연결 끊기

	if($mode == "send")
		$url = "message_box.php?mode=send";
	else
		$url = "message_box.php?mode=rv";
	echo "
	<script>
		location.href = '$url';
	</script>
	";
?>

  
