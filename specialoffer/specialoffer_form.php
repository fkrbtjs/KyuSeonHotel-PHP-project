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
    <script>
  function check_input() {
    if (!document.board_form.subject.value) {
      alert("제목을 입력하세요!");
      document.board_form.subject.focus();
      return;
    }
    if (!document.board_form.content.value) {
      alert("내용을 입력하세요!");
      document.board_form.content.focus();
      return;
    }
    document.board_form.submit();
  }
  </script>
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
        <h1>스페셜 오퍼 > 글쓰기</h1>
        <form  name="board_form" method="post" action="specialoffer_dui.php" enctype="multipart/form-data">
        <input type="hidden" name="mode" value="insert">  
            <div class="write_msg">
	    	    <ul>	    	
	    		<li>
	    			<span class="col1">제목 : </span>
	    			<input name="subject" type="text">
	    		</li>	    	
	    		<li class="text_area">	
	    			<span class="col1">내용 : </span>
	    			<span class="col2"><textarea name="content"></textarea></span>
	    			
	    		</li>
                <li>
                    <span class="col1">첨부 파일 : </span>
                    <span class="col2"><input type="file" name="upfile"></span>
                </li>
	    	    </ul>
	    	</div>	    	
            <ul class="buttons">
          <li><button type="button" onclick="check_input()">저장</button></li>
          <li><button type="button" onclick="location.href='specialoffer_list.php'">목록</button></li>
        </ul>
	    </form>
    </section>
    <footer>
        <?php include "../main/footer.php";?> 
    </footer>
</body>
</html>