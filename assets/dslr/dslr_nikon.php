<?php
    include('assets/db.php');
    $db = new Database();
    $db->createDB();
    $query = "select pd_id,pd_name,pd_price,pd_image,img_alt,bd_id
                from tbl_product
                where bd_id = 'd_002'";
    $result = $db->getQuery($query);
    while($row = mysql_fetch_array($result)){
        echo "<div class='col-md-4 col-sm-6 col-xs-12'>
                        <div class='thumbnail' id='thumbnail-bg'>
                            <img src='".$row['pd_image']."' alt='".$row['img_alt']."'>
                            <div class='caption'>".
                              "<strong>".$row['pd_name']."</strong>".
                                "<br><span><em> PRICE :</span></em><span class='price'>                                                                     <em>".number_format($row['pd_price'])." ฿.</em></span>"
            				."</div>
                        </div>
                </div>";
                
    }
    $db->closeDB();
?>