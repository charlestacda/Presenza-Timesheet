<?php

include 'dbcon.php';

if (isset($_POST["login"])) {
    $username = $_POST['loginUsername'];
    $password = $_POST['loginPass'];
    $loginOk=0;
    //echo $username;
    //echo $password;

    $sql = "SELECT id_emp, password FROM employee WHERE status='Active'"; //SQL QUERY FOR DISPLAY RECORDS
    $result = $conn->query($sql);
    
    while ($row=$result->fetch_assoc()) {
        $user = $row['id_emp'];
        $pass = $row['password'];
        
        $verifyPass = password_verify($password, $pass);
        //echo $user;
        //echo $row['password'];
        

        if($verifyPass && $username == $user){
            $loginOk=1;
            break;
        }
        else{
            $loginOk=0;
        }
        //echo $loginOk;
    }

    if ($loginOk != 0) {
        
        ?><script>
            alert('Login successful.');
            window.location = "index.php<?php echo '?$id_emp=' . $username;?>";
        </script>
        <?php
    }
    else {
        ?><script>
          alert('Username and Password did not match. Please try again.');
          window.location = "login.php";
        </script>
        <?php
    }
    

}

?>