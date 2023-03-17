<?php
include('conn.php');

if(!isset($_POST['submit'])){
    echo '<script>alert("fill your details");</script>';
}
else{
    $name =$_POST['name'];
    $department =$_POST['department'];
    $phone =$_POST['phone'];
}
$sql="INSERT INTO `employee`(`name`, `department`, `phone`) VALUES ('$name','$department','$phone')";
$res = mysqli_query($conn,$sql);
if($res){
    echo '<script>
    alert("Add data");
    </script>';
    header('location:index.php');
}
?>