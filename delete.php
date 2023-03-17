<?php
include('conn.php');
// if(isset($_GET['id'])){
    $id = $_GET['id'];
// }

$query = "DELETE FROM `employee` WHERE `id` = $id";
$res =mysqli_query($conn,$query);
if($res){
    echo '<script>
    alert("Delete Your Record");
    </script>';
    header('location:index.php');
}

?>