<?php
	mysql_connect('localhost','root','root');
	mysql_select_db('blog');
	
	function returnmsg($msg){
		if(mysql_errno()==0)
			return "post ".$msg." successfully";
		else
			return "Error ".mysql_error();
	}
	
	function searchgrid($query,$upok=false,$delok=false,$editpage="",$returnpage=""){	
		
			$res = mysql_query($query);
			
			if(mysql_errno()>0)
			{
				return "Error".mysql_error();
			}
			$tbl = "<table width=500 border=1px> <tr>";	
			$rnum = mysql_num_fields($res);	
			for($col=0;$col < $rnum;$col++ ){
				$tbl .="\n <th>".mysql_field_name($res,$col)."</th>";
			}			
			//update and delete detection
			if($upok){
				$tbl .="<th>Update</th>";
			}
			if($delok){
				$tbl .="<th>Delete</th>";
			}
			$tbl .="\n</tr>";
			while($row = mysql_fetch_row($res)){
				$tbl .="\n<tr>"; 
				for($col=0;$col < $rnum;$col++){
					$tbl .= "\n<td>".$row[$col]."</td>";
					$flags = mysql_field_flags($res,$col);
					if(strpos($flags,"primary_key"))
						$pkcol = $col; 
				}
					
				if($upok)
					$tbl .= "\n<td><a href=\"$editpage?pkval=$row[$pkcol]\">edit</a></td>";
				if($delok){
					$tblname = mysql_field_table($res,0);
					$pkname = mysql_field_name($res,$pkcol);
					$tbl .= "\n<td><a href=\"del.php?table=$tblname&pkname=$pkname&pkval=$row[$pkcol]&page=$returnpage\">delete</a></td>";
				}
					
				$tbl .="\n</tr>";
			}
			$tbl .="\n</table";
			return $tbl;				
	}
	
?>