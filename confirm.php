<?php
  session_start();
  require('config.php');
  require('header.php');

// GET LIST OF URLS FOR NEXTDRAFT!!!! */
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

  //echo "<span>Today there are ".sizeof($payload)." articles.</span><br>" ;
  echo "<a class='button' href='queue.php'>Add ".sizeof($payload)." new articles to queue</a>";
  require('footer.php');
?>
