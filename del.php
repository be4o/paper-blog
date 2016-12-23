<?php
	include_once('dbcon.php');
	if(isset($_GET['table'])){
		$query = "delete from $_GET[table] where $_GET[pkname] = '$_GET[pkval]'";
		
		mysql_query($query);
		header("Location:$_GET[page]");
	}

?>