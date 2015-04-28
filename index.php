<!DOCTYPE HTML>
<html>
    <head>
      <?php
        session_start();
      ?>
    	<title>Camera World</title>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width , initial-scale=1.0">
        <link rel="stylesheet" href="css/stylesheet.css" type="text/css" media="screen"/>
        <link rel="stylesheet" href="css/style_camera_login.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">


		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
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
		  <div class="container-fluid">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		        <span class="sr-only">camera</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="index.php">KM CAMERA</a>
		    </div>
            <div class="features">
                  <i class="glyphicon glyphicon-shopping-cart pull-right cart"></i>
            </div>
		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav">
		        <li><a href="#">News <span class="sr-only">(current)</span></a></li>
		        <li><a href="#">Promotion</a></li>
		        <li><a href="#">Photos</a></li>
		        <li><a href="#">Contact us</a></li>
                </ul>
		    </div><!-- /.navbar-collapse -->
            <div class="dropdown">

		    	<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
				    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
				    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
				    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
				    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
				</ul>
		    </div>
          </div><!-- /.container-fluid -->
		</nav>
        
        <div class="container"><!-- container for content -->
		  	<div class="row gap">
		  		<div class="col-md-3 col-sm-12 col-xs-12 side-gap">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="input-group home-search">
                                <input type="text" class="form-control" placeholder="Search">
		                          <div class="input-group-btn">
                                        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                  </div>
                            </div>
                        </div>
                    </div>
		              <div class="box categories-box" id="categories">
                            <p class="text-center"><strong>CATEGORIES</strong></p>
                            <a data-toggle="collapse" href="#compact" data-parent="#categories" aria-expanded="false" 
                               aria-controls="compact" class="collapsed list-group-item active">Compact Camera<span class="badge">0</span></a>
                            <div id="compact" class="sublinks collapse" aria-labelledby="compact">
                                    <a href="#" class="list-group-item">CANNON</a>
                                    <a href="#" class="list-group-item">NIKON</a>
                                    <a href="#" class="list-group-item">OLYMPUS</a>
                                    <a href="#" class="list-group-item">SONY</a>
                            </div>
                            <a  data-toggle="collapse" href="#dslr" data-parent="#categories" aria-expanded="false"    
                                   aria-controls="dslr" class="collapsed list-group-item active">DSLR Camera<span class="badge">0</span></a>
                            <div id="dslr" class="sublinks collapse" aria-labelledby="dslr">
                                <div class="list-group">
                                    <a href="index.php?product=dslr_cannon" class="list-group-item">CANNON</a>
                                    <a href="index.php?product=dslr_nikon" class="list-group-item">NIKON</a>
                                    <a href="index.php?product=dslr_olympus" class="list-group-item">OLYMPUS</a>
                                    <a href="index.php?product=dslr_sony" class="list-group-item">SONY</a>
                                </div>
                            </div>
                        </div>
                </div>
            
                <div class="col-md-9 col-sm-12 col-xs-12 main">
                    <?php
                        if(isset($_GET['product'])){
                            $page = $_GET['product'];
                                switch ($page){
                                    case "dslr_cannon":
                                        include('assets/digital_camera/dslr_cannon.php');
                                        break;
                                    case "dslr_fuji":
                                        include('assets/digital_camera/dslr_fuji.php');
                                        break;
                                    case "dslr_sony":
                                        include('assets/digital_camera/dslr_sony.php');
                                        break;
                                    case "dslr_nikon":
                                        include('assets/digital_camera/dslr_nikon.php');
                                        break;
                                    case "dslr_olympus":
                                        include('assets/digital_camera/dslr_olympus.php');
                                        break;
                                    default:
                                        include('assets/main.php');
                                }
                        }
                        else
                            include("assets/main.php");
                    ?>
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
