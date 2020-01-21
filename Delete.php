<?php
require("connect.php");
mysqli_query($conn,"SET NAMES 'utf8'");
if(isset($_GET['id'])){
// retrieve id from url.
$id = (int)$_GET['id'];
// sql delete query.
$query = "DELETE FROM valuation WHERE ID='$id'";
}

if (!mysqli_query($conn,$query)) {
    echo "無法刪除" . $query . "<br>" . mysqli_error($conn);
} else{
	echo "成功".$query;
}

mysqli_close($conn);

header("location:valuationform.php");
?>