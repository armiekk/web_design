<?php session_start(); ?>
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