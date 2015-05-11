<div class="test2">
    <?php
        include("db.php");
        $db = new Database();
        $db->createDB();
        $query = "  select cus_fullname,cus_address,cus_phone,cus_postal_code,cus_email 
                    from tbl_customer
                    where cus_email = '".$_POST['cus_email']."'";
        if(mysql_num_rows($db->getQuery($query)) == 0){
            echo "<strong>User Not Found !</strong>";
        }
        else{
            $row = mysql_fetch_array($db->getQuery($query));
        
    ?>
        <form role="form" class="form-horizontal" method="post" action="#">
        <div class="form-group">
            <label class="control-label col-sm-2" for="name">Full Name :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" 
                        id="name" placeholder="Enter Full Name"
                        name="name" style="width:300px;" value="<?php echo $row['cus_fullname'];?>">
                </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="tel">E-mail :</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" 
                    id="email" placeholder="Enter E-mail"
                        name="email" style="width:250px;" value="<?php echo $row['cus_email'];?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="tel">Tel :</label>
            <div class="col-sm-10">
                <input type="tel" class="form-control" 
                    id="tel" placeholder="Enter Phone Number"
                        name="tel" style="width:160px;" value="<?php echo $row['cus_phone'];?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="address">Address :</label>
            <div class="col-sm-10">
                <input class="form-control" id="address" placeholder="Enter Address" name="address" style="width:400px;" value="<?php echo $row['cus_address'];?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="address">Zip Code :</label>
            <div class="col-sm-10">
                <input class="form-control" id="zip_post" placeholder="Zip post" name="zip_post" style="width:80px;" value="<?php echo $row['cus_postal_code'];?>">
            </div>
        </div>
    </form>
</div>
<?php
        }
        $db->closeDB();
?>