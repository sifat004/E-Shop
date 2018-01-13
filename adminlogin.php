
<?php
include_once('header1.php');
include_once('topBar.php');

include_once('DB_class.php'); 




if(isset($_POST['Uname_log_in'])){
	$db= new database();
    $Uname=$_POST['Uname_log_in'];
    $Pword=$_POST['Pword_log_in'];
    

    

        if($Uname=='admin'&&$Pword=='admin'){

		
			
            
            header('Location: '."create_product.php");
            
            
        }

        
    else{
        
                echo '<script language="javascript">';
                echo 'alert("Username and password does not match")';
                echo '</script>';
            }
    }

	

    
	
	

?>



?>

<div class="row">
					<div class="span12" align="center">					
						<h4 class="title"><span class="text"><strong>Admin</strong> Login</span></h4>
						<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
							<input type="hidden" name="next" value="/">
							<fieldset>
								<div class="control-group">
									<label class="control-label">Username</label>
									<div class="controls">
										<input type="text" placeholder="Enter your username" id="username" class="input-xlarge" name="Uname_log_in">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Password</label>
									<div class="controls">
										<input type="password" placeholder="Enter your password" id="password" class="input-xlarge" name="Pword_log_in">
									</div>
								</div>
								<div class="control-group">
									<input tabindex="3" class="btn btn-inverse large" type="submit" value="Sign into your account">
									<hr>
									<p class="reset">Recover your <a tabindex="4" href="#" title="Recover your username or password">username or password</a></p>
								</div>
							</fieldset>
						</form>				
					</div>

   


                                    
<?php




?>