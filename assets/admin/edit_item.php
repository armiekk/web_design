<?php
    include("assets/db.php");
    $db = new Database();
    $db->createDB();
    $query = "select * from tbl_product where pd_id='".$_GET['pd_id']."'";
    $row = mysql_fetch_array($db->getQuery($query))or die("cannot query");
    $seriesQ = "select sr_id from tbl_series order by sr_id";
    $seriesR = mysql_query($seriesQ);
?>
<div class="page-header">
        <h1>EDIT PRODUCT</h1>
    </div>
    <div class="editProduct"></div>
    <form name="form" class="form-horizontal" id="Product" method="post" action="assets/admin/update_item.php" enctype="multipart/form-data">
	   <div class="form-group">
            <label class="control-label col-md-2" for="pd_id">Product ID :</label>
            <div class="col-md-9">
	           <input type="text" class="form-control" name="pd_id" value="<?php echo $row['pd_id']; ?>" disabled>
                <input type="hidden" name="pd_id" value="<?php echo $row['pd_id']; ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-2" for="pd_name">Product Name :</label>
            <div class="col-md-9">
	           <input type="text" class="form-control" name="pd_name" value="<?php echo $row['pd_name']; ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-2" for="pd_price">Product Price :</label>
            <div class="col-md-9">
	           <input type="number" class="form-control" name="pd_price" style="width:120px;"  value="<?php echo $row['pd_price']; ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-2" for="pd_qty">Product Qty :</label>
            <div class="col-md-9">
	           <input type="number" class="form-control" name="pd_qty" style="width:70px;" value="<?php echo $row['pd_qty']; ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-2" for="pd_desc">Product Description :</label>
            <div class="col-md-9">
	           <textarea class="form-control" rows="4" name="pd_desc"><?php echo $row['pd_desc']; ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-2" for="sr_id">Series ID :</label>
            <div class="col-md-9">
	           <select class="form-control" name="sr_id">
                    <?php
                        while($sr = mysql_fetch_array($seriesR)){
                            echo "<option value='".$sr['sr_id']."'>".$sr['sr_id']."</option>";
                        }
                   ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-2" for="fileUpload">Picture :</label>
            <div class="col-md-9">
                <img src="<?php echo "pic/".$row['pd_image']; ?>" class="pull-left" style="width:400px;height:400px;">
	           <input type="file" name="fileUpload">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-offset-2 col-md-10">
                <button type="submit" class="btn btn-primary pull-left" id="edit_product">Edit Product</button>
            </div>
        </div>
	</form>
<?php $db->closeDB(); ?>

<script>
    $(document).ready(function (){
        $('#Product').ajaxForm(function(response) { 
                $('div.editProduct').html(response).slideDown();
            }); 
    });
</script>