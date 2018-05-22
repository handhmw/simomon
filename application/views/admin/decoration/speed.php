<?php
  # PHP file that will be used to download and upload binary data
  
  # Set Download Filesize
  $filesize = 1048576 * 100; // filesize measuredin Bits ( 20971520 bits = 20 Megabits ) or ( 1048576 * 20 bits = 20 Megabits )

  if(isset($_POST['d'])) {

    header('Cache-Control: no-cache');
    header('Content-Transfer-Encoding: binary');
    header('Content-Length: '. $filesize);

    for($i = 0 ; $i < $filesize ; $i++) {
      echo chr(255);
    }

  }

?>
