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

            function getProductsDetails($id){
                
                                $this->sql= "SELECT * FROM `products` WHERE `P_ID`= $id ;";
                
                                $this->res= mysqli_query($this->conn,$this->sql);
                                
                                $result='';
                                foreach($this->res as $key=>$value){
                                 $result=$value;
                                }
                                return $result;
                            }

            function getLatestProducts(){
                
                                $this->sql= 'SELECT * FROM products ORDER BY C_date';
                
                                $this->res= mysqli_query($this->conn,$this->sql);
                                return $this -> res;
                            }

                                 
           function addUser($name,$password,$mail){
            
                     
                            $id='';
                        $statement=mysqli_stmt_init($this->conn);
                        mysqli_stmt_prepare($statement,"INSERT INTO `users` (`U_ID`,`U_Name`, `password`, `email`) VALUES (?,?,?,?);");
                        
            
                        mysqli_stmt_bind_param($statement,"ssss",$id,$name,$password,$mail);
            
                       
            
                        if( mysqli_stmt_execute($statement)){
                            return "User added";
                        }
                        else{
                            return "User is not added";
                        }
            
                    
            
                       }

                       function getAllUsers(){
                        
                                        $this->sql= 'SELECT * FROM users ORDER BY U_Name';
                        
                                        $this->res= mysqli_query($this->conn,$this->sql);
                                        return $this -> res;
                                    }
                        

            function addProduct($n,$d,$p,$s,$l,$c,$brand,$p_code){
                
                //n=product_name
                //d=description
                //p=price
                //s=stock
                //l=link
                //c=category
                
                $statement=mysqli_stmt_init($this->conn);
                mysqli_stmt_prepare($statement,"INSERT INTO `products` (`P_name`, `P_desc`, `Price`, `Stock`,`img_link`,`category`,`brand`,`product_code`) VALUES (?,?,?,?,?,?,?,?);");
                

                 mysqli_stmt_bind_param($statement,"ssdissss",$n,$d,$p,$s,$l,$c,$brand,$p_code);

               

                if( mysqli_stmt_execute($statement)){
                    return "Data added";
                }
                else{
                    return "Data is not added";
                }
            }

            function deleteProduct($pid){
                $statement=mysqli_stmt_init($this->conn);
                
                                
                
                mysqli_stmt_prepare($statement,"DELETE FROM `products`.`products` WHERE `products`.`P_ID` =?;");
                

                 mysqli_stmt_bind_param($statement,"i",$pid);
                
                
                  return mysqli_stmt_execute($statement);
                
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

        function getProductByCategory($category){
            
                 $this -> sql= "SELECT * FROM `products` WHERE `category` ='$category';";
                 $this -> res = mysqli_query($this->conn,$this->sql);
               
            
             return $this->res;                                
         }

        function updateProduct($pid,$n,$d,$p,$s,$l,$c,$brand,$p_code){
            
                            
            
            $statement=mysqli_stmt_init($this->conn);
            mysqli_stmt_prepare($statement,"UPDATE `products` SET `P_name`=?,`P_desc`=?,`Price`=?,`Stock`=?,`img_link`=?,`category`=?,`brand`=?,`product_code`=? WHERE `P_ID`=?;");
            

             mysqli_stmt_bind_param($statement,"ssdissssi",$n,$d,$p,$s,$l,$c,$pid,$brand,$p_code);

           

            if( mysqli_stmt_execute($statement)){
                return "Data Updated";
            }
            else{
                return "Data is not Updated";
            }
            }

    }
?>