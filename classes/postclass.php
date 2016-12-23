<?php
include_once('dbcon.php');
include_once('utility.php');
class post{
	var $pid, $ptitle, $pbody, $pdate, $pby, $likes, $pimage;
	
	function getlastpostid(){
		$res = mysql_query("select max(id) from posts");		
		$row = mysql_fetch_row($res);
		return $row[0];
	}
	
	function add($ptitle, $pbody, $file){
		mysql_query("insert into posts(title,date,postby,body) values('$ptitle',now(),'$_COOKIE[user]','$pbody')");
		$this->pid = $this->getlastpostid(); 
		$msg = returnmsg("ADDED");
		$this->pimage = "post_images/".$this->pid.".jpg";
		uploadFile($file,$this->pid.".jpg");
		return $msg;
	}
	
	function update($pid,$ptitle, $pbody,$file){
		mysql_query("update posts set title='$ptitle',body='$pbody' where id=$pid");
		
		$this->pid = $pid;
		$msg = returnmsg("UODATED");
		$this->pimage = "post_images/".$this->pid.".jpg";
		$msg .= "</br>".uploadFile($file,$pid.".jpg");
		return $msg;
	}
	
	function remove($pid){
		mysql_query("delete from posts where id=$pid");
		return returnmsg("DELETED");
	}
	
	
	
	function findbypostid($pid){
		$res = mysql_query("select * from posts where id = $pid");	
		$row = mysql_fetch_row($res);
		$this->pid = $row[0];
		$this->ptitle = $row[1];
		$this->pdate = $row[2];
		$this->pby = $row[3];
		$this->pbody = $row[4];
		$this->likes = $row[5];
		$this->pimage = "post_images\\$row[0].jpg";
	}
	function search($field,$val,$page,$con="like"){
		if($con=="like"){
			$query = "select * from posts where $field like '%$val%'";			
		}else
			$query = "select * from posts where $field $con '%$val%'";
		$msg = searchgrid($query,true,true,"post.php",$page);
		return $msg;
	}
	function getpost($id=0){
		$phtml="";
		if($id == 0){
			$res = mysql_query("select * from posts order by id desc");
			while($row = mysql_fetch_row($res)){
				$phtml .= "<div class=\"post_section\"><h2><a href=\"#\">$row[1]</a></h2><div class=\"post_content\">$row[2] written by <a href=\"http://www.templatemo.com\"target=\"_parent\">$row[3]</a><a href=\"#\"><img src=\"post_images/$row[0].jpg\" alt=\"image\" /></a><p>$row[4]</p><a href=\"#\">Continue reading...</a> | <a href=\"index.php?pid=$row[0]&comment=true\">Comments (286)</a> | $row[5] <a href=\"#\">like</a>";
				   
			if(isset($_COOKIE['user']) && $_COOKIE['user'] == 'admin')
				$phtml .=  " | <a href=\"post.php?pkval=$row[0]\">Edit</a> | <a href=\"del.php?table=posts&pkname=id&pkval=$row[0]&page=index.php\">Remove</a>";
			$phtml .="</div></div>";
			}
		}else{
			$this->findbypostid($id);
			$phtml .= "<div class=\"post_section\"><h2><a href=\"#\">$this->ptitle</a></h2><div class=\"post_content\">$this->pdate written by <a href=\"http://www.templatemo.com\"target=\"_parent\">$this->pby</a><a href=\"#\"><img src=\"$this->pimage\" alt=\"image\" /></a><p>$this->pbody</p><a href=\"#\">Continue reading...</a> | <a href=\"index.php?pid=$this->pid&comment=true\">Comments (286)</a> | $this->likes <a href=\"#\">like</a>";
				   
			if(isset($_COOKIE['user']) && $_COOKIE['user'] == 'admin')
				$phtml .=  " | <a href=\"post.php?pkval=$this->pid\">Edit</a> | <a href=\"del.php?table=posts&pkname=id&pkval=$this->pid&page=index.php\">Remove</a></div>";	
		}
		
		return $phtml;		
	}
	function getlastposts($count){
		$query = "select * from posts order by id desc limit $count";
		$res = mysql_query($query);
		while($row = mysql_fetch_row($res)){
			if( strlen($row[4]) > 90 )
				$pb = substr($row[4],0,60)."...";
			else
				$pb = $row[4];
			$rphtml .= "<div class=\"news_box\"><h3><a href=\"index.php?pid=$row[0]\">$row[1]</a></h3><p>$pb</p></div>";
		}
		return $rphtml;
	}
	function getcommentofpost($id){
		$q = "select * from post_comments where pid = $id";
		$res = mysql_query($q);
		$chtml ="<div class=\"comments\" id='coms'>";
		$pkname = mysql_field_name($res,0);
		while($row = mysql_fetch_row($res) ){			
			$chtml .= "<div class=\"pcomment\">					
					<p><span>$row[1]: </span> $row[3]";
					if($_COOKIE['user'] == admin || $_COOKIE['user'] == $row[1])
					$chtml .="<a href='del.php?table=post_comments&pkname=$pkname&pkval=$row[0]&page=index.php'  id=\"del\">X</a>";
				  
					$chtml .="</p></div>";
		}
		$chtml .="<form method=\"post\" action=\"index.php?pid=$id\" >
					<input type=\"text\" name=\"ctext\" id=\"ctext\" />
					
				</form><button type=\"submit\" name=\"addcom\" id=\"addcom\">Comment</button>		
			</div></div>";
		return $chtml;
	}
}
?>