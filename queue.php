<?php
  session_start();
  error_reporting(0);
  require('config.php');
  require('header.php');
  $url = 'https://getpocket.com/v3/add';

  //echo $_SESSION['to_queue'];
// ITERATE THROUGH LINKS AND QUEUE THEM.
  foreach ($_SESSION['to_queue'] as $link){
    $data = array(
  		'consumer_key' => $consumer_key,
  		'access_token' => $_SESSION['access_token'],
  		'url' => $link
  	);
    //echo $data;

    $options = array(
  		'http' => array(
  			'method'  => 'POST',
  			'content' => http_build_query($data)
  		)
  	);

    $context  = stream_context_create($options);
  	$result = file_get_contents($url, false, $context);
    //print_r ($result);
  }

	echo "<span>Booyah! ".sizeof($_SESSION['to_queue'])." articles queued.</span><br>";
	echo "<a class='button' href='logout.php'>Log out</a>";
  $_SESSION['to_queue'] = '';
	require('footer.php');
?>
