<?php
    include('assets/db.php');
    $db = new Database();
    $db->createDB();
    $query = "select pd_id,pd_name,pd_price,pd_image,img_alt,bd_id
                from tbl_product
                where bd_id = 'd_001'";
    $result = $db->getQuery($query);
    while($row = mysql_fetch_array($result)){
        $link = "index.php?product=dslr_cannon&addToCart=".$row['pd_id'];
        echo "<div class='col-md-4 col-sm-6 col-xs-12'>
                        <div class='thumbnail' id='thumbnail-bg'>
                            <img src='".$row['pd_image']."' alt='".$row['img_alt']."'>
                            <div class='caption'>".
                              "<strong>".$row['pd_name']."</strong>".
                                "<br><span class='price_label'><em> PRICE :</span></em><span class='price'>                                                                     <em>".number_format($row['pd_price'])." ฿.</em></span>
                                <br>
                                <a href='".$link."' type='button' id='cartButton' class='btn btn-primary pull-right'><strong class='btn-cart'>add to cart</strong></a>
                                    ".$row['pd_id']."
                                <br><br>"
            				."</div>
                        </div>
                </div>";
                
    }
    if(isset($_GET['addToCart'])){
        $item = $_GET['addToCart'];
        array_push($_SESSION['cart'],$item);
        print_r($_SESSION['cart']);
    }
    $db->closeDB();
?>
<script>
        $("document").ready(function(){
            $(".thumbnail").on("click","a",function(){
                alert("add item to cart !");
            })
        });    
</script>