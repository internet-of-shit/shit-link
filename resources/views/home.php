<?php
/*
  Just load our static site build with something else than php.. 'cuz frontend and php sucks.
*/
echo file_get_contents(app()->basePath() . '/public/home.html');
?>
