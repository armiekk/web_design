<!DOCTYPE HTML>
<html>
    <head>
        <?php
            session_start();
            
        ?>
    	<title>GUNPLA SHOP</title>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width , initial-scale=1.0">
        <link rel="stylesheet" href="css/stylesheet.css" type="text/css" media="screen"/>
        <link rel="stylesheet" href="css/style_camera_login.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">


		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		<script src="js/jquery-2.1.3.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
        <style>
			body{
				background:#333 url(bg.jpg) repeat top left;
				font-family:Arial;
			}
			ul.list-group{
				padding-top: 20px;
			}
		</style>
    </head>

    <body>
		<nav class="navbar navbar-default navbar-fixed-top">
		  <div class="container-fluid features">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
		        <span class="sr-only">toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="index.php">GUNPLA SHOP</a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#cart-collapse">
		          <span class="sr-only">cart navigation</span>
		          <a href="#" class="glyphicon glyphicon-shopping-cart pull-right"></a>
		      </button>
		    </div>
		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="navbar-collapse">
		      <ul class="nav navbar-nav">
		        <li><a href="#">Product</a></li>
		        <li><a href="#">Review</a></li>
		        <li><a href="#">Contact us</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
		</nav>
        
        <div class="container"><!-- container for content -->
		  	<div class="row gap">
		  		<div class="col-md-3 col-sm-12 col-xs-12 side-gap">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <form method="post" action="index.php" class="input-group home-search">
                                <input type="text" class="form-control" placeholder="Search" name="search">
		                          <div class="input-group-btn">
                                        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                  </div>
                            </form>
                        </div>
                    </div>
		              <div class="box categories-box" id="categories">
                            <p class="text-center"><strong>CATEGORIES</strong></p>
                            <a href="index.php?modelGrade=gd_001" data-parent="#categories" aria-expanded="true" class="list-group-item active">
                                <strong>JAPAN GRADE</strong>
                            </a>
                            <div id="digital_camera" class="sublinks">
                                <div class="list-group">
                                    <a href="index.php?model=sr007&grade=gd_001" class="list-group-item">Gundam Build Fighters</a>
                                    <a href="index.php?model=sr008&grade=gd_001" class="list-group-item">Gundam UC DESTINY</a>
                                    <a href="index.php?model=sr009&grade=gd_001" class="list-group-item">Gundam W</a>
                                    <a href="index.php?model=sr010&grade=gd_001" class="list-group-item">Reconguista in G</a>
                                    <a href="index.php?model=sr011&grade=gd_001" class="list-group-item">Other Gundam</a>
                                </div>
                            </div>
                            <a href="index.php?modelGrade=gd_002" data-parent="#categories" aria-expanded="true" class="list-group-item active">
                                <strong>CHINA GRADE</strong>
                            </a>
                            <div id="digital_camera" class="sublinks">
                                <div class="list-group">
                                    <a href="index.php?model=sr004&grade=gd_002" class="list-group-item">GUNDAM SEED</a>
                                    <a href="index.php?model=sr005&grade=gd_002" class="list-group-item">GUNDAM SEED DESTINY</a>
                                    <a href="index.php?model=sr006&grade=gd_002" class="list-group-item">GUNDAM 00</a>
                                </div>
                            </div>
                    </div>
                </div>
            
                <div class="col-md-9 col-sm-12 col-xs-12 main">
                    <div id="transaction" class="panel panel-default">
                        <div class="successful"></div>
                        <div id="information" class="panel-body">
                            <div class="page-header">
                                <h1>YOUR INFORMATION.</h1>
                            </div>
                            <p class="text-center"> <strong>Name : <?php echo $_POST['name'];?></strong><br>
                                <strong>Address : <?php echo $_POST['address'];?></strong><br>
                                <strong>Zip code : <?php echo $_POST['zip_code'];?></strong><br>
                                <strong>E-mail : <?php echo $_POST['email'];?></strong><br>
                                    <strong>Tel. : <?php echo $_POST['tel'];?></strong><br>
                                <strong>Box Size : <?php
                                                    if($_POST['pk_size'] == 0){
                                                        echo "Small(Free).";
                                                    }
                                                    elseif($_POST['pk_size'] == 50){
                                                        echo "Medium(50 ฿.).";
                                                    }
                                                    else{
                                                        echo "Large(100 ฿.).";
                                                    }
                                                ?></strong><br>
                                <strong>Shipping : <?php
                                                    if($_POST['shipping'] == 0){
                                                        echo "Shipping by Thai Post(Free)";
                                                    }
                                                    elseif($_POST['shipping'] == 100){
                                                        echo "Shipping by Thai Post EMS(100 ฿.)";
                                                    }
                                                ?></strong></p><br>
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="active">
                                        <td>#</td>
                                        <td>Product</td>
                                        <td>Qty</td>
                                        <td>Price</td>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $number = 0;
                                    $cart = array_values($_SESSION['cart']);
                                    $maxItem = count($cart);
                                    for($i = 0;$i < $maxItem;$i++){
                                        $number++;
                                        echo "
                                            <tr>
                                                <td>".$number."</td>
                                                <td>".$cart[$i]['name']."</td>
                                                <td>".$cart[$i]['qty']."</td>
                                                <td>".number_format($cart[$i]['price'])." ฿.</td>
                                            </tr>
                                            ";  
                                    }
                                ?>
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-md-12 col-sm12 col-xs-12">
                                    <p class="text-center">  
                                        <strong class="pull-left">Total item : 
                                            <i><?php echo $_SESSION['total'];?></i>
                                        </strong>
                                        <strong class="pull-right">Total price : 
                                            <i><?php echo number_format($_SESSION['price']+$_POST['pk_size']+$_POST['shipping']); ?> ฿.</i>
                                        </strong>
                                    </p>  
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <form role="form" method="post" action="process.php">
                                        <input type="hidden" name="name" value="<?php echo $_POST['name'];?>">
                                        <input type="hidden" name="address" value="<?php echo $_POST['address'];?>">
                                        <input type="hidden" name="zip_code" value="<?php echo $_POST['zip_code'];?>">
                                        <input type="hidden" name="email" value="<?php echo $_POST['email'];?>">
                                        <input type="hidden" name="tel" value="<?php echo $_POST['tel'];?>">
                                        <input type="hidden" name="pk_size" value="<?php echo $_POST['pk_size'];?>">
                                        <input type="hidden" name="shipping" value="<?php echo $_POST['shipping'];?>">
                                        <button type="submit" class="btn btn-success btn-lg" id="submit_transaction">SUBMIT</button>&nbsp;
                                        <button class="btn btn-danger btn-lg" id="cancel_transaction">CANCEL</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div><!--end of container content -->
	<footer class="container">
	  	<div class="row">
	  		<address>
			  	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
			  			thank u
			  	</div>

				  	<div class="col-lg-6 col-md-4 col-sm-4 col-xs-4" align=center>
				  			lardkrabang 1111
				  	</div>

			  	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
			  			facebook:f
			  	</div>
			</address>
		</div>
	</footer>
    </body>
</html>
