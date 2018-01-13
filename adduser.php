<html>




<body>



            <?php 

       //     print_r($_POST);

           $Uname=$_POST['Uname'];
           $Pword=$_POST['Pword'];
           $Mail=$_POST['Mail'];
           echo $Uname;
           echo $Pword;
           

           include_once('DB_class.php'); 
           
           
                 $db= new database();
             
                 
             $db->addUser($Uname,$Pword,$Mail);


          
          
       

                  // if(mysqli_query($connection,$sql)){

                  //       header('location:home.php');
                  // }
                  // else {
                  //   echo  "Not added"; 
                        
                 // }

                
                 
                 ?>
                      
</body>


</html>