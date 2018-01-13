
<br/>

<div class="row">
<div class="span12">
    <h4 class="title">
        <span class="pull-left"><span class="text"><span class="line">Latest <strong>Products</strong></span></span></span>
        <span class="pull-right">
            <a class="left button" href="#myCarousel-2" data-slide="prev"></a><a class="right button" href="#myCarousel-2" data-slide="next"></a>
        </span>
    </h4>
    <div id="myCarousel-2" class="myCarousel carousel slide">
        <div class="carousel-inner">
            <div class="active item">
                <ul class="thumbnails">	
                                                <?php
                                                $i=-1;
                                                foreach ($latest_products as $key=>$value){
                                                    $i=$i+1;
                                                    if($i>0 && $i%4==0){
                                                        echo"
                                                        </ul>
                                                        </div>
                                                        <div class='item'>
                                                            <ul class='thumbnails'>
                                                        ";
                                                    }  

                                                    echo "<li class='span3'>
                                                    <div class='product-box'>
                                                    <p><a href='product_detail.html'><img src=".$value['img_link']." alt='' /></a></p>
                                                    <a href='product_detail.php?ID=".$value['P_ID']."' class='title'>".$value['P_name']."</a><br/>
                                                    <a href='product_detail.phpID=".$value['P_ID']."' class='category'>".$value['P_desc']."</a>
                                                    <p class='price'>".$value['Price']."</p>
                                                    </div>
                                                ";

                                             
                                                echo "<form class='col-md-3'  method='post' action='cart.php?action=add&id=<?php echo ".$value['P_ID']."; ?>'> 
                                              
                                               <div class='cart'>
                                                
                                                    
                                                    
                                                    <label for='".$value['P_ID']."' >Amount</label>
                                                    <input min='1' value='1' style='width:30px' type='number' name='quantity' id='".$value['P_ID']."'>
                                                    <input type='hidden' name='hidden_name' value='".$value['P_name']."'>
                                                    <input type='hidden' name='hidden_price' value='".$value['Price']."'> 
                                                    <input type='hidden' name='hidden_img' value='".$value['img_link']."'>
                                                               
                                                    <input    class='btn btn-inverse' type='submit' name='add_to_cart' value='add to cart'>
                
                                                 </div>
                                            
                                                </form>
                                                </li>
                                            ";
                                                }

                                                echo "</ul>
                                                </div> </div> </div>	
                                                
                                                
                                                </div>	
                                                </div>		
                                            </div>				
                                        </div>
                                    </section>";

                                                 ?>