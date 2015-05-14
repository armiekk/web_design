<?php
    include("assets/db.php");
    $db = new Database();
    $db->createDB();
    $query ="   SELECT tbl_order.od_id, tbl_order.od_cost, tbl_order.od_date, tbl_order.od_status, tbl_customer.cus_fullname
                FROM tbl_order
                left outer join tbl_customer
                on tbl_order.cus_email = tbl_customer.cus_email
                ORDER BY tbl_order.od_id DESC";
    $result = $db->getQuery($query);
?>
<div class="page-header">
    <h1>ORDER LIST</h1>
</div>
<table class="table table-bordered">
    <thead>
        <tr class="active">
            <td>ID</td>
            <td>Customer Name</td>
            <td>Price</td>
            <td>Date</td>
            <td>Status</td>
        </tr>
    </thead>
    <tbody>
    <?php
        while($row = mysql_fetch_array($result)){
            echo "  <tr>
                        <td><a href='order_detail.php?order_id=".$row['od_id']."'>".$row['od_id']."</a></td>
                        <td>".$row['cus_fullname']."</td>
                        <td>".number_format($row['od_cost'])." ฿.</td>
                        <td>".$row['od_date']."</td>
                        <td>".$row['od_status']."</td>
                    </tr>";
        }    
    ?>
    </tbody>
</table>