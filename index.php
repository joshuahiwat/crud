<?php
require_once('control/query_connector.class.php');

$postFile = new QueryConnector();

if($_SERVER['REQUEST_METHOD'] == 'POST'):
	$errors = [];

	// error meldingen 

	if(count($errors) == 0):

		$postFile->processing('create', 'test', array('column1' => $_POST['column1'], 'column2' => $_POST['column2']));

		echo 'Het product is succesvol toegevoegd.';
	else:
		echo 'Er ging wat mis. De volgende dingen gingen fout:<ul><li>' . join('</li><li>', $errors) . '</li></ul>De gebruiker is niet toegevoegd.';
	endif;
endif;

if(!isset($added)): ?>
	<form action="" method="post">
		<input name="column1" type="text" /><br/>
		<input name="column2" type="text" /><br/>
		<button type="submit" value="send">send</button>
	</form>
<?php endif; ?>
