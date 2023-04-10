<?php

include 'dbcon.php';

if (isset($_POST["submit"])) {
    $id_emp = $_POST['id_emp'];
    $fname = $_POST['fname'];
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
    $isAdmin;
	$previousPage = $_SERVER['HTTP_REFERER'];


    $departmentTemp = $_POST['department'];
    $department;
    
    if($departmentTemp == "hr"){
        $department = "Human Resources";
    }
    else if($departmentTemp == "it"){
        $department = "Information Technology";
    }
    else if($departmentTemp == "marketing"){
        $department = "Marketing";
    }
    else if($departmentTemp == "operations"){
        $department = "Operations";
    }
    


    $position = $_POST['position'];
    $passwordCheck = $_POST['password'];
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
    $cPassword = $_POST['cPassword'];
    
  
    //$file = $_POST['fileToUpload'];

    date_default_timezone_set("Asia/Manila");   //function use to set time zone
    //echo date_default_timezone_get();           //display time
    $day = date("F j,Y H:i:s"); //April 26,2022 11:00:00
    // year - sem - seq


    $target_dir = "img/profilepic/";
    $target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $uploadOk = 1;

    // Check if file already exists
    if (file_exists($target_file)) {
        ?>
        <script>
            alert("Sorry, the image already exists.");
            
        </script>
        <?php
        $uploadOk = 0;
    }
    
    
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {

        echo "<script>
            alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');
            window.location = '$previousPage';
        </script>";

        $uploadOk = 0;
    }

    if($passwordCheck != $cPassword ) {

        echo "<script>
            alert('Password does not match. Please try again.');
            window.location = '$previousPage';
        </script>";

        $uploadOk = 0;
    }


    if ($uploadOk != 0) {
        // if everything is ok, try to upload file

        if($id_emp<1000){
            $isAdmin = 1;
        }
        else{
            $isAdmin = 0;
			
        }


        

        $insert = "INSERT INTO employee(id_emp,fname,midname,lname,gender,bday,email,phone_no,address,city,province,postal_code,profilepic,department,position,password,isAdmin,regdate,status)
        VALUES ('$id_emp','$fname','$midname','$lname','$gender','$bday','$email','$phoneno','$address','$city','$province','$postalcode','$target_file','$department','$position','$password','$isAdmin','$day','Active')";

        if (mysqli_query($conn, $insert)) {
        ?>
        <script>
            alert('Employee added successfully.');
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