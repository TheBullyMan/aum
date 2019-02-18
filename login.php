<?php
session_start();

include ('connect.php');

$strSQL = "SELECT * FROM member WHERE username = '".mysqli_real_escape_string($conn,$_POST['username'])."'
and password = '".mysqli_real_escape_string($conn,$_POST['password'])."'";
$objQuery = mysqli_query($conn,$strSQL);
$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
if(!$objResult)
{
	echo "<body onload=\"window.alert('ชื่อผู้ใช้ หรือ รหัสผ่าน ไม่ถูกต้อง!!');\">";
		echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"1;URL=loginForm.php\">"; 
   		exit();
}
else{
	$_SESSION["user_id"] = $objResult["user_id"];
	$_SESSION["status"] = $objResult["status"];
	session_write_close();
	
	if($objResult["status"] == "user")
	{
		header("location:index_user.php");
	}
	else if($objResult["status"] == "company")
	{
		header("location:index_company.php");
	}
	else
	{
	header("location:index_admin.php");
	}
}
mysqli_close($conn);

echo "Aum";

?>