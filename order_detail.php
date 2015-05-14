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
		      <a class="navbar-brand" href="management.php">GUNPLA SHOP MANAGEMENT</a>
            </div>
          </div><!-- /.container-fluid -->
		</nav>
        
        <div class="container"><!-- container for content -->
            <div class="row gap">
		  		<div class="col-md-3 col-sm-12 col-xs-12 side-gap">
                    <div class="box categories-box" id="categories">
                        <p class="text-center"><strong>CATEGORIES</strong></p>
                        <span data-parent="#categories" aria-expanded="true" class="list-group-item active">
                            <strong>Admin Panel</strong>
                        </span>
                        <div class="sublinks">
                            <div class="list-group">
                                <a href="management.php?panel=order_list" class="list-group-item">Order List</a>
                                <a href="management.php?panel=add_product" class="list-group-item">Add Product</a>
                                <a href="management.php?panel=manage_product" class="list-group-item">Manage Product</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 col-sm-12 col-xs-12 main" style='margin-bottom:20px;'>
                <?php
                    include("assets/admin/order_detail.php");
        
                ?>
                </div>

            </div>
        </div><!--end of container content -->
	</body>
</html>
