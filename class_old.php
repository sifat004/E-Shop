<?php
    

    class database{

            private $conn,
                    $res,
                    $sql;
            function __construct(){
               $this->conn= mysqli_connect('localhost','root','','products');
            }

            function getAllProducts(){

                $this->sql= 'SELECT * FROM products ORDER BY P_name';

                $this->res= mysqli_query($this->conn,$this->sql);
                return $this -> res;
            }

            function addProduct($n,$d,$p,$s){
                $statement=mysqli_stmt_init($this->conn);
                

                $this -> sql="INSERT INTO `products`.`products` (`P_ID`, `P_name`, `P_desc`, `C_date`, `Price`, `Stock`) VALUES (NULL, '$n', '$d', NOW(), '$p', '$s')";

               

                if( mysqli_query($this->conn,$this->sql)){
                    return "Data added";
                }
                else{
                    return "Data is not added";
                }

               



            }

            function deleteProduct($pid){
                
                                $this -> sql= "DELETE FROM `products`.`products` WHERE `products`.`P_ID` = $pid;";
                
                                return mysqli_query($this->conn,$this->sql);
                
                            }

        function getProductById($pid){
                                
                 $this -> sql= "SELECT * FROM `products` WHERE `P_ID` = $pid;";
                   $this -> res = mysqli_query($this->conn,$this->sql);
                   $row='';
                   foreach($this->res as $key=>$value){
                    $row=$value;
                   }
                   return $row;                                
        }

        function updateProduct($pid,$n,$d,$p,$s){
            
                            $this -> sql="UPDATE `products` SET `P_name`=$n,`P_desc`=$d,`Price`=$p,`Stock`=$s WHERE `P_ID`=$pid;";
            
                           
            
                            if( mysqli_query($this->conn,$this->sql)){
                                return "Data Updated";
                            }
                            else{
                                return "Data is not Updated";
                            }
            
                           
            
            
            
                        }

    }
?>