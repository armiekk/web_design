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
<div class="col-md-9 col-sm-12 col-xs-12 main" style="margin-bottom:20px;">
    <?php
        if(isset($_GET['panel'])){
            switch($_GET['panel']){
                case 'order_list':
                    include("assets/admin/order_list.php");
                    break;
                case 'add_product':
                    include("manage_product/add_page.php");
                    break;
                case 'manage_product':
                    include("assets/admin/manage_product.php");
                    break;
            }
        }
        elseif(isset($_GET['sort'])){
            include("assets/admin/manage_product.php");
        }       
        else{
            include("assets/admin/order_list.php");
        }
    ?>
</div>
