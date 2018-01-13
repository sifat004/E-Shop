<?php
     session_start();
    
     
    include_once('header1.php'); 
    include_once('topBar.php'); 
    include_once('navBar.php'); ?>
<?php
    if (isset($_SESSION['username'])) {
      // This session already exists, should already contain data

                echo"

                	
                        <fieldset>
								<div class='control-group'>
									<label class='control-label'>Username</label>
									<div class='controls'>
                                   ".$_SESSION['username']."
                                   
									</div>
								</div>
								<div class='control-group'>
									<label class='control-label'>Email address:</label>
									<div class='controls'>
                                   ".$_SESSION['mail']."

									</div>
								</div>
                       </fieldset>
                      
                       ";

    } else {
        
        header('Location: '."login_registration.php");
        
    
    }


?>


<?php



include_once('footer1.php');


?>