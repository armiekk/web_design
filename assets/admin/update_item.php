<?php
    $objConnect = mysql_connect("127.0.0.1","armst0910","armsozk38") or die("Error Connect to Database");
    $objDB = mysql_select_db("gunpla_ecommerce");
    if(isset($_FILES["fileUpload"])){
        move_uploaded_file($_FILES["fileUpload"]["tmp_name"],"../../pic/".$_FILES["fileUpload"]["name"]);
	   $query = "    update tbl_product
                        set pd_name='".$_POST['pd_name']."',
                            pd_price=".$_POST['pd_price'].",
                            pd_qty=".$_POST['pd_qty'].",
                            pd_desc='".$_POST['pd_desc']."',
                            sr_id='".$_POST['sr_id']."',
                            pd_image='".$_FILES["fileUpload"]["name"]."'
                        where pd_id = '".$_POST['pd_id']."'";
		mysql_query($query) or die("cannot query");		
    }
    else{
        $query = "    update tbl_product
                        set pd_name='".$_POST['pd_name']."',
                            pd_price=".$_POST['pd_price'].",
                            pd_qty=".$_POST['pd_qty'].",
                            pd_desc='".$_POST['pd_desc']."',
                            sr_id='".$_POST['sr_id']."'
                        where pd_id = '".$_POST['pd_id']."'";
		mysql_query($query) or die("cannot query");	
    }
?>
<div class="panel panel-default">
    <div class="panel-body">
        <?php echo "Add ".$_POST['pd_id']." ".$_POST['pd_name']." ".$_POST['pd_qty']." to Database.";?>
    </div>
</div>