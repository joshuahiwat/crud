<?php
  require_once('query_connector.class.php');

  $postFile = new QueryConnector();
  $test_echo = $postFile->processing('read', 'test', array('column1', 'column2'));

  echo '<pre>';
  var_dump($test_echo);
?>
