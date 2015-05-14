<?php

		//*** Insert Record ***//
		$objConnect = mysql_connect("127.0.0.1","armst0910","armsozk38") or die("Error Connect to Database");
		$objDB = mysql_select_db("gunpla_ecommerce");
		$query = "insert into tbl_series(sr_id,sr_name,sr_detail)
                    values( '".$_POST['sr_id']."',
                            '".$_POST['sr_name']."',
                            '".$_POST['sr_detail']."')";
		mysql_query($query) or die("cannot query");		
	
?>
<div class="panel panel-default">
    <div class="panel-body">
        <?php echo "Add ".$_POST['sr_id']." ".$_POST['sr_name']." ".$_POST['sr_detail']." to Database.";?>
    </div>
</div>