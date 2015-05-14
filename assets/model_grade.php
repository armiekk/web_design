<?php
        $query = "  select tbl_series.gd_id,tbl_series.sr_id,tbl_product.pd_name,tbl_product.pd_id,
                                tbl_product.pd_name,tbl_product.pd_qty,tbl_product.pd_price,tbl_product.pd_image
                        from tbl_product
                        left outer join tbl_series on tbl_product.sr_id = tbl_series.sr_id
                        where tbl_series.gd_id = '".$_GET['modelGrade']."'";
        $result = $db->getQuery($query);
        $grade = "select gd_dtail from tbl_grade where gd_id = '".$_GET['modelGrade']."'";
        $qGrade = mysql_fetch_array(mysql_query($grade));
        echo    "<div class='page-header'>
                    <h1>".$qGrade['gd_dtail']." GRADE</h1>
                </div>";
        while($row = mysql_fetch_array($result)){
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
    }
    mysql_close();
?>