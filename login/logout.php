<?php
  session_start();
  unset($_SESSION["userid"]);
  unset($_SESSION["username"]);
  unset($_SESSION["userlevel"]);
  unset($_SESSION["userpoint"]);
  
  echo("
       <script>
          location.href = '../main/index.php';
         </script>
       ");
?>
