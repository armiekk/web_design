<?php
    include("assets/db.php");
    $db = new Database();
    $db->createDB();
    $searchq = $_POST['search'];
    $searchq = preg_replace("#[^0-9a-z]#i","",$searchq);
    $query = "select * from tbl_product where pd_name like '%$searchq%';";
    $result = $db->getQuery($query);
    $count = mysql_num_rows($result);
    if($count == 0){
        echo "There was no result !!";
    }
    else{
        echo    "<div class='page-header'>
                    <h1>Search for '".$searchq."'</h1>
                </div>";
        while($row = mysql_fetch_array($result)){
        if($row['pd_qty'] > 0){
            $button = "<form method='post' action='order.php'>
                            <button type='submit' class='btn btn-primary' name='order' value='".$row['pd_id']."'>add to cart</button>
                        </form>";
        }
        else{
            $button = "<button type='button' class='btn btn-default btn-danger' disabled='disabled'>
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
    }
    $db->closeDB();
?>