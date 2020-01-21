<?php
require("connect.php");
$clientname=$_POST["clients"];
$contactname=$_POST["contact"];
$phonenumber=$_POST["PhoneNumber"];
$email=$_POST["email"];
$startday=$_POST["start-day"];
$starthr=$_POST["start-hr"];
$startmi=$_POST["start-mi"];
$endday=$_POST["end-day"];
$endhr=$_POST["end-hr"];
$endmi=$_POST["end-mi"];
$startplace=$_POST["start-place"];
$finalplace=$_POST["final-place"];
$detailtrip=$_POST["detail-trip"];
$insurancerequire=$_POST["customRadioInline1"];
$carlady=$_POST["customRadioInline3"];
$tnumber=$_POST["text-one"];


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if(!empty($clientname)||!empty($contactname)){
$sql = "INSERT INTO valuation
VALUES ('$clientname', '$contactname', '$phonenumber','$email','$startday','$starthr','$startmi','$endday','$endhr','$endmi','$startplace','$finalplace','$detailtrip','$insurancerequire','$carlady','$tnumber','')";
}
if (!mysqli_query($conn,$sql)) {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
header('Location: index.html');
mysqli_close($conn);
?>
