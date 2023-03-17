<?php
session_start();
include('conn.php');
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $pass = $_POST['psw'];
    $sql = "SELECT * FROM `signup` WHERE `email` = '".$_POST['email']."' AND `password` = $pass";
    $res=mysqli_query($conn,$sql);
    if(mysqli_num_rows($res)>0){
      while($row=mysqli_fetch_assoc($res)){
       
        $_SESSION['email'] = $row['email'];
         header('location:profile.php');
    }
    
  }
  else{
    echo '<script>alert("Incorrect email or password")</script>';
  }
  
}
else{
    echo '<script>alert("Please fill your login details")</script>';
}


?>
 