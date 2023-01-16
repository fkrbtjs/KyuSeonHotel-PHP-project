<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>PHP 프로그래밍 입문</title>
  <link rel="stylesheet" type="text/css" href="../css/main.css">
  <link rel="stylesheet" type="text/css" href="../css/specialoffer.css">
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
</head>

<body>
  <header>
    <?php include "../main/header.php";?>
  </header>
  <section>
    <div class="board_box">
      <h1 class="board_title">
        스페셜 오퍼 > 글 작성
      </h1>
      <!-- enctype="multipart/form-data" 이것을 하지 않으면 파일업로드 되지 않음 : 명심 -->
      <form name="board_form" method="post" action="specialoffer_dui.php" enctype="multipart/form-data">
        <input type="hidden" name="mode" value="insert">
        <ul class="board_form">
          <li>
            <span class="col1">제목 : </span>
            <span class="col2"><input name="subject" type="text"></span>
          </li>
          <li class="text_area">
            <span class="col1">내용 : </span>
            <span class="col2">
              <textarea name="content"></textarea>
            </span>
          </li>
          <li>
            <span class="col1"> 첨부 파일</span>
            <span class="col2"><input type="file" name="upfile"></span>
          </li>
        </ul>
        <ul class="buttons">
          <li><button type="button" onclick="check_input()">저장</button></li>
          <li><button type="button" onclick="location.href='specialoffer_list.php'">목록</button></li>
        </ul>
      </form>
    </div> <!-- board_box -->
  </section>
  <footer>
    <?php include "../main/footer.php";?>
  </footer>
</body>

</html>