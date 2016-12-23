<?php
	include_once('dbcon.php');
	$q ="";
	if(isset($_POST['submit'])){
		$msg = searchgrid($_POST['query'],$_POST['update'],$_POST['del'],"index.php","generalquery.php");
		$q = $_POST['query'];
	}
?>


<form method="post" action="generalquery.php" style="position:relative;">
	Delete <input type="checkbox" name="del" /> Update <input type="checkbox" name="update" /></br>
	<textarea rows="5" cols="70" name="query"><?=$q?></textarea></br></br>
	<button type="submit" name="submit">RUN</button>
</form>

<?=$msg?>
