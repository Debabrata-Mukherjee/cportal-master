<?php

    if(isset($_POST['submit']))
    {
        $name = filter_input(INPUT_POST,'name');
        $email = filter_input(INPUT_POST,'email');
        $password = filter_input(INPUT_POST,'password');
        $cpassword = filter_input(INPUT_POST,'cpassword');
        $license = filter_input(INPUT_POST,'license');
        $address = filter_input(INPUT_POST,'address');
        $pin = filter_input(INPUT_POST,'pin');
        $mobile_no = filter_input(INPUT_POST,'mobile_no');
        
        $servername = "localhost";
        $dbusername = "";
        $dbpassword = "";
        $dbname = "";
        
        $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
        if ($conn->connect_error) 
        {
            die("Connection failed: " . $conn->connect_error);
        } 
        else
        {
            // if password != cpassword echo "password is not matching"
            if($password == $cpassword){
            $sql1 = "INSERT INTO user(`email_addr`,`passwrd`,`name`,`addr`,`license_no`) VALUES ('$email','$password','$name','$address','$license')";
            $sql2 = "INSERT INTO login_info(`email_addr`,`passwrd`) values('$email','$password')";
            mysqli_query($conn,$sql1);
            mysqli_query($conn,$sql2);
            }
            else
            {
                die("Passwords isn't matching");
            }
        }
        
        
    }
?>