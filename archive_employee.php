<?php
    include 'dbcon.php';

    if(isset($_POST['archiveData'])){

        $empId=$_POST['archive_id'];
		$password = $_POST['inputPassword4'];
		$userPass = $_POST['user_password'];
		$previousPage = $_SERVER['HTTP_REFERER'];
		
		if (password_verify($password, $userPass)) {

        $archiveSql= "UPDATE employee SET status='Archived' WHERE id_emp='$empId'";
        $result=mysqli_query($conn,$archiveSql);
        

        
		
        /*
        Delete Option
        $archiveSql= "DELETE FROM employee WHERE id_emp='$empId'";
        $result=mysqli_query($conn,$archiveSql);
        */

        if($result)
        {
            header("Location: $previousPage");
        }
		}else{
			
			echo "<script>
					alert('Password does not match. Please try again.');
					window.location = '$previousPage';
					</script>";
		}
    }
?>