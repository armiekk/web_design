<?php
		echo "Copy/Upload Complete<br>";

		//*** Insert Record ***//
		$objConnect = mysql_connect("127.0.0.1","armst0910","armsozk38") or die("Error Connect to Database");
		$objDB = mysql_select_db("db_camera");
		$query = "insert into tbl_grade(gd_id,gd_dtail)
                    values( '".$_POST['gd_id']."',
                            '".$_POST['gd_dtail']."')";
		mysql_query($query) or die("cannot query");		
	
?>