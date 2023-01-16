<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/message.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a26d62cab7.js" crossorigin="anonymous"></script>
    <script src="../js/message.js"></script>
    <title>Kyuseon Hotel</title>
</head>
<body>
    <header>
        <?php include "../main/header.php";?>
    </header>
    <?php
	if (!isset($userid) || empty($userid))
	{
		echo("<script>
				alert('로그인 후 이용해주세요!');
				history.go(-1);
				</script>
			");
		exit;
	}
    ?>
    <section>
        <h1>문의하기</h1>
        <form  name="message_form" method="post" action="message_server.php">
            <input type ="hidden" name="send_id" value ="<?=$userid?>" />    
            <ul class="top_buttons">
				<li><a href="message_box.php?mode=rv">수신함 </a></li>
				<li><a href="message_box.php?mode=send">송신함</a></li>
		    </ul>
            <div class="write_msg">
	    	    <ul>
	    		<li>
	    			<span class="col1">유형 : </span>
	    			<select name="kind" id="kind">
                        <option value="객실예약">객실예약</option>
                        <option value="회원가입">회원가입</option>
                        <option value="포인트적립/사용">포인트적립/사용</option>
                        <option value="기타">기타</option>
                    </select>
	    		</li>	    	
	    		<li>
	    			<span class="col1">제목 : </span>
	    			<input name="subject" type="text">
	    		</li>	    	
	    		<li class="text_area">	
	    			<span class="col1">내용 : </span>
	    			<span class="col2"><textarea name="content"></textarea></span>
	    			
	    		</li>
	    	    </ul>
	    	</div>	    	
            <button type="button" onclick="check_input()">보내기</button>
	    </form>
    </section>
    <footer>
        <?php include "../main/footer.php";?> 
    </footer>
</body>
</html>