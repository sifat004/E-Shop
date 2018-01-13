<?php 

       //     print_r($_POST);

        //    $Uname=$_POST['Uname'];
        //    $Pword=$_POST['Pword'];



           require_once ('connection.php');


           $sql=" Insert into `products`(`P_ID`,`P_name`,`P_desc`,`C_date`.`Price`,`Stock`) values (null,'Laptop','ASUS',null,50000,10) ;";
           
           echo  $sql; 
           mysqli_query($connection,$sql);
      

                //  if(mysqli_query($connection,$sql)){

                //        header('location:home.php');
                //  }
                //  else {
                //    echo  "Not added"; 
                       
                //  }



           ?>