<?php
   session_start();
   $userlevel = isset($_SESSION['userlevel']) ? $userlevel = $_SESSION['userlevel'] : ""; 

   if ( $userlevel != 'admin' ) {
         echo("
               <script>
               alert('관리자가 아닙니다! 회원정보 수정은 관리자만 가능합니다!');
               history.go(-1)
               </script>
         ");
         exit;
   }

   include('../db/main_db.php');
   $mode = $_GET["mode"];

   switch ($mode) {
      case "update" : {     
         $num   = $_POST["num"];
         $level = $_POST["level"];
         $point = $_POST["point"];
         $name = $_POST["name"];
         $sql = "update members set level= '$level', point= $point where num = $num";
         mysqli_query($con, $sql);
         break;
      }

      case "delete" : {
         $num   = $_GET["num"];
         $sql = "delete from members where num = $num";
         mysqli_query($con, $sql);
         break;
      }

      case "board_delete" : {
         if (isset($_POST["item"])) {
            $num_item = count($_POST["item"]); 
         }   else {
            echo("
            <script>
            alert('삭제할 게시글을 선택해주세요!');
            history.go(-1)
            </script>
            ");
         }
         
            for($i = 0; $i < $num_item; $i++){               
               $num = $_POST["item"][$i];              
               $sql = "select * from image_board where num = $num";
               $result = mysqli_query($con, $sql);
               $row = mysqli_fetch_array($result);               
               $copied_name = $row["file_copied"];
               
               if ($copied_name) {
                  $file_path = "./data/".$copied_name;
                  unlink($file_path);
               }              
               $sql = "delete from image_board where num = $num";
               mysqli_query($con, $sql);
            }   
         break;
      }
   }
   
   mysqli_close($con);

   echo 
   "
      <script>
            location.href = 'admin.php';
      </script>
   ";
?>
