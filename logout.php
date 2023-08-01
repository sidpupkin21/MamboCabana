<?php 

  require('admin/db/funcs.php');

  session_start();
  session_destroy();
  redirect('index.php');

?>