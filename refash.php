<?php
require("connect.php");
mysqli_query($conn,"SET NAMES 'utf8'");
$sqlxx = "SET @autoid=0";
if (!mysqli_query($conn,$sqlxx)) {
    echo "無法刪除" . $sqlxx  . "<br>" . mysqli_error($conn);
} else{
	echo "更新".$sqlxx ;
}
$resultsss = "UPDATE valuation SET ID = @autoid :=(@autoid+1)";
if (!mysqli_query($conn,$resultsss)) {
    echo "無法刪除" . $resultsss  . "<br>" . mysqli_error($conn);
} else{
	echo "更新".$resultsss ;
} 
$raa= "ALTER TABLE valuation AUTO_INCREMENT=1";
if (!mysqli_query($conn,$raa)) {
    echo "無法刪除" . $raa  . "<br>" . mysqli_error($conn);
} else{
	echo "更新".$raa ;
}
header("location:valuationform.php");
?>