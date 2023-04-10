<?php


include 'dbcon.php';

if (isset($_POST["updateEmp"])) {
		$id_emp = $_POST['edit_id'];
		$fname=$_POST['fname'];
		$midname = $_POST['midname'];
		$lname = $_POST['lname'];
		$gender = $_POST['gender'];
		$bday = $_POST['bday'];
		$email = $_POST['email'];
		$phoneno = $_POST['phoneno'];
		$address = $_POST['address'];
		$city = $_POST['city'];
		$province = $_POST['province'];
		$postalcode = $_POST['postalcode'];
		$previousPage = $_SERVER['HTTP_REFERER'];
		
		$departmentTemp = $_POST['department'];
		$department;

		
		if($departmentTemp == "Human Resources"){
			$department = "Human Resources";
		}
		else if($departmentTemp == "Information Technology"){
			$department = "Information Technology";
		}
		else if($departmentTemp == "Marketing"){
			$department = "Marketing";
		}
		else if($departmentTemp == "Operations"){
			$department = "Operations";
		}

		
		$position = $_POST['position'];
		$passwordCheck = $_POST['newPassword'];
		$password = password_hash($_POST['newPassword'],PASSWORD_DEFAULT);
		$cPassword = $_POST['oldPassword'];
		
		//$file = $_POST['fileToUpload'];

		date_default_timezone_set("Asia/Manila");   //function use to set time zone
		//echo date_default_timezone_get();           //display time
		$day = date("F j,Y H:i:s"); //April 26,2022 11:00:00
		// year - sem - seq


		$target_dir = "img/profilepic/";
		$target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		$uploadOk = 1;
		
		$oldPassword = $_POST['checkoldPassword'];
		$correct_password_hash = $_POST['currentPassword'];
		
		if($passwordCheck != $cPassword ){
		  echo "<script>
					alert('Password does not match. Please try again.');
					window.location = '$previousPage';
					</script>";
				$uploadOk = 0;
			
		}else {
			if (password_verify($oldPassword, $correct_password_hash)) {
				if($passwordCheck == "" && $cPassword == ""){
				$uploadOk = 2;
			}else {
				
				$uploadOk = 1;
			}
			}else if($passwordCheck == "" && $cPassword == ""){
				$uploadOk = 2;
			}
			else{
			
				echo "<script>
					alert('Incorrect Old Password.');
					window.location = '$previousPage';
					</script>";
				
				$uploadOk = 0;
			}
		}
		
		if ($uploadOk == 1) {
			// if everything is ok, try to upload file

			if($id_emp<1000){
				$isAdmin = 1;
			}
			else{
				$isAdmin = 0;
			}
		
		

		


        
        $update= "UPDATE employee SET fname='$fname', midname = '$midname', lname = '$lname', gender = '$gender', bday = '$bday', email = '$email', phone_no = '$phoneno', address = '$address', city = '$city', province = '$province', postal_code = '$postalcode', profilepic = '$target_file', department = '$department', position = '$position', password = '$password', isAdmin = '$isAdmin', regdate = '$day' WHERE id_emp= '$id_emp'";


        if (mysqli_query($conn, $update)) {
        ?>
        <script>
            alert('Employee record updated.');
			window.location.href = "<?php echo $previousPage; ?>";
        </script>
        <?php
		
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
        } else {
        echo "Sorry, there was an error uploading your quotation.";
        }        
	}else if ($uploadOk == 2) {
			// if everything is ok, try to upload file

			if($id_emp<1000){
				$isAdmin = 1;
			}
			else{
				$isAdmin = 0;
			}
		
		

		


        
        $update= "UPDATE employee SET fname='$fname', midname = '$midname', lname = '$lname', gender = '$gender', bday = '$bday', email = '$email', phone_no = '$phoneno', address = '$address', city = '$city', province = '$province', postal_code = '$postalcode', profilepic = '$target_file', department = '$department', position = '$position', isAdmin = '$isAdmin', regdate = '$day' WHERE id_emp= '$id_emp'";


        if (mysqli_query($conn, $update)) {
        ?>
        <script>
            alert('No change in password.' + '\n' + 'Employee record updated.');
			window.location.href = "<?php echo $previousPage; ?>";
        </script>
        <?php
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
		
        } else {
        echo "Sorry, there was an error uploading your quotation.";
        }        
	}
}

?>