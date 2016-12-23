<?php
	include_once('dbcon.php');
	include_once('classes/postclass.php'); 
	$t="";
	$b="";
	if(isset($_POST['submit'])){
		$t=$_POST['search'];
		
		$post = new post();
		$msg = $post->search("title",$_POST['search'],"searchpost.php");
		if(mysql_errno() > 0)
			$msg = "Error ".mysql_error();
			
    }

?>
<h1>Search For Post</h1>

<form method="post" action="searchpost.php">
	<input type="text" name="search" placeholder="Search Value" value="<?=$t?>"/>	
	
	
	<button type="submit" name="submit" id="submit">POST</button>
</form>
<?=$msg?></br>

