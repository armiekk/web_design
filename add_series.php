<html>
<head>
<title>ThaiCreate.Com Tutorial</title>
</head>
<body>
<?php
		echo "Copy/Upload Complete<br>";

		//*** Insert Record ***//
		$objConnect = mysql_connect("127.0.0.1","armst0910","armsozk38") or die("Error Connect to Database");
		$objDB = mysql_select_db("db_camera");
		$query = "insert into tbl_series(sr_id,sr_name,sr_detail)
                    values( '".$_POST['sr_id']."',
                            '".$_POST['sr_name']."',
                            '".$_POST['sr_detail']."')";
		mysql_query($query) or die("cannot query");		
	
?>

</body>
</html>