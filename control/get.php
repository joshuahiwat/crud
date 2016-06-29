<?php
  require_once('query_connector.class.php');

  $postFile = new QueryConnector();
  $postFile->processing('create', 'test', array('column1' => 'help', 'column2' => 'help', 'id' => '3'));

  //$postFile->processing('type_crud', 'table_name', array('column_name' => 'Column_waarde'));
?>