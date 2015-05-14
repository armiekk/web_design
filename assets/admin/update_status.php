<?php
    $link = mysql_connect("127.0.0.1","armst0910","armsozk38");
    mysql_select_db("gunpla_ecommerce",$link)or die("cannot select DB");
    $query = "  update tbl_order
                set od_status = '".$_POST['status']."'
                where od_id = '".$_POST['od_id']."'";
    mysql_query($query)or die("cannot update");
    header("location: ../../management.php?panel=order_list");
?>