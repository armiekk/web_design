<div class="page-header">
    <h1>Edit Cart</h1>
</div>
<div class="show"></div>
<table class="table table-hover">
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
                    $id = $cart[$i]['id'];
                    $name = $cart[$i]['name'];
                    $qty = $cart[$i]['qty'];
                    $price = number_format($cart[$i]['price']);
                    echo "
                        <tr data-id='".$id."' data-qty='".$qty."' data-index='".$i."'>
                            <td><button class='btn btn-default btn-xs' id='remove-item' style='border-radius:500px;'>
                                    <span class='glyphicon glyphicon-remove'></span>
                                </button>
                            </td>
                            <td>".$name."</td>
                            <td>".$qty."</td>
                            <td>".$price." ฿.</td>
                        </tr>
                    ";
                }
    ?>  
        </tbody>
</table>
<div class="panel panel-default">
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-6 col-sm-12 col-xs-12">
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
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
                <a href="checkout.php" class="btn btn-success btn-lg">Checkout</a>
            </div>
        </div>
    </div>
</div>

<script>
    $('tbody').on('click','#remove-item',function(){
        $.ajax({
            type: 'POST',
            url: 'assets/remove_item.php',
            success: function(response){
                $('.show').html(response).slideDown();
            },
            data: { "pd_id": $(this).closest("tr").data("id"),
                    "pd_qty": $(this).closest("tr").data("qty"),
                    "index": $(this).closest("tr").data("index")}
        });
        $(this).closest("tr").remove();
        var pd_id =  $(this).closest("tr").data("id");
    });
</script>