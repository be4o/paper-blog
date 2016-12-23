<?php
	include_once('dbcon.php');
	include_once('classes/postclass.php'); 
	
	$pkval="";
	$post = new post();
	$post->ptitle =$_POST['ptitle'];
	$post->pbody =$_POST['pbody'];
	if(isset($_GET['pkval'])){
		$Editmsg = "Edit Post";
		$post->findbypostid($_GET['pkval']);
		
	}else
		$Editmsg = "Add New Post";
	if(isset($_POST['submit'])){		
		if($_POST['edit'] == "Edit Post" ){
			$msg = $post->update($_POST['pid'],$_POST['ptitle'],$_POST['pbody'],$_FILES['pimage'][tmp_name]);
			$pkval = $_POST['pid'];
		}else
			$msg = $post->add($_POST['ptitle'],$_POST['pbody'],$_FILES['pimage']['tmp_name']);
    }
include_once('header.php');
?>
<h1><?=$Editmsg?></h1>

<form method="post" action="post.php" enctype="multipart/form-data">
	<input type="text" name="ptitle" placeholder="Post Title" value="<?=$post->ptitle?>"/>	
	<input type="hidden" name="edit" value="<?=$Editmsg?>"/>
	<input type="hidden" name="pid" value="<?=$post->pid?>"/>
	<textarea  rows="5" cols="70" name="pbody"><?=$post->pbody?></textarea>
	<input type="file" max_file_size="3000" name="pimage"/>
	<button type="submit" name="submit" id="submit">POST</button>
</form>
<?=$msg?></br>
<div>
</br>
<img src="<?=$post->pimage ?>" width="300" height="300" alt="Post Image"/>
</div>
</div>
</div>
<?php
include_once('footer.html');
?>