<?php 
    session_start();
    include("db.php");
    $db = new Database();
    $db->createDB();
    $query = "select pd_id,pd_name,pd_price,pd_image,sr_id,pd_qty 
                        from tbl_product
                        where pd_id ='".$_POST['pd_id']."';";
    $row = mysql_fetch_array($db->getQuery($query)) or die("cannot query"); 
    $qoh = 0;
    for($i = 0;$i < count($_SESSION['cart']);$i++){
        if($_SESSION['cart'][$i]['id'] == $_POST['pd_id']){
            $_SESSION['cart'][$i]['qty'] = $_POST['pd_qty'];
            $_SESSION['cart'][$i]['price'] = $_POST['pd_qty']*$row['pd_price'];
            $qoh = $_SESSION['cart'][$i]['qoh'];
        }
    }
    $updateQuery = "update tbl_product
                            set sell_qty = ".$_POST['pd_qty'].",pd_qty = ".($qoh-$_POST['pd_qty'])."
                            where pd_id = '".$_POST['pd_id']."';";
    mysql_query($updateQuery) or die("caonnot query");
    $totalQty = 0; $totalPrice = 0;
    for($i = 0;$i < count($_SESSION['cart']);$i++){
        $totalQty = $totalQty + $_SESSION['cart'][$i]['qty'];
        $totalPrice = $totalPrice + $_SESSION['cart'][$i]['price'];
    }
    $_SESSION['total'] = $totalQty;
    $_SESSION['price'] = $totalPrice;
    
    
    $db->closeDB();
?>
<div class="col-md-6 col-sm-12 col-xs-12" id="total">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">  
            <strong class="pull-left">Total item : 
                <i><?php echo $_SESSION['total'];?></i>
            </strong>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-sm-12 col-xs-12">
            <strong class="pull-left">Total price : 
                <i><?php echo number_format($_SESSION['price']);?> ฿.</i>
            </strong>
        </div>
    </div>
</div>