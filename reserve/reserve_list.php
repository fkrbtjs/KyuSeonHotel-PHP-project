<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/reserve.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a26d62cab7.js" crossorigin="anonymous"></script>
    <script src="../js/main.js"></script>
    <title>Reserve</title>
</head>
<body> 
    <header>
        <?php include "../main/header.php"; ?>
    </header>
    <section>
        <div class="main">
            <h1>객실선택</h1>
            <ul>
                <li>
                    <img src="../img/room-1.jpg" alt="">
                    <div class="inform">
                        <h2>그랜드 디럭스 더블</h2>
                        <span>전망 시티뷰 / 리버뷰 / 전망욕실 | 객실면적 40~50 ㎡</span>
                        <span><strong>200,000 KRW</strong> / 1Day</span>
                        <button type="button" onclick="location.href='reserve_form.php?type=그랜드 디럭스 더블'">예약하기</button>
                    </div>
                </li>
                <li>
                    <img src="../img/room-2.jpg" alt="">
                    <div class="inform">
                        <h2>프리미어 더블</h2>
                        <span>전망 시티뷰 / 리버뷰 / 전망욕실 | 객실면적 46~60 ㎡</span>
                        <span><strong>500,000 KRW</strong> / 1Day</span>
                        <button type="button" onclick="location.href='reserve_form.php?type=프리미어 더블'">예약하기</button>
                    </div>
                </li>
                <li>
                    <img src="../img/room-3.jpg" alt="">
                    <div class="inform">
                        <h2>스위트 더블</h2>
                        <span>전망 시티뷰 / 리버뷰 / 전망욕실 | 객실면적 59~73 ㎡</span>
                        <span><strong>700,000 KRW</strong> / 1Day</span>
                        <button type="button" onclick="location.href='reserve_form.php?type=스위트 더블'">예약하기</button>
                    </div>
                </li>
                <li>
                    <img src="../img/room-4.jpg" alt="">
                    <div class="inform">
                        <h2>로얄 스위트</h2>
                        <span>전망 시티뷰 / 리버뷰 / 전망욕실 | 객실면적 353 ㎡</span>
                        <span><strong>1,000,000 KRW</strong> / 1Day</span>
                        <button type="button" onclick="location.href='reserve_form.php?type=로얄 스위트'">예약하기</button>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <footer>
        <?php include "../main/footer.php";?>
    </footer>
</body>
</html>