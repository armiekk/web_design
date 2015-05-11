<?php
    session_start();
    include("db.php");
    $db = new Database();
    $db->createDB();
    mysql_close();
?>
<div class="modal-body">
    <?php
        if(empty($_SESSION['cart'])){
    ?>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="jumbotron">
                <center>
                    <div class="row">
                        <span class="glyphicon glyphicon-shopping-cart"></span>
                    </div>
                    <strong>Cart is Empty !</strong>
                </center>
            </div>
        </div>
    </div>
    <?php
        }else{
    ?>
    <table class="table table-hover">
        <thead>
            <tr>
                <td>#</td>
                <td>Product</td>
                <td>Qty</td>
                <td>Price</td>
            </tr>
        </thead>
        <tbody>
    <?php
            $number = 0;
            $cart = array_values($_SESSION['cart']);
            $maxItem = count($cart);
            for($i = 0;$i < $maxItem;$i++){
                $id = $cart[$i]['id'];
                $number++;
                echo "
                    <tr>
                        <td>".$number."</td>
                        <td>".$cart[$i]['name']."</td>
                        <td>".$cart[$i]['qty']."</td>
                        <td>".number_format($cart[$i]['price'])." ฿.</td>
                    </tr>
                ";
            }
        }
    ?>
        </tbody>
    </table>
</div>
<div class="modal-footer">
    <a href="edit_cart.php" class="btn btn-primary" id="btn-edit-cart">Edit Cart</a>
    <a href="checkout.php" class="btn btn-success" id="btn-checkout">Checkout</a>
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>