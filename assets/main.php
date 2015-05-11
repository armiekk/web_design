<div class="row">
    <div class="col-md-12 hidden-sm hidden-xs">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active img-box">
                    <img class="img-responsive" src="http://i1153.photobucket.com/albums/p512/armst1993/web%20programming/Carousel/cannon-Carousel.jpg" alt="cannon">
                    <div class="carousel-caption">
                       
                    </div>
                </div>
                <div class="item img-box">
                    <img class="img-responsive" src="http://i1153.photobucket.com/albums/p512/armst1993/web%20programming/Carousel/D7100_Carousel.jpg" alt="nikon">
                    <div class="carousel-caption">
                    
                    </div>
                </div>
                <div class="item img-box">
                    <img class="img-responsive" src="http://i1153.photobucket.com/albums/p512/armst1993/web%20programming/Carousel/sony_Carousel.jpg" alt="nikon">
                    <div class="carousel-caption">
                    
                    </div>
                </div>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>
<hr>
<!-- Japan Grade -->
<div class="row">
    <div class="col-md-12"><!-- product row -->
        <div class="row main-item-header"><!-- product header -->
            <div class="col-md-12">
                <div class="product-header pull-left">
                    CANNON
                </div>
                <div class="more-button"> 
                    <a href="index.php?product=cannon" class="btn btn-primary pull-right"><strong>more</strong><span class="glyphicon glyphicon-chevron-right"></span></a>
                </div> 
            </div>
        </div><!-- end of product header -->
<?php
            include('assets/db.php');
            $db = new Database();
            $db->createDB();
            $query = "  select tbl_series.gd_id,tbl_series.sr_id,tbl_product.pd_name,tbl_product.pd_id,
                                tbl_product.pd_name,tbl_product.pd_qty,tbl_product.pd_price,tbl_product.pd_image
                        from tbl_product
                        left outer join tbl_series on tbl_product.sr_id = tbl_series.sr_id
                        where tbl_series.gd_id = 'gd_001'";
            $result = $db->getQuery($query);
            $i1 = 1;
            while($i1 <= 3){
                $row = mysql_fetch_array($result);
                if($row['pd_qty'] > 0){
                    $button = "<form method='post' action='order.php'>
                                    <button type='submit' class='btn btn-primary' name='order' value='".$row['pd_id']."'>add to cart</button>
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
                                    <img src='pic/".$row['pd_image']."'>
                                    <div class='caption'>".
                                    "   <div class='row cap-gap'> 
                                            <div class='col-md-12 col-sm-12 col-xs-12'>
                                                <strong>
                                                    ".$row['pd_name']."
                                                </strong>".
                                        "   </div>
                                        </div>
                                        <div class='row cap-gap'>
                                            <div class='col-md-12 col-sm-12 col-xs-12'>
                                                <span class='price_label'><em> PRICE :</span></em><span class='price'>                                                                     <em>".number_format($row['pd_price'])." ฿.</em></span>
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
        $i1++;
    }
?>

    </div>
</div>
<hr>
<!-- China Grade -->
<div class="row">
    <div class="col-md-12"><!-- product row -->
        <div class="row main-item-header"><!-- product header -->
            <div class="col-md-12">
                <div class="product-header pull-left">
                    CHINA GRADE
                </div>
                <div class="more-button"> 
                    <a href="index.php?product=sony" class="btn btn-primary pull-right"><strong>more</strong><span class="glyphicon glyphicon-chevron-right"></span></a>
                </div>   
            </div>
        </div><!-- end of product header -->
<?php
            $query = "  select tbl_series.gd_id,tbl_series.sr_id,tbl_product.pd_name,tbl_product.pd_id,
                                tbl_product.pd_name,tbl_product.pd_qty,tbl_product.pd_price,tbl_product.pd_image
                        from tbl_product
                        left outer join tbl_series on tbl_product.sr_id = tbl_series.sr_id
                        where tbl_series.gd_id = 'gd_002'";
            $result = $db->getQuery($query);
            $i2 = 1;
            while($i2 <= 6){
                $row = mysql_fetch_array($result);
                if($row['pd_qty'] > 0){
                    $button = "<form method='post' action='order.php'>
                                    <button type='submit' class='btn btn-primary' name='order' value='".$row['pd_id']."'>add to cart</button>
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
                                    <img src='pic/".$row['pd_image']."' style='height:150px;'>
                                    <div class='caption'>".
                                    "   <div class='row cap-gap'> 
                                            <div class='col-md-12 col-sm-12 col-xs-12'>
                                                <strong>
                                                    ".$row['pd_name']."
                                                </strong>".
                                        "   </div>
                                        </div>
                                        <div class='row cap-gap'>
                                            <div class='col-md-12 col-sm-12 col-xs-12'>
                                                <span class='price_label'><em> PRICE :</span></em><span class='price'>                                                                     <em>".number_format($row['pd_price'])." ฿.</em></span>
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
        $i2++;
    }
    $db->closeDB();
?>
    </div>
</div>
<hr>
