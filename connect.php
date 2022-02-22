<?php 

$con = new mysqli('127.0.0.1:3306', 'root', '', 'livre_db_donkey');

if(!$con)
{
    die(mysqli_error($con));
}
