
<?php 
include_once('header1.php'); 
include_once('topBar.php'); 
include_once('navBar.php'); 



include_once('DB_class.php'); 

if(isset($_POST['Uname'])){
	$db= new database();
    $Uname=$_POST['Uname'];
    $Pword=$_POST['Pword'];
    $Mail=$_POST['Mail'];

    $userlist=$db->getAllUsers();

    foreach ($userlist as $key=>$value){

        if($Mail==$value['email']){

            echo '<script language="javascript">';
            echo 'alert("The mail is already registered")';
            echo '</script>';

            
        }
    }
	
  $db->addUser($Uname,$Pword,$Mail);

  
	
	
}

if(isset($_POST['Uname_log_in'])){
	$db= new database();
    $Uname=$_POST['Uname_log_in'];
    $Pword=$_POST['Pword_log_in'];
    

    $userlist=$db->getAllUsers();

    foreach ($userlist as $key=>$value){

        if(($Uname==$value['email']||$Uname==$value['U_Name'])&&$Pword==$value['password']){

			$Uname=$value['U_Name'];
			$Umail=$value['email'];

        
            session_start();
            
			$_SESSION['username']= $Uname;
			$_SESSION['mail']= $Umail;
			
            
            header('Location: '."homepage.php");

            
        }
    }
	

    echo '<script language="javascript">';
    echo 'alert("Username and password does not match")';
    echo '</script>';
	
	
}
?>



       
			<section class="header_text sub">
			<img class="pageBanner" src="themes/images/pageBanner.png" alt="New products" >
				<h4><span>Login or Regsiter</span></h4>
			</section>			
			<section class="main-content">				
				<div class="row">
					<div class="span5">					
						<h4 class="title"><span class="text"><strong>Login</strong> Form</span></h4>
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
					<div class="span7">					
						<h4 class="title"><span class="text"><strong>Register</strong> Form</span></h4>
						<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="form-stacked">
							<fieldset>
								<div class="control-group">
									<label class="control-label">Username</label>
									<div class="controls">
										<input type="text" placeholder="Enter your username" class="input-xlarge" name="Uname">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Email address:</label>
									<div class="controls">
										<input type="password" placeholder="Enter your email" class="input-xlarge" name="Mail">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Password:</label>
									<div class="controls">
										<input type="password" placeholder="Enter your password" class="input-xlarge" name="Pword">
									</div>
								</div>							                            
								<div class="control-group">
									<p>Now that we know who you are. I'm not a mistake! In a comic, you know how you can tell who the arch-villain's going to be?</p>
								</div>
								<hr>
								<div class="actions"><input tabindex="9" class="btn btn-inverse large" type="submit" value="Create your account"></div>
							</fieldset>
						</form>					
					</div>				
				</div>
            </section>	
            </form>
            


<?php



include_once('footer1.php');


?>