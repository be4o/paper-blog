<?php
	include_once('header.php');
	
		if(isset($_COOKIE['user']) && !empty($_COOKIE['user']))
		$cook = "<h3 style='dislay:inline'>WELCOME --  $_COOKIE[user] -- <a href='logout.php'>Logout</a></h3> ";
	
	include_once("dbcom.php");
	include_once("classes/postclass.php");
	include_once("classes/commentclass.php");
	$post =new post();
	$comment = new comment();
	
		if( isset($_GET['pid']) ){
		    $posts = $post->getpost( $_GET['pid'] );	
		}			
		else
		{
			$posts = $post->getpost(0);
		}
	if(isset($_GET['comment'])){
		$com =  $post->getcommentofpost($_GET['pid']);
	}else
		$com = "</div>";	
		
	//if(isset($_POST['addcom'])){
		//$comment->add($_COOKIE['user'],$_GET['pid'],$_POST['ctext']);		
		//$id = $_GET['pid'];
		//header("location:index.php?pid=9&comment=true");
	//}
?>
	<?=$cook?>
	<?=$posts?>
	<?=$com?>			

		
</div></div>
<script>
	window.onload = function(){
		
	document.getElementById("addcom").onclick =function (){
		console.log("button add clicked");
		var username = "<?=$_COOKIE['user']?>";
		var pid = <?=$_GET['pid']?>;
		var comment =  document.getElementById("ctext").value;
		console.log(username);console.log(pid);console.log(comment);
		var req = new XMLHttpRequest();
		req.onreadystatechange = function(){ 
			if(req.readyState==4 && req.status == 200){
				document.getElementById("coms").innerHTML = req.responseText;
				console.log(req.responseText);
				console.log("after response");
			}
		}
		req.open("GET","addcomment.php?username="+username+"&pid="+pid+"&comment="+comment,true);
		req.send();
	}}
</script>
<?php
include_once('footer.html');
?>