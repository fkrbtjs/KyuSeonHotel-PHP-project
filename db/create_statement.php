<?php
 include_once $_SERVER['DOCUMENT_ROOT']."/hotel/db/main_db.php";
 include_once $_SERVER['DOCUMENT_ROOT']."/hotel/db/create_table.php";

 //테이블
 create_table($con,"image_board");
 create_table($con,"members");
 create_table($con,"message");
 create_table($con,"reservation");

?>
