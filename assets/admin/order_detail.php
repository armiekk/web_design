<?php
    include("assets/db.php");
    $db = new Database();
    $db->createDB();
    $getOD = "  SELECT od_id, od_date, od_status, box_size, shipping_type,od_cost
                FROM tbl_order
                WHERE od_id = '".$_GET['order_id']."'";
    $order = mysql_fetch_array($db->getQuery($getOD))or die("cannot query");
    $getOdItem = "  SELECT tbl_order_item.pd_id, tbl_order_item.odi_qty, tbl_product.pd_name, tbl_product.pd_price
                    FROM tbl_order_item
                    LEFT OUTER JOIN tbl_product
                    ON tbl_order_item.pd_id = tbl_product.pd_id
                    WHERE tbl_order_item.od_id = '".$_GET['order_id']."'";
    $num = mysql_num_rows($db->getQuery($getOdItem))or die("cannot query");
    $getODI = $db->getQuery($getOdItem)or die("cannot query");
    $getCustomer =" SELECT * FROM tbl_customer
                    LEFT OUTER JOIN tbl_order
                    ON tbl_customer.cus_email = tbl_order.cus_email
                    WHERE tbl_order.od_id = '".$_GET['order_id']."'";
    $customer = mysql_fetch_array($db->getQuery($getCustomer))or die("cannot query");
?>
<div class="page-header">
    <h1>ORDER DETAIL</h1>
</div>
<table class="table table-bordered">
    <thead>
        <tr class="active">
            <th colspan="2" class="text-center"><span>Order Detail</span></th>
        </tr>
    </thead>
    <tbody class="text-center">
        <tr>
            <td>Order ID</td>
            <td><?php echo $order['od_id']; ?></td>
        </tr>
        <tr>
            <td>Order Date</td>
            <td><?php echo $order['od_date']; ?></td>
        </tr>
        <tr>
            <td>Status</td>
            <td>
                <form role="form" class="form-inline" method="post" action="assets/admin/update_status.php">
                    <div class="form-group col-md-offset-4 col-md-4">
                        <select class="form-control" name="status" style="width:120px;">
                            <option value="WAITING">WAITING</option>
                            <option value="PENDING">PENDING</option>
                            <option value="SHIPPING">SHIPPING</option>
                        </select>
                        <input type="hidden" name="od_id" value="<?php echo $order['od_id']; ?>">
                        <button type="submit" class="btn btn-success btn-xs pull-right" style="border-radius:100px;margin-top:5px;">
                            <span class="glyphicon glyphicon-ok"></span>
                        </button>
                    </div>
                </form>
            </td>
        </tr>
    </tbody>
</table>

<div class="page-header">
    <h1>ORDER ITEM</h1>
</div>
<table class="table table-bordered">
    <thead>
        <tr class="active">
            <th colspan="4" class="text-center"><span>Order Item</span></th>
        </tr>
        <tr>
            <td>Item</td>
            <td>Unit Price</td>
            <td>Qty</td>
            <td>Total</td>
        </tr>
    </thead>
    <tbody class="text-center">
        <?php
            while($orderItem = mysql_fetch_array($getODI)){
                echo "  <tr>
                            <td>".$orderItem['pd_name']."</td>
                            <td>".$orderItem['pd_price']."</td>
                            <td>".$orderItem['odi_qty']."</td>
                            <td>".($orderItem['pd_price']*$orderItem['odi_qty'])."</td>
                        </tr>";    
            }
        ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3">Sub-total </td>
            <td><?php echo number_format($order['od_cost']-$order['box_size']-$order['shipping_type']); ?></td>
        </tr>
        <tr>
            <td colspan="3">Box Size </td>
            <td><?php echo $order['box_size']; ?></td>
        </tr>
        <tr>
            <td colspan="3">Shipping </td>
            <td><?php echo $order['shipping_type']; ?></td>
        </tr>
        <tr>
            <td colspan="3">Total </td>
            <td><?php echo number_format($order['od_cost']); ?> ฿.</td>
        </tr>
    </tfoot>
</table>
<div class="page-header">
    <h1>SHIPPING INFORMATION</h1>
</div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th colspan="2" class="text-center active">Shipping Information</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Full Name</td>
            <td><?php echo $customer['cus_fullname']; ?></td>
        </tr>
        <tr>
            <td>Address</td>
            <td><?php echo $customer['cus_address']; ?></td>
        </tr>
        <tr>
            <td>Zip Code</td>
            <td><?php echo $customer['cus_postal_code']; ?></td>
        </tr>
        <tr>
            <td>Telephone</td>
            <td><?php echo $customer['cus_phone']; ?></td>
        </tr>
        <tr>
            <td>E-mail</td>
            <td><?php echo $customer['cus_email']; ?></td>
        </tr>
    </tbody>
</table>
<?php $db->closeDB(); ?>








