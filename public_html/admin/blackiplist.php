<?php 
    include_once'../config/Session.php';
    include_once'../config/Database.php';
    include_once'../config/Utilities.php';
    include_once'header.php';
?>    
     <div style="text-align:center;background-color:white;">
     <table align ="center">
     <tr><td>
     <div style="background-color:white;width:300px;hight:200px;">
     <center>
     <div style="text-align:center;"> 
                  <h2>Wellcone to your admin area</h2>  
     </div>
     </center>
     </div>
     </td>
     </tr>
     </table></div>
     <div style="text-align:center;background-color:violet;padding:5px;">
     </div>
     <div style="text-align:center;background-color:lightblue;padding:20px">
     <table align ="center">
     <tr><td>
     <div style="background-color:white;width:600px;hight:600px;">
     <center>
     <div style="text-align:center;padding: 20px;">
     <?php
                  if(!isset($_SESSION['username'])):
        ?>
                  <ul style='background-color:mistyrose;color:red;'>
                  <h3>Your logged in session expired.Go to <a href="index.php">login</a></h3></ul>
	<?php
                  elseif($_SESSION['username'] != $admusr):
        ?>	
                  <ul style='background-color:mistyrose;color:red;'>
                  <h3>Your logged in session expired.Go to <a href="index.php">login</a></h3></ul>		
		
		<?php else: ?>
		<ul style='background-color:palegreen;color:green;'>
                  <h3>You are logged in as admin of this site</h3></ul>
<?php                  
		if(isset($_POST['adbipBtn'])) {
		//Initilaise the array
		$form_errors = array();

		//form validation
		$required_fields = array('ip');

		//check empty fields and merge into array
		$form_errors = array_merge($form_errors, check_empty_fields($required_fields));

		//Collect data from form
		$ip = $_POST['ip'];
		
		if(checkDuplicateEntries("Blackip", "ip_add", $ip, $db)){
                $resultw = "The black IP address already exit in database table";}
		elseif(empty($form_errors)){
			try{
				//create sql update
				$sqlins = "INSERT INTO Blackip (ip_add) Values(:ip)";

				//Sanitise 
				$statement = $db->prepare($sqlins);

				//update 
				$statement->execute(array(':ip' => $ip));

				//Check if one new row was created
				if($statement->rowCount() == 1){
					$results = 'black IP address added to database table successfully';
						
				}
				else {
					$resultw = 'Error on adding the black IP address to database table';
						
				}
			}
			catch (PDOException $ex) {
				$resultw = "An error occured in: " .$ex->getMessage();
			}
		}
		else {
			if(count($form_errors) == 1) {
				$resultw = "There was 1 error in the form <br>";
			}
			else {
				$resultw = "There were " .count($form_errors). " errors in the form <br>";
			}
		}
		}
		
	if(isset($_POST['dlbipBtn'])) {
		//Initilaise the array
		$form_errors = array();

		//form validation
		$required_fields = array('ip');

		//check empty fields and merge into array
		$form_errors = array_merge($form_errors, check_empty_fields($required_fields));

		//Collect data from form
		$ip = $_POST['ip'];
		
		if(checkDuplicateEntries("Blackip", "ip_add", $ip, $db)){
                
		if(empty($form_errors)){
			try{
				//create sql update
				$sqldel = "DELETE From Blackip WHERE ip_add =:ip";

				//Sanitise 
				$statement = $db->prepare($sqldel);

				//update 
				$statement->execute(array(':ip' => $ip));

				//Check if one new row was created
				if($statement->rowCount() == 1){
					$results = 'The black IP address successfully deleted From database table ';
						
				}
				else {
					$resultw = 'Error on deleting the black IP address from database table';
						
				}
			}
			catch (PDOException $ex) {
				$resultw = "An error occured in: " .$ex->getMessage();
			}
		}
		else {
			if(count($form_errors) == 1) {
				$resultw = "There was 1 error in the form <br>";
			}
			else {
				$resultw = "There were " .count($form_errors). " errors in the form <br>";
			}
		}
		}
		else{ $resultw = "The IP address you want to delete not exit in database table <br>"; }
	}
?>		
<?php     if(isset($resultw)){ ?>
		<ul style='background-color:Mistyrose;color:red;'>
                  <p><?php echo $resultw ; ?></p></ul>
<?php } ?>                  
<?php		if(isset($results)){ ?>
		<ul style='background-color:palegreen;color:green;'>
                  <p><?php echo $results ; ?></p></ul>
<?php } ?>                  
	                  
		<br><h4>Mange faucet</h4>

                  <h4>Delete the black IP address</h4>
                  <form action="" method="POST">
                  <input type="text" name="ip" autocomplete="off" placeholder="enter the IP address" style="width:200px;height:25px;" required>
                  <p><input type="submit" style="width:100px;height:50px;background-color:blue;color:white;" name="dlbipBtn" value="Delete now">
                  </p>
		</form>

                  <h4>Add new black IP address</h4>
                  <form action="" method="POST">
                  <input type="text" name="ip" autocomplete="off" placeholder="enter the IP address" style="width:200px;height:25px;" required>
                  <p><input type="submit" style="width:100px;height:50px;background-color:blue;color:white;" name="adbipBtn" value="Add now">
                  </p>
		</form>
		
              <?php  endif; ?>
              </center>
     </div>
     </td>
     </tr>
     </table>
     </div>
    
<?php        include_once'../footer.php';
    ?>