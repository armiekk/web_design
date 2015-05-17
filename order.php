<!DOCTYPE HTML>
<html>
    <head>
        <?php
            session_start();
            include("assets/db.php");
            $db = new Database();
            $db->createDB();
            $query = "select pd_id,pd_name,pd_price,pd_image,sr_id,pd_qty 
                        from tbl_product
                        where pd_id ='".$_POST['order']."';";
            $result = $db->getQuery($query);
            $row = mysql_fetch_array($result);
            $updateQuery = "update tbl_product
                            set sell_qty = sell_qty+1,pd_qty = pd_qty-1 
                            where pd_id = '".$_POST['order']."';";
            $count = count($_SESSION['cart']);
            $_SESSION['total']++;
            $_SESSION['price'] = $_SESSION['price']+$row['pd_price'];
            $i = 0; $match = 1;
            while($i < $count){
                if(strcmp($_POST['order'],$_SESSION['cart'][$i]['id']) == 0){
                    $_SESSION['cart'][$i]['qty'] = $_SESSION['cart'][$i]['qty']+1;
                    $_SESSION['cart'][$i]['price'] = $_SESSION['cart'][$i]['price'] + $row['pd_price'];
                    $match = 0;
                }
                $i++;
            }
            if($match == 1){
                $itemInCart = array('id'=>$row['pd_id'],'name'=>$row['pd_name']
                            ,'qty'=>1,'price'=>$row['pd_price'],'qoh'=>$row['pd_qty']);
                array_push($_SESSION['cart'],$itemInCart);
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
		      <a class="navbar-brand" href="index.php">GUNPLA SHOP</a>
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
                    <?php include("assets/order_item.php");?>
                </div>
        </div>
    </div><!--end of container content -->
	
        <script>
            $('body').on('hidden.bs.modal',".modal", function () {
                $(this).removeData('bs.modal');
            });
        </script>
    </body>
</html>
