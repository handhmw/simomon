<?php

  $filesize = 1048576 * 100;

  if(isset($_POST['d'])) {

    header('Cache-Control: no-cache');
    header('Content-Transfer-Encoding: binary');
    header('Content-Length: '. $filesize);

    for($i = 0 ; $i < $filesize ; $i++) {
      echo chr(255);
    }

  }

?>
