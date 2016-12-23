<?php
    mysql_connect('localhost','root','root');
	mysql_select_db('blog');
	$Q = $_GET['q'];
	if(isset($_GET['q'])){
		$res = mysql_query("select * from search where name like '$Q%'");
		$tbl="<table border='1' style='padding:5px;'><tr>";	
		$fl = mysql_num_fields($res);
		for($c=0;$c<$fl;$c++){
			$tbl.="<th style='padding:5px;'>".mysql_field_name($res,$c)."</th>";
		}
		$tbl.="</tr>";
		while($row = mysql_fetch_row($res)){
			$tbl .= "<tr><td style='padding:5px;'>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td></tr>";
		}	
		$tbl.="</table>";
		echo $tbl;
	}else
		echo "There's no query to run";
?>