<?php
    include 'dbcon.php';

    if($_GET['student_id'])
    {
        $user_id=$_GET['student_id'];

        $deletesql= "DELETE FROM tbl_users WHERE id='$user_id'";
        
        $result=mysqli_query($conn,$deletesql);

        if($result)
        {
            header("location:admin/dist/tables.php");
        }
    }    
?>