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
                <br>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="col-sm-4">
                                    <strong>PAYMENT AND SHIPPING</strong>
                                </div>
                                <div class="col-sm-4">
                                    <button id="old-cus" class="btn btn-lg btn-success btn-pay">Old Customer</button>
                                </div>
                                <div class="col-sm-4">
                                    <button id="new-cus" class="btn btn-lg btn-success btn-pay">New Customer</button>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default" id="new-user" style="display:none;">
                            <div class="panel-body">
                                <form role="form" class="form-horizontal" method="post" action="#">
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="name">Full Name :</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" 
                                                   id="name" placeholder="Enter Full Name"
                                                    name="name" style="width:300px;">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="tel">E-mail :</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" 
                                                   id="email" placeholder="Enter E-mail"
                                                    name="email" style="width:250px;">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="tel">Tel :</label>
                                        <div class="col-sm-10">
                                            <input type="tel" class="form-control" 
                                                   id="tel" placeholder="Enter Phone Number"
                                                    name="tel" style="width:160px;">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="address">Address :</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" id="address" placeholder="Enter Address" name="address" style="width:400px;">
                                            </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="address">Zip Code :</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" id="zip_post" placeholder="Zip post" name="zip_post" style="width:80px;">
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