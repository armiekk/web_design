<!DOCTYPE HTML>
<html>
    <head>
      <?php
        session_start();
        if(!isset($_SESSION['cart'])){
            $_SESSION['cart'] = array();
            $_SESSION['total'] = 0;
            $_SESSION['price'] = 0;
        }
      ?>
    	<title>Camera World</title>
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
		      <a class="navbar-brand" href="index.php">KM CAMERA</a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#cart-collapse">
		          <span class="sr-only">cart navigation</span>
		          <a href="#" class="glyphicon glyphicon-shopping-cart pull-right"></a>
		      </button>
		    </div>
            <div class="hidden-xs">
                <a type="button" id="button-cart" href="assets/cart.php" class="btn btn-default pull-right" 
                   data-toggle="modal" data-target="#cart">
                    <span class="glyphicon glyphicon-shopping-cart cart"></span>
                    <strong class="badge"><?php echo $_SESSION['total'];?> item</strong>
                </a>
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
            <div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    </div>
                </div>
            </div>
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
                                <strong>JAPAN GRADE</strong><span class="badge">0</span>
                            </a>
                            <div id="digital_camera" class="sublinks">
                                <div class="list-group">
                                    <a href="index.php?model=sr001&grade=gd_001" class="list-group-item">GUNDAM SEED</a>
                                    <a href="index.php?model=sr002&grade=gd_001" class="list-group-item">GUNDAM SEED DESTINY</a>
                                    <a href="index.php?model=sr003&grade=gd_001" class="list-group-item">GUNDAM 00</a>
                                </div>
                            </div>
                            <a href="index.php?modelGrade=gd_002" data-parent="#categories" aria-expanded="true" class="list-group-item active">
                                <strong>CHINA GRADE</strong><span class="badge">0</span>
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
                    <?php
                        if(isset($_GET['model']) && isset($_GET['grade'])){
                            include("assets/model_gundam.php");
                        }
                        else if(isset($_GET['modelGrade'])){
                            include("assets/model_grade.php");
                        }
                        elseif(isset($_POST['search'])){
                            include("assets/search.php");
                        }
                        elseif(isset($_POST['order'])){
                            include("assets/order.php");
                        }
                        else
                            include("assets/main.php");
                    ?>
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
        <script>
            $('body').on('hidden.bs.modal',".modal", function () {
                $(this).removeData('bs.modal');
            });
        </script>
    </body>
</html>
