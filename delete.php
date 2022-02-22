<?php 
include 'connect.php';
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];
    $sql_co="delete from `livres` where id =$id";
    $resultco=mysqli_query($con, $sql_co);
    if($resultco)
    {
        header('location:display.php');
    }
}
