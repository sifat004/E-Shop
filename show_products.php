<?php




$title="PMS";
include_once('header.php');

include_once('DB_class.php');
$db=new database();
$result=$db->getAllProducts();

// foreach ($result as $key=>$value){

//     echo '<pre>';
//     print_r($value);
//     echo '</pre>';
    
// }
?>
<table class="table table-bordered">

        <thead>
        <th>Product ID</th>
        <th>Product Name </th>
        <th>Product Description </th>
        <th>Price </th>
        <th>Stock </th>
        
        <th>Controls</th>
        </thead>
        
        
        <tbody>
        <?php
        foreach ($result as $key=>$value){
            
                echo "<tr><td>".$value['P_ID']."</td>
                <td>".$value['P_name']."</td>
                <td>".$value['P_desc']."</td>
                <td>".$value['Price']."</td>
                <td>".$value['Stock']."</td>
                <td>
                       
                        
                        <form action='update_product.php' method='POST' style='display:inline'>
                        <input type= 'hidden' name='pid' value='".$value['P_ID']."' readonly='true'/>
                        
                        <input type= 'submit' value='Update' class='btn btn-success'/>

                        </form>

                        <form action='delete_product.php' method='POST' style='display:inline'>
                        <input type= 'hidden' name='pid' value='".$value['P_ID']."' readonly='true'/>
                        <input type= 'submit' value='Delete' class='btn btn-warning'/>

                        </form>
                </td>
                </tr>";
                    
             
           
                
            }
            ?>
        </tbody>

        <tfoot>
        <th colspan="6">
        </tfoot>
</table>
<?php

include_once('footer.php')


?>