<?php
 $connection= mysqli_connect('localhost','root','','products');
 
 if(!$connection){
             exit('DB not connected');
 }

 else{
       echo "Database Connected!";
 } 
 ?> 

