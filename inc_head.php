<?php
  session_start();
  if(!isset($_SESSION['id'])) {
    echo "<script>alert('권한이 없습니다');</script>";
    echo "<script>location.href='login.php';</script>";
  }
?>