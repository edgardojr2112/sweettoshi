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
<?php
		if(isset($_POST['SetBtnc1'])) {
		//Initilaise the array
		$form_errors = array();

		//form validation
		$required_fields = array('google_pbk','google_sck');

		//check empty fields and merge into array
		$form_errors = array_merge($form_errors, check_empty_fields($required_fields));

		//Collect data from form
		$Google_pbk = $_POST['google_pbk'];
		$Google_sck = $_POST['google_sck'];
		
		if(empty($form_errors)){
			try{
				//create sql update
				$sqlUpdate = "UPDATE Setting SET Google_pbk =:Google_pbk, Google_sck =:Google_sck ";

				//Sanitise 
				$statement = $db->prepare($sqlUpdate);

				//update 
				$statement->execute(array(':Google_pbk' => $Google_pbk, ':Google_sck' => $Google_sck));

				//Check if one new row was created
				if($statement->rowCount() == 1){
					$results = 'update setting successful';
						
				}
				else {
					$resultw = 'Nothing change in setting';
						
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
	if(isset($_POST['SetBtnc2'])) {
		//Initilaise the array
		$form_errors = array();

		//form validation
		$required_fields = array('selecttype','Challenge_Key','Verification_Key','Hash_Key');

		//check empty fields and merge into array
		$form_errors = array_merge($form_errors, check_empty_fields($required_fields));

		//Collect data from form
		$captcha_service = $_POST['selecttype'];
		$solvemdck = $_POST['Challenge_Key'];
		$solvemdvk = $_POST['Verification_Key'];
		$solvemdhk = $_POST['Hash_Key'];
		
		if(empty($form_errors)){
			try{
				//create sql update
				$sqlUpdate = "UPDATE Setting SET captcha_service =:captcha_service ,solvemdck =:solvemdck, solvemdvk =:solvemdvk ,solvemdhk =:solvemdhk ";

				//Sanitise 
				$statement = $db->prepare($sqlUpdate);

				//update 
				$statement->execute(array(':captcha_service' => $captcha_service ,':solvemdck' => $solvemdck, ':solvemdvk' => $solvemdvk, ':solvemdhk' => $solvemdhk));

				//Check if one new row was created
				if($statement->rowCount() == 1){
					$results = 'update setting successful';
						
				}
				else {
					$resultw = 'Nothing change in setting';
						
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
	if(isset($_POST['SetBtnc3'])) {
		//Initilaise the array
		$form_errors = array();

		//form validation
		$required_fields = array('selecttype','public_key','secret_key');

		//check empty fields and merge into array
		$form_errors = array_merge($form_errors, check_empty_fields($required_fields));

		//Collect data from form
		$captcha_service = $_POST['selecttype'];
		$rainpk = $_POST['public_key'];
		$rainsk = $_POST['secret_key'];
		
		if(empty($form_errors)){
			try{
				//create sql update
				$sqlUpdate = "UPDATE Setting SET captcha_service = :captcha_service ,rainpk =:rainpk, rainsk =:rainsk ";

				//Sanitise 
				$statement = $db->prepare($sqlUpdate);

				//update 
				$statement->execute(array(':captcha_service' => $captcha_service, ':rainpk' => $rainpk, ':rainsk' => $rainsk));

				//Check if one new row was created
				if($statement->rowCount() == 1){
					$results = 'update setting successful';
						
				}
				else {
					$resultw = 'Nothing change in setting';
						
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
	
	if(isset($_POST['SetBtnc4'])) {
		//Initilaise the array
		$form_errors = array();

		//form validation
		$required_fields = array('selecttype');

		//check empty fields and merge into array
		$form_errors = array_merge($form_errors, check_empty_fields($required_fields));

		//Collect data from form
		$captcha_service = $_POST['selecttype'];
		
		if(empty($form_errors)){
			try{
				//create sql update
				$sqlUpdate = "UPDATE Setting SET captcha_service = :captcha_service ";

				//Sanitise 
				$statement = $db->prepare($sqlUpdate);

				//update 
				$statement->execute(array(':captcha_service' => $captcha_service));

				//Check if one new row was created
				if($statement->rowCount() == 1){
					$results = 'update setting successful';
						
				}
				else {
					$resultw = 'Nothing change in setting';
						
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
	
	if(isset($_POST['SetBtnc5'])) {
		//Initilaise the array
		$form_errors = array();

		//form validation
		$required_fields = array('selecttype');

		//check empty fields and merge into array
		$form_errors = array_merge($form_errors, check_empty_fields($required_fields));

		//Collect data from form
		$captcha_service = $_POST['selecttype'];
		
		if(empty($form_errors)){
			try{
				//create sql update
				$sqlUpdate = "UPDATE Setting SET captcha_service = :captcha_service ";

				//Sanitise 
				$statement = $db->prepare($sqlUpdate);

				//update 
				$statement->execute(array(':captcha_service' => $captcha_service ));

				//Check if one new row was created
				if($statement->rowCount() == 1){
					$results = 'update setting successful';
						
				}
				else {
					$resultw = 'Nothing change in setting';
						
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
	
	if(isset($_POST['SetBtnc6'])) {
		//Initilaise the array
		$form_errors = array();

		//form validation
		$required_fields = array('selecttype','public_key','secret_key');

		//check empty fields and merge into array
		$form_errors = array_merge($form_errors, check_empty_fields($required_fields));

		//Collect data from form
		$captcha_service = $_POST['selecttype'];
		$hpk = $_POST['public_key'];
		$hsk = $_POST['secret_key'];
		
		if(empty($form_errors)){
			try{
				//create sql update
				$sqlUpdate = "UPDATE Setting SET captcha_service = :captcha_service ,hcaptcha_pbk =:hpk, hcaptcha_sck=:hsk ";

				//Sanitise 
				$statement = $db->prepare($sqlUpdate);

				//update 
				$statement->execute(array(':captcha_service' => $captcha_service, ':hpk' => $hpk, ':hsk' => $hsk));

				//Check if one new row was created
				if($statement->rowCount() == 1){
					$results = 'update setting successful';
						
				}
				else {
					$resultw = 'Nothing change in setting';
						
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
	
	$sqlQuery = "SELECT * FROM Setting";
            $statement = $db->prepare($sqlQuery);
            $statement->execute(array());

         //fetch data from DB & compare it with inputted data 
            while($row = $statement->fetch()){
                $google_pbk = $row['Google_pbk'];
                $google_sck = $row['Google_sck'];
                $solvemdck = $row['solvemdck'];
                $solvemdvk = $row['solvemdvk'];
                $solvemdhk = $row['solvemdhk'];
                $rainpk = $row['rainpk'];
                $rainsk = $row['rainsk'];
                $hcpk = $row['hcaptcha_pbk'];
                $hcsk = $row['hcaptcha_sck'];
                }
    
?>
		<ul style='background-color:palegreen;color:green;'>
                  <h3>You are logged in as admin of this site</h3></ul>
<?php		if(isset($resultw)){ ?>
		<ul style='background-color:Mistyrose;color:red;'>
                  <p><?php echo $resultw ; ?></p></ul>
<?php } ?>                  
<?php		if(isset($results)){ ?>
		<ul style='background-color:palegreen;color:green;'>
                  <p><?php echo $results ; ?></p></ul>
<?php } ?>                  
		
		<br><h3>Mange Site captcha</h3>
		<br><h4>Google recaptcha</h4>
		<form action="" method="POST">
           <input type="text" name="google_pbk" 
autocomplete="off" placeholder="Google recapcha 
public key" style="width:200px;height:25px;" value 
="<?php echo $google_pbk ; ?>" required>
            <input type="text" name="google_sck" 
value ="<?php echo $google_sck ; ?>" 
autocomplete="off" placeholder ="Google 
recapcha secret key" style="width:200px;height:
25px;" required>
<br><br>
                  <p><input type="submit" style="width:
100px;height:
50px;background-color:blue;color:white;" 
name="SetBtnc1" value="update setting">
                  </p>
    </form>
		<br><h4>Faucet claim captcha</h4><br>
		<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script>
$(document).ready(function(){
    $("select").change(function(){
        $(this).find("option:selected").each(function(){
            var optionValue = $(this).attr("value");
            if(optionValue){
                $(".captcha").not("." + optionValue).hide();
                $("." + optionValue).show();
            } else{
                $(".captcha").hide();
            }
        });
    }).change();
});
</script>
        <select>
            <option>Choose faucet captcha</option>
            <option value="none">No Captcha</option>
            <option value="recaptcha">Google recaptcha</option>
            <option value="hcaptcha">H-captcha</option>
            <option value="solvemedia">Solvemedia</option>
            <option value="raincaptcha">raincaptcha</option>
        </select>
    </div><br>
    <div class="solvemedia captcha">
        <form action="" method="POST">
           <input type="hidden" name="selecttype" 
value="solvemedia">
           <input type="text" name="Challenge_Key" 
autocomplete="off" placeholder="Challenge_key " style="width:200px;height:25px;" value ="<?php echo $solvemdck ; ?>" required>
           <input type="text" name="Verification_Key" 
autocomplete="off" placeholder="Verification key " style="width:200px;height:25px;" value ="<?php echo $solvemdvk ; ?>" required>
           <input type="text" name="Hash_Key" 
autocomplete="off" placeholder="Hash Key" style="width:200px;height:25px;" value ="<?php echo $solvemdhk ; ?>" required>
<br><br>
                  <p><input type="submit" style="width:
100px;height:
50px;background-color:blue;color:white;" 
name="SetBtnc2" value="update setting">
                  </p>
    </form>
        </div><br>
        
    <div class="raincaptcha captcha">
        <form action="" method="POST">
           <input type="hidden" name="selecttype" 
value="raincaptcha">
           <input type="text" name="public_key" 
autocomplete="off" placeholder="Public key" style="width:200px;height:25px;" value ="<?php echo $rainpk ; ?>" required>
           <input type="text" name="secret_key" 
autocomplete="off" placeholder="secret key" style="width:200px;height:25px;" value ="<?php echo $rainsk ; ?>" required>
<br><br>
                  <p><input type="submit" style="width:
100px;height:
50px;background-color:blue;color:white;" 
name="SetBtnc3" value="update setting">
                  </p>
    </form>
    </div><br>
    
	<div class="none captcha">
        <form action="" method="POST">
           <input type="hidden" name="selecttype" 
value="none">
           <p><input type="submit" style="width:
100px;height:
50px;background-color:blue;color:white;" 
name="SetBtnc4" value="update setting">
                  </p>
    </form>
    </div><br>
    
    <div class="recaptcha captcha">
        <form action="" method="POST">
           <input type="hidden" name="selecttype" 
value="recaptcha">
          <p><input type="submit" style="width:
100px;height:
50px;background-color:blue;color:white;" 
name="SetBtnc5" value="update setting">
                  </p>
    </form>
    </div><br>
    
    <div class="hcaptcha captcha">
        <form action="" method="POST">
           <input type="hidden" name="selecttype" 
value="hcaptcha">
           <input type="text" name="public_key" 
autocomplete="off" placeholder="Public key" style="width:200px;height:25px;" value ="<?php echo $hcpk ; ?>" required>
           <input type="text" name="secret_key" 
autocomplete="off" placeholder="secret key" style="width:200px;height:25px;" value ="<?php echo $hcsk ; ?>" required>
<br><br>
                  <p><input type="submit" style="width:
100px;height:
50px;background-color:blue;color:white;" 
name="SetBtnc6" value="update setting">
                  </p>
    </form>
    </div><br>
              <?php  endif; ?>
              </center>
     </div>
     </td>
     </tr>
     </table>
     </div>
    
<?php        include_once'../footer.php';
    ?>