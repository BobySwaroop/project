
<?php
include('conn.php');
session_start();

if(!isset($_SESSION['email'])){
   header('location:login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}
</style>
</head>
<body>
<?php
$sql = "SELECT `id`, `name`, `email`, `password` FROM `signup` WHERE `email` ='". $_SESSION['email']."'";
$res=mysqli_query($conn,$sql);

if(mysqli_num_rows($res)>0){
  while($row=mysqli_fetch_assoc($res)){
    ?>
    <h2 style="text-align:center">User Profile Page</h2>

<div class="card">
  <img src="user.jpg" alt="John" style="width:100%">
  <h1><?php echo $row['name'];?></h1>
  <p class="title"><?php echo $row['email'];?></p>
  <p>Harvard University</p>
  <div style="margin: 24px 0;">
    <a href="#"><i class="fa fa-dribbble"></i></a> 
    <a href="#"><i class="fa fa-twitter"></i></a>  
    <a href="#"><i class="fa fa-linkedin"></i></a>  
    <a href="#"><i class="fa fa-facebook"></i></a> 
  </div>
  <p><a href="logout.php"><button>Logout</button></a></p>
</div>


    <?php
  }
}
?>

</body>
</html>
