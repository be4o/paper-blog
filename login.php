<?php
if(isset($_COOKIE['user']) && !empty($_COOKIE['user']))
	header('Location:index.php');
if(isset($_POST['submit']))
{
	$msg="";
	$name = $_POST['username'];
	$pass = $_POST['userpass'];
	mysql_connect('localhost','root','root');
	mysql_select_db('blog');
	mysql_query("select * from users where name='$_POST[username]' and userpass='$_POST[userpass]'");
	if(mysql_errno())
		$msg .= "ERROR ".mysql_errno();
	if(mysql_affected_rows() == 1)
	{
		if(isset($_POST['rem']))
			setcookie('user',$_POST['username'],time()+60*60*24*365);
		else
			setcookie('user',$_POST['username']);
		header('Location: index.php');
	}
	else
		$msg .= "<h1>invalid</h1>";
	
}
include_once('header.php');
?>
<?= $msg; ?>
<form method="post" action="login.php">
	<input type="text" id="username" name="username" placeholder="username" value='<?= $name?>'/>
	<input type="password"	id="userpass" name="userpass" placeholder="password" value='<?= $pass?>'/>
	<input type="checkbox" name="rem" value="checked"style="display:inline">remember me
	<button type="submit" name="submit" id="submit" style="display:block">Login</button>
</form>
</div>
</div>
<?php
include_once('footer.html');
?>
	