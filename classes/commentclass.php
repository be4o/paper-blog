<?php
	include_once('dbcon.php');
	include_once('utility.php');
	class comment{
		var $cid,$username,$pid,$comment,$cdate;
	
		function add($username, $pid, $comment){
			mysql_query("insert into post_comments(username, pid, comment, cdate) values('$username',$pid,'$comment',now())");
			
			if(mysql_errno() >0)
				return mysql_error();
				else					
			return "comment added successfully";
		}
	
	}
?>