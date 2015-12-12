<?php
  session_start();
  require('header.php');
  if ($_SESSION['access_token'] && $_SESSION['access_token']!=''){
    // GET LIST OF URLS FOR NEXTDRAFT!!!!
    libxml_use_internal_errors(TRUE);
    $dom = new DOMDocument;
    $dom->loadHTMLFile('http://nextdraft.com/current');
    libxml_clear_errors();

    $xp = new DOMXpath($dom);
    $links = $xp->query('//div[@class="blurb-content"]/p/a/@href');
    $payload = array();

    for ($i = 0; $i < $links->length; $i++) {
      $payload[] = $links->item($i)->nodeValue;
    }

    // STORE URLS FOR LATERS
    $_SESSION['to_queue'] = $payload;

    echo "<a class='button' href='queue.php'>Enqueue ".sizeof($payload)." new articles</a>";
    echo "&nbsp;&nbsp;<a class='button' href='logout.php'>Log out</a>";
  } else {
      echo "<a href='get-request-token.php' class='button'>Login with Pocket</a>
      <br><br>
      <p>Based on Jesse Shawl's <a href='http://jshawl.com/unqueue/'>Unqueue</a></p>";
    }
  require('footer.php');
?>
