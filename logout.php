<?php
  session_start();
  session_destroy();
  require('header.php');
  	echo '<span>Later gator!</span>';
  	echo '<a href="./" class="button">Start over</a>';
  require('footer.php');
?>
