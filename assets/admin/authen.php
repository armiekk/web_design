<?php
    session_start();
    $error = "Username or Password Invalid !!";
    if(isset($_POST['submit'])){
        if(empty($_POST['username']) || empty($_POST['password'])){
            echo $error;
        }
        else{
            $username = $_POST['username'];
            $password = $_POST['password'];
            $link = mysql_connect("127.0.0.1","armst0910","armsozk38");
            mysql_select_db("gunpla_ecommerce",$link)or die("cannot select DB");
            $query =    "select   username,pass,role
                        from admin_authen
                        where username ='$username' AND pass ='$password';";
            $result = mysql_query($query)or die("cannot query");
            if($row = mysql_fetch_array($result)){
                $_SESSION['admin'] = $row['role'];
                header("location: ../../management.php");
            }
            else{
                echo $error;
            }
            
            mysql_close();
        }
    }
?>