<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <h2>CHECKOUT</h2>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table table-bordered">
                    <thead>
                        <tr class="active">
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
                    ?>
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-md-6 col-sm12 col-xs-12">
                        <div class="col-sm-12 col-sm-12 col-xs-12">
                            <strong class="pull-left">Total item : 
                                <i><?php echo $_SESSION['total'];?></i>
                            </strong>
                        </div>
                        <div class="col-sm-12 col-sm-12 col-xs-12">
                            <strong class="pull-left">Total price : 
                                <i><?php echo number_format($_SESSION['price']);?> ฿.</i>
                            </strong>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm12 col-xs-12">
                        <a href="edit_cart.php" class="btn btn-primary btn-lg">Edit Cart</a>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="col-md-4">
                                    <strong>PAYMENT AND SHIPPING</strong>
                                </div>
                                <div class="col-md-4">
                                    <button id="old-cus" class="btn btn-lg btn-success btn-pay">Old Customer</button>
                                </div>
                                <div class="col-md-4">
                                    <button id="new-cus" class="btn btn-lg btn-success btn-pay">New Customer</button>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default" id="new-user" style="display:none;">
                            <div class="panel-body">
                                <form role="form" class="form-horizontal" method="post" action="transaction.php">
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="name">Full Name :</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" 
                                                   id="name" placeholder="Enter Full Name"
                                                    name="name" style="width:300px;">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="tel">E-mail :</label>
                                        <div class="col-md-10">
                                            <input type="email" class="form-control" 
                                                   id="email" placeholder="Enter E-mail"
                                                    name="email" style="width:250px;">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="tel">Tel :</label>
                                        <div class="col-md-10">
                                            <input type="tel" class="form-control" 
                                                   id="tel" placeholder="Enter Phone Number"
                                                    name="tel" style="width:160px;">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="address">Address :</label>
                                            <div class="col-md-10">
                                                <textarea class="form-control" name="address" id="address" cols="5" style="width:400px;"></textarea>
                                            </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="zipCode">Zip Code :</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" id="zip_code" placeholder="Zip post" name="zip_code" style="width:80px;">
                                            </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="Package-size">Package Size :</label>
                                            <div class="col-md-10">
                                                <div class="thai-post pull-left">
                                                    <input type="radio" name="pk_size" value="0">
                                                    <img src="pic/shipping/package.png" style="width:20px;height:20px;">
                                                    <span> 0 ฿. Small.</span>
                                                    <input type="radio" name="pk_size" value="50">
                                                    <img src="pic/shipping/package.png" style="width:30px;height:30px;">
                                                    <span> 50 ฿. Medium. </span>
                                                    <input type="radio" name="pk_size" value="100">
                                                    <img src="pic/shipping/package.png" style="width:40px;height:40px;">
                                                    <span> 100 ฿. Large. </span>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="shipping">Shipping :</label>
                                            <div class="col-md-10">
                                                <div class="thai-post pull-left">
                                                    <input type="radio" name="shipping" value="0">
                                                    <img src="pic/shipping/ThailandPost.jpg" style="width:100px;height:50px;">
                                                    <span> Free Shipping. </span>
                                                </div>
                                                <div class="thai-post">
                                                    <input type="radio" name="shipping" value="100">
                                                    <img src="pic/shipping/ems.jpg" style="width:100px;height:50px;">
                                                    <span> 100 ฿ for EMS Shipping. </span>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-offset-2 col-md-10">
                                            <button type="submit" class="btn btn-primary btn-lg pull-left">SUBMIT</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="panel panel-default" id="old-user">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-inline form-group" id="form-old-user">
                                            <label for="mail-customer">E-mail :</label>
                                            <input type="email" id="input-mail" class="form-control" placeholder="Enter E-mail" name="mail-customer">
                                            <button class="btn btn-default">Submit</button>
                                        </div>
                                        <div class="test"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#new-cus').on('click',function(){
        $("#old-user").hide();
        $("#new-user").show();
        
    });
    $('#old-cus').on('click',function(){
        $("#new-user").hide();
        $("#old-user").show();
        
    });
    $('#form-old-user').on('click','button',function(){
        var value = $('#input-mail').val();
        $.ajax({
            type: 'POST',
            url: 'assets/customer_detail.php',
            success: function(response){
                $('.test').html(response).slideDown();
            },
            data: { "cus_email": value }
        });
    });
</script>