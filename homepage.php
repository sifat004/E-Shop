<?php
session_start();
$title="Shopper";
include_once('DB_class.php');
$db=new database();
$result=$db->getAllProducts();
$latest_products= $db->getLatestProducts();
if(isset($_POST["add_to_cart"])){
    if(isset($_SESSION['shopping_cart'])){
        $item_array_id = array_column($_SESSION["shopping_cart"], "product_id");  
        if(!in_array($_GET["id"], $item_array_id))  
        {  
             $count = count($_SESSION["shopping_cart"]);  
             $item_array = array(  
                  'product_id'               =>     $_GET["id"],  
                  'product_name'               =>     $_POST["hidden_name"],  
                  'product_price'          =>     $_POST["hidden_price"],  
                  'product_stock'          =>     $_POST["quantity"],  
                  'product_img'          =>     $_POST["img"]  
             );  
             $_SESSION["shopping_cart"][$count] = $item_array;  
        } 
        else  
        {  
             echo '<script>alert("Item Already Added")</script>';  
             echo '<script>window.location="homepage.php"</script>';  
        }  
    }
    else{
        $item_array= array(
            'product_id'=> $_GET['id'],
            'product_name'=> $_POST['hidden_name'],
            'product_price'=> $_POST['hidden_price'],
            'product_stock'=> $_POST['quantity'],
            'product_img'          =>     $_POST["img"], 

        );
        $_SESSION['shopping_cart'][0]=$item_array;
    }
}
if(isset($_GET["action"]))  
{  
     if($_GET["action"] == "delete")  
     {  
          foreach($_SESSION["shopping_cart"] as $keys => $values)  
          {  
               if($values["product_id"] == $_GET["id"])  
               {  
                    unset($_SESSION["shopping_cart"][$keys]);  
                    echo '<script>alert("Item Removed")</script>';  
                    echo '<script>window.location="homepage.php"</script>';  
               }  
          }  
     }  
}  ?> 
<?php
include_once('header1.php');
include_once('topBar.php');
include_once('navBar.php');
include_once('slider.php');
include_once('section1.php');
include_once('section2.php');





?>

            
                
<?php


include_once('footer1.php');


?>