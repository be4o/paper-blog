<?php
	include_once('dbcon.php');
	include_once('classes/postclass.php');
if(isset($_GET['username'])){
	$v1 = $_GET['username'];
	$v2 = $_GET['pid'];
	$v3 = $_GET['comment'];
		mysql_query("insert into post_comments(username, pid, comment, cdate) values('$v1',$v2,'$v3',now())");	
	$post = new post();
	 echo $post->getcommentofpost($v2);
	 
}
?>