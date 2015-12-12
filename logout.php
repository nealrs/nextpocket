<?php
  session_start();
  session_destroy();
  header('Location: index.php');
  /*
  require('header.php');
  	echo '<span>Later gator!</span>';
  	echo '<a href="./" class="button">Log in again</a>';
  require('footer.php');*/
?>
