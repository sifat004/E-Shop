

<?php




$title="Shopper";
include_once('header1.php');
include_once('topBar.php');
include_once('navBar.php');


include_once('DB_class.php');
$db=new database();
$cat="Mobile";
$result=$db->getProductByCategory($cat);


?>

<section class="main-content">
				
				<div class="row">						
					<div class="span12">								
						<ul class="thumbnails listing-products">
                        <?php
                       
                        foreach ($result as $key=>$value){
                               

                            echo "<li class='span3'>
                                      <div class='product-box'>
                                      <p><a href='product_detail.html'><img src=".$value['img_link']." alt='' /></a></p>
                                      <a href='product_detail.php?ID=".$value['P_ID']."' class='title'>".$value['P_name']."</a><br/>
                                      <a href='product_detail.phpID=".$value['P_ID']."' class='category'>".$value['category']."</a>
                                      <p class='price'>".$value['Price']."</p>
                                      </div>
                                  </li>";
                        }

                        echo "</ul>
                          </div> 
                        </div> 
                </section>";

                         ?>  
                            




                                        
                
<?php



include_once('footer1.php');


?>