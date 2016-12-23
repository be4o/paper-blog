<?php
if(isset($_POST['submit']))
{
	$name = $_POST['username'];
			$pass = $_POST['userpass'];
	$msg="";
	if(empty($_POST['username']))
	{
		$msg.="USERNAME IS REQUIRED";
	}
	else if(empty($_POST['userpass']))
	{
		$msg.="PASSWORD IS REQUIRED";		
	}
	else
	{
		mysql_connect("localhost","root","root");
		mysql_select_db("blog");
		mysql_query("insert into users values('$_POST[username]','$_POST[userpass]')");
		if(mysql_errno() == 0){
			//$msg="<p style='color:green;font-size:25px;'>Succes</p>";
			setcookie('user',$name);
			header('Location:index.php');
		}
		else if(mysql_errno() == 1062){
			
			$msg="Username is not available.";
		}
	}
}

include_once("header.php");
?>


	<?=$msg ?>
<form action="contact.php" method="post" name="signup" >
	<input type="text" name="username" id="username" placeholder="USERNAME" value='<?=$name ?>' />
	<input type="password" name="userpass" id="userpass" placeholder="PassWord" value='<?=$pass ?>'/>
 	<button type="submit" id="submit" name="submit">Submit</button>
</form>

</div>
</div>
<?php
include_once("footer.html");
?>
<script>
	window.onload=function (){	document.getElementById("templatemo_menu").childNodes[0].nextElementSibling.children[0].children[0].className="";	document.getElementById("templatemo_menu").childNodes[0].nextElementSibling.children[5].children[0].className="current";
	}

</script>


