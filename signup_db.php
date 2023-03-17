<?php
include('conn.php');
session_start();
if(isset($_POST['register'])){
    $name= $_POST['uname'];
    $email= $_POST['email'];
    $pass= $_POST['psw'];
    $sql="INSERT INTO `signup`(`name`, `email`, `password`) VALUES ('$name','$email','$pass')";
    $res=mysqli_query($conn,$sql);
    if($res){
        $_SESSION['email']=$_POST['email'];
        header('location:profile.php');
    }
    else{
        echo "something error";
    }
    
}
else{
    echo '<script>alert("Please fill your form")</script>';
}

?>