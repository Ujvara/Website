<?php
  session_start();

  session_destroy();

  header("location:ContactUs.php");
?>