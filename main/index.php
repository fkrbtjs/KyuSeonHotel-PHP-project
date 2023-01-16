<?php
	include_once $_SERVER['DOCUMENT_ROOT']."/hotel/db/create_statement.php";
    if (isset($_GET) && !empty( $_GET)){
        $sm = $_GET['success'];
        if ($sm) {
         echo "
         <script>
         alert(`${sm}`); 
         </script>
         ";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a26d62cab7.js" crossorigin="anonymous"></script>
    <script src="../js/main.js"></script>
    <title>Kyuseon Hotel</title>
</head>
<body onload="slide_show()">
    <header>
        <?php include "header.php";?>
    </header>
    <section>
        <?php include "main.php";?> 
    </section>
    <footer>
        <?php include "footer.php";?> 
    </footer>
</body>
</html>