<?php
    include("assets/db.php");
    $db = new Database();
    $db->createDB();
    $query = "";
    if(isset($_GET['sort'])){
        if($_GET['sort'] == "pd_id"){
            $query = "select * from tbl_product order by ".$_GET['sort']."";
        }
        else{
            $query = "select * from tbl_product order by ".$_GET['sort']." DESC";
        }
    }
    else{
        $query = "select * from tbl_product order by pd_id";
    }
    $result = $db->getQuery($query)or die("cannot get data");
?>
<div class="page-header">
    <h1>Manage Item</h1>
</div>
<form method="get" role="form" class="form-inline pull-left" action="management.php?panel=manage_product">
    <div class="form-group">
        <label for="sort" class="control-label" >Sort : </label>
        
            <select class="form-control" id="sort" name="sort">
                <option value="pd_id">id</option>
                <option value="pd_price">price</option>
                <option value="pd_qty">qty</option>
                <option value="sell_qty">sell qty</option>
            </select>
        
        <input type="submit" class="btn btn-success btn-xs" style="border-radius:100px;" value="submit">
    </div>
</form>
<br>
<table class="table table-hover">
    <thead>
        <tr class="active">
            <td>ID</td>
            <td>Detail</td>
            <td>Price</td>
            <td>Qty</td>
            <td>Sell Qty</td>
        </tr>
    </thead>
    <tbody>
        <?php
            while($row = mysql_fetch_array($result)){
                echo "  <tr>
                            <td><a href='edit_item.php?pd_id=".$row['pd_id']."'>".$row['pd_id']."</a></td>
                            <td class='text-left'>
                                <img src='pic/".$row['pd_image']."' style='width:100px;height:100px;'>&nbsp;"
                                .$row['pd_name']."
                            </td>
                            <td>".$row['pd_price']."</td>
                            <td>".$row['pd_qty']."</td>
                            <td>".$row['sell_qty']."</td>
                        </tr>";
            }
        ?>
    </tbody>
</table>
<?php $db->closeDB(); ?>