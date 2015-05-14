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
                    $qoh = $cart[$i]['qoh'];
                    $price = number_format($cart[$i]['price']);
                    echo "
                        <tr data-id='".$id."' data-qty='".$qty."' data-price='".$cart[$i]['price']."'>
                            <td><button class='btn btn-danger btn-xs' id='remove-item' style='border-radius:500px;'>
                                    <i class='glyphicon glyphicon-remove'></i>
                                </button>
                            </td>
                            <td>".$name."<br>
                                <span>on stock : ".$qoh."</span>
                            </td>
                            <td>
                                <form class='form-inline' role='form'>
                                    <div class='form-group'>
                                        <input type='number' id='order_qty' style='width:60px;' class='form-control' value='".$qty."' min='1' max='".$qoh."'>
                                        <button class='btn btn-success btn-xs pull-right' id='addQty' style='border-radius:100px;margin-left:5px;margin-top:5px;'>
                                            <i class='glyphicon glyphicon-ok'></i>
                                        </button>
                                    </div>
                                </form>
                            </td>
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
            <div class="update"></div>
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
            <div class="col-md-6 col-sm-12 col-xs-12">
                <a href="checkout.php" class="btn btn-success btn-lg">Checkout</a>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
    $('tbody').on('click','#remove-item',function (){
        $.ajax({
            type: 'POST',
            url: 'assets/remove_item.php',
            data: { "pd_id": $(this).closest("tr").data("id"),
                    "pd_qty": $(this).closest("tr").data("qty")
                  },
            success: function(response){
                $('.show').html(response).slideDown();
                $("table").trigger("chosen:updated");
            }
        });
        $(this).closest("tr").remove();
    });
    
    
    $('tbody').on('click','#remove-item',function (){
        $.ajax({
            type: 'POST',
            url: 'assets/update.php',
            success: function(response){
                $('div.update').html(response).show();
            }
        });
        $('div#total').remove();
    });
    
    
    $('tbody').on('click','#addQty',function (){
        $.ajax({
            type: 'POST',
            url: 'assets/update_order.php',
            data:{  pd_id: $(this).closest("tr").data("id"),
                    pd_qty: $(this).closest("tr").find("input#order_qty").val()
                 },
            success: function(response){
                $('div.update').html(response).show();
            }
        });
        $('div#total').remove();
    });
    
});
</script>