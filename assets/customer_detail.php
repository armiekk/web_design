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
        <form role="form" class="form-horizontal" method="post" action="transaction.php">
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
            <label class="control-label col-sm-2" for="zip_code">Zip Code :</label>
            <div class="col-sm-10">
                <input class="form-control" id="zip_post" placeholder="Zip Code" name="zip_code" style="width:80px;" value="<?php echo $row['cus_postal_code'];?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="Package-size">Package Size :</label>
                <div class="col-md-10">
                    <div class="thai-post pull-left">
                        <input type="radio" name="pk_size" value="0">
                        <img src="pic/shipping/package.png" style="width:20px;height:20px;">
                        <span> 0 ฿. Small.</span>
                        <input type="radio" name="pk_size" value="50">
                        <img src="pic/shipping/package.png" style="width:30px;height:30px;">
                        <span> 50 ฿. Medium. </span>
                        <input type="radio" name="pk_size" value="100">
                        <img src="pic/shipping/package.png" style="width:40px;height:40px;">
                        <span> 100 ฿. Large. </span>
                    </div>
                </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="shipping">Shipping :</label>
                <div class="col-md-10">
                    <div class="thai-post pull-left">
                        <input type="radio" name="shipping" value="0">
                        <img src="pic/shipping/ThailandPost.jpg" style="width:100px;height:50px;">
                        <span> Free Shipping. </span>
                    </div>
                    <div class="thai-post">
                        <input type="radio" name="shipping" value="100">
                        <img src="pic/shipping/ems.jpg" style="width:100px;height:50px;">
                        <span> 100 ฿ for EMS Shipping. </span>
                    </div>
                </div>
        </div>
        <div class="form-group">
            <div class="col-md-offset-2 col-md-10">
                <button type="submit" class="btn btn-primary btn-lg pull-left">SUBMIT</button>
            </div>
        </div>
    </form>
</div>
<?php
        }
        $db->closeDB();
?>