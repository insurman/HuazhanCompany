<?php
$servername = "qbct6vwi8q648mrn.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
$username = "ugfh1sv9zo2mox6s";
$password = "n561l1ysge1a4eh5";
$dbname = "msiaqwathlw1pkxx";
//連接
$conn = new mysqli($servername, $username, $password,$dbname);
mysqli_query($conn,"SET NAMES 'utf8'");
//連接是否成功 

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>