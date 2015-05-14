<?php
    session_start();
    include("db.php");
    $db = new Database();
    $db->createDB();
    $query = "select pd_id,pd_name,pd_price,pd_image,sr_id,sell_qty 
                        from tbl_product
                        where pd_id ='".$_POST['pd_id']."';";
    $result = $db->getQuery($query);
    $row = mysql_fetch_array($result);
    $updateQuery = "update tbl_product
                    set pd_qty = pd_qty+sell_qty,sell_qty = sell_qty-".$_POST['pd_qty']."
                    where pd_id = '".$_POST['pd_id']."';";
    mysql_query($updateQuery);
?>
<div class="show">
    <div class="panel panel-default">
        <div class="panel-body">
           <?php echo "remove ".$row['pd_name']."(".$row['sell_qty'].") from your cart.";?>
        </div>
    </div>
</div>
<?php
    $cart = array_values($_SESSION['cart']);
    for($i = 0;$i < count($cart);$i++){
        if($cart[$i]['id'] == $_POST['pd_id']){
            unset($cart[$i]);
            $_SESSION['cart'] = array_values($cart);
        }
    }
    $_SESSION['total'] = $_SESSION['total']-$_POST['pd_qty'];
    $_SESSION['price'] = $_SESSION['price']-($_POST['pd_qty']*$row['pd_price']);
    $db->closeDB();
?>