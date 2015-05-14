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
        <script src="js/jquery.form.min.js"></script>
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
            <div class="logout-btn">
                <?php if(isset($_SESSION['admin'])){
                        echo '<a href="assets/admin/logout.php" class="btn 
                        btn-danger pull-right" style="margin-top:8px;">Log out</a> ';
                    }
                ?>
                 
            </div>
          </div><!-- /.container-fluid -->
		</nav>
        
        <div class="container"><!-- container for content -->
            <div class="row gap">
		  		<?php
                    if(isset($_SESSION['admin'])){
                        include("assets/admin/manage_panel.php");
                    }
                    else{
                        echo    "<div class='col-md-12 col-sm-12 col-xs-12 main'>";
                        include("assets/admin/admin_authen.html");
                        echo    "</div>";
                    }
                ?>
            </div>
        </div><!--end of container content -->
	</body>
</html>
