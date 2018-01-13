<?php
include_once('DB_class.php');
print_r($_POST);

if(isset($_POST['pid'])){
    $P_ID =$_POST['pid'];
    $db = new database();
    if($db -> deleteProduct($P_ID)){
        header('location:show_products.php?msg=Data Deleted ');
    }
    else{
        header('location:show_products.php?msg=Data Not Deleted ');
        
    }
}

?>