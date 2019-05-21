<?php 
include 'php/dbconnect.php';
$GetAllIncomeOverall    = "SELECT *  FROM fees_transaction where submitdate=now()" ;
$GetAIncomeOverall      = $conn->query($GetAllIncomeOverall);
$IncomeColOverall       = mysqli_fetch_assoc($GetAIncomeOverall);
$IncomeOverall          = $IncomeColOverall['submitdate'];

echo $IncomeOverall;

 ?>