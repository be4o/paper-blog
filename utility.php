<?php
	function uploadFile($file, $fname){
		if($file !='none')
		{
			move_uploaded_file($file,$_SERVER['DOCUMENT_ROOT']."\\Paperblog\\post_images\\$fname");
			return "File UPLOADED successfully.";
		}else
			return "File TOO LARGE or no file SELECTED.";
	}
	
?>