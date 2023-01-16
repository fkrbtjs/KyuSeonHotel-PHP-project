<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="../css/message.css">
        <link
            href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR&display=swap"
            rel="stylesheet">
        <script src="https://kit.fontawesome.com/a26d62cab7.js" crossorigin="anonymous"></script>
        <script src="../js/message.js"></script>
        <title>Kyuseon Hotel</title>
    </head>
    <body>
        <header>
            <?php include "../main/header.php";?>
        </header>
        <section>
            <h1>
            <?php
            include ('../db/main_db.php');
              //1 데이터베이스 include한다
              //2 전역변수를 한줄로 선언한다
              //3 $_POST isset() empty()
              //4 보안코딩
              //5 에러코딩체크
              //7 select
            $mode = $_GET["mode"];
            $num  = $_GET["num"];

            $sql = "select * from message where num=$num";
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_array($result);

            $send_id    = $row["send_id"];
            $rv_id      = $row["rv_id"];
            $regist_day = $row["regist_day"];
            $subject    = $row["subject"];
            $content    = $row["content"];

            $content = str_replace(" ", "&nbsp;", $content);
            $content = str_replace("\n", "<br>", $content);

            if ($mode=="send")
              $result2 = mysqli_query($con, "select name from members where id='$rv_id'");
            else
              $result2 = mysqli_query($con, "select name from members where id='$send_id'");

            $record = mysqli_fetch_array($result2);
            $msg_name = $record["name"];

            if ($mode=="send")	    	
                echo "송신함 > 내용보기";
            else
              echo "수신함 > 내용보기";

            //db닫기
            mysqli_close($con); 
          ?>
            </h1>
            <div class="list">
                <ul id="message">
                    <li>
                        <span class="col2"><b>제목 : <?=$subject?></b></span>
                        <span class="col3"><?=$msg_name?> | <?=$regist_day?></span>
                    </li>
                    <li class="content">
                      <?=$content?>
                    </li>
                </ul>
                <ul class="buttons">
                <li><button onclick="location.href='message_box.php?mode=rv'">수신함</button></li>
                <li><button onclick="location.href='message_box.php?mode=send'">송신함</button></li>
                <li><button onclick="location.href='message_response.php?num=<?=$num?>'">답변</button></li>
                <li><button onclick="location.href='message_delete.php?num=<?=$num?>&mode=<?=$mode?>'">삭제</button></li>
                </ul>
              </div> <!-- message_box -->    
                
        </section>
        <footer>
            <?php include "../main/footer.php";?>
        </footer>
    </body>
</html>