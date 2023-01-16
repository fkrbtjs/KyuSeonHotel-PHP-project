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
    <section>
        <h1>답변 보내기</h1>
        <?php
        //1 데이터베이스 include한다
        include ('../db/main_db.php');
        //2 전역변수를 한줄로 선언한다
        //3 $_GET isset() 
        //4 보안코딩
        //5 에러코딩체크
        //7 select
        $num  = $_GET["num"];

        $sql = "select * from message where num=$num";
        $result = mysqli_query($con, $sql);

        $row = mysqli_fetch_array($result);
        $send_id = $row["send_id"];
        $rv_id = $row["rv_id"];
        $kind = $row["kind"];
        $subject = $row["subject"];
        $content = $row["content"];

        $subject = "RE: ".$subject."  /  TO: ".$send_id; 

        $content = "> ".$content; 
        $content = str_replace("\n", "\n>", $content);
        $content = "\n\n\n=============================================\n".$content;

        $result2 = mysqli_query($con, "select name from members where id='$send_id'");
        $record = mysqli_fetch_array($result2);
        $send_name  = $record["name"];
      ?>		
        <form  name="message_form" method="post" action="message_server.php">
            <input type ="hidden" name="rv_id" value ="<?=$send_id?>" />    
            <input type ="hidden" name="send_id" value ="<?=$rv_id?>" />    
            <input type ="hidden" name="kind" value ="<?=$kind?>" />    
            <div class="write_msg">
	    	    <ul>
	    		<li>
	    			<span class="col1">유형 : </span>
	    			<span><?=$kind?></span>
	    		</li>	    	
	    		<li>
	    			<span class="col1">제목 : </span>
	    			<input name="subject" type="text" value="<?=$subject?>">
	    		</li>	    	
	    		<li class="text_area">	
	    			<span class="col1">내용 : </span>
	    			<span class="col2"><textarea name="content"><?=$content?></textarea></span>
	    			
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