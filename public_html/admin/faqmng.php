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
if(isset($_POST['fqBtn'])) {
		//Initilaise the array
		$form_errors = array();

		//form validation
		$required_fields = array('faq');

		//check empty fields and merge into array
		$form_errors = array_merge($form_errors, check_empty_fields($required_fields));

		//Collect data from form
		$faq = $_POST['faq'];
		
		if(empty($form_errors)){
			try{
				//create sql update
				$sqlUpdate = "UPDATE Other SET faqs =:faq";

				//Sanitise 
				$statement = $db->prepare($sqlUpdate);

				//update 
				$statement->execute(array(':faq' => $faq));

				//Check if one new row was created
				if($statement->rowCount() == 1){
					$results = 'Faqs update setting successful';
						
				}
				else {
					$resultw = 'Nothing change in Faqs';
						
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
	$sqlQuery = "SELECT * FROM Other";
            $statement = $db->prepare($sqlQuery);
            $statement->execute(array());

         //fetch data from DB & compare it with inputted data 
            while($row = $statement->fetch()){
                $faq = $row['faqs'];
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
	                  
		<br><h4>Mange FAQs (use HTML for better look but carefully otherwise your site template will disturb)(Maximum 32000 character)</h4>
		<form action="" method="POST">
                  <textarea name="faq" rows="15" cols="50" placeholder="Use Q for question and A for answer" required><?php echo $faq; ?></textarea>
                  <p><input type="submit" style="width:80px;height:50px;background-color:blue;color:white;" name="fqBtn" value="update">
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