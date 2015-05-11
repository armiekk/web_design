<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="col-md-3 col-sm-12 col-xs-12">
                    <strong class="ok"><span class="glyphicon glyphicon-ok"></span> Add to Cart</strong>
                    <div class="thumbnail">
                        <?php 
                            mysql_query($updateQuery);
                            echo    "<img src='pic/".$row['pd_image']."'>
                                        <div class='row'>
                                            <div class='col-sm-12'>
                                                <span>".$row['pd_name']."</span>
                                            </div>
                                        </div>
                                        <div class='row'>
                                            <div class='col-sm-12'>
                                                <em><i class='pull-left'>PRICE :</i><i class='pull-right'>".number_format($row['pd_price'])."฿.</i></em>
                                            </div>
                                        </div>"
                        ?>
                    </div>
                </div>
                <div class="col-md-9 col-sm-12 col-xs-12 order-panel">
                    <div class="row">
                        <div class="col-sm-12 col-sm-12 col-xs-12">
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
                    <div class="row">
                        <div class="col-sm-12 col-sm-12 col-xs-12 order-button-gap">
                            <form method="post" action="checkout.php" class="pull-left">
                                <button type="submit" class="btn btn-success" name="chk_id">
                                    Checkout
                                </button> &nbsp;
                            </form>
                            <form method="post" action="edit_cart.php" class="pull-left">
                                <button type="submit" class="btn btn-primary" value="edit-cart">Edit Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="page-header">
        <h1>Relate Items</h1>
    </div>
    <?php
        $relate = "select * from tbl_product where sr_id='".$row['sr_id']."';";
        $resultR = $db->getQuery($relate);
        $countR = 1;
        while($rowR = mysql_fetch_array($resultR)){
                if($rowR['pd_qty'] > 0){
                    $button = "<form method='post' action='order.php'>
                                    <button type='submit' class='btn btn-primary' name='order' value='".$rowR['pd_id']."'>add to cart</button>
                                </form>";
                }
                else{
                    $button = "<button type='button' class='btn btn-default btn-danger' 
                                disabled='disabled'>
                                    Sold out
                                </button>";
                }
                echo "<div class='col-md-4 col-sm-6 col-xs-12'>
                                <div class='thumbnail' id='thumbnail-bg' style='height:330px;'>
                                    <img src='pic/".$rowR['pd_image']."' style='height:150px;'>
                                    <div class='caption'>".
                                    "   <div class='row cap-gap'> 
                                            <div class='col-md-12 col-sm-12 col-xs-12'>
                                                <strong>
                                                    ".$rowR['pd_name']."
                                                </strong>".
                                        "   </div>
                                        </div>
                                        <div class='row cap-gap'>
                                            <div class='col-md-12 col-sm-12 col-xs-12'>
                                                <span class='price_label'><em> PRICE :</span></em><span class='price'>                                                                     <em>".number_format($rowR['pd_price'])." ฿.</em></span>
                                            </div>
                                        </div>
                                        <div class='row cap-gap'>
                                            <div class='col-md-12 col-sm-12 col-xs-12'>".
                                                $button
                                            ."</div>
                                        </div>
            				        </div>
                                </div>
                        </div>";
    }
    mysql_close();
    ?>
</div>