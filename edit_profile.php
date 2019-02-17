<!DOCTYPE html>
<html>
<title>Find For You | หาเพื่อคุณ</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href='https://fonts.googleapis.com/css?family=Kanit&subset=thai,latin' rel='stylesheet' type='text/css'>
<style>
	.w3-sidebar a {
		font-family: "Kanit",sans-serif;
	}
	
	body{
    background: -webkit-linear-gradient(left, #25c481, #25b7c4);
  background: linear-gradient(to right, #25c481, #25b7c4);
  }
  
  h1,h2,h3,h4,h5,h6 {
		font-family: "Kanit", sans-serif;
		font-size: 20px;
	}
	
	.w3-wide {
	font-family: "Kanit", sans-serif;
	font-size: 30px;
	}
	
	.thumbnail {
	position: relative;
	width: 300px;
	height: 300px;
	overflow: hidden;
	}
	
	.thumbnail img {
	position: absolute;
	left: 50%;
	top: 50%;
	height: 60%;
	width: 100%;
	-webkit-transform: translate(-50%,-50%);
	-ms-transform: translate(-50%,-50%);
	transform: translate(-50%,-50%);
	}
	
	.thumbnail img.portrait {
	width: 100%;
	height: auto;
	}
	
	.button {
  font-family: "Kanit", sans-serif;
  background-color: #F5CBA7; /* Green */
  border-radius: 10px;
  color: black;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
}
	.button2:hover {
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
}
	
.footer {
	position: center;
	height:10%;
	background-color: black;
	color: white;
	text-align: center;
	width: 100%;
	font-size: 15px;
	}

.tbl-header{
  background-color: rgba(255,255,255,0.3);
 }
  .tbl-content{
  height:550px;
  overflow-x:auto;
  margin-top: 0px;
  border: 1px solid rgba(255,255,255,0.3);
  padding: 0px;
}


h1{
  font-size: 30px;
  color: #fff;
  text-transform: uppercase;
  font-weight: 300;
  text-align: center;
  margin-bottom: 15px;
}
table{
  width:100%;
  table-layout: fixed;
}

th{
  padding: 20px 15px;
  text-align: center;
  font-weight: 500;
  font-size: 16px;
  color: #fff;
  text-transform: uppercase;
}
td{
  padding: 15px;
  text-align: center;
  vertical-align:middle;
  font-weight: 300;
  font-size: 20px;
  color: #fff;
  border-bottom: solid 1px rgba(255,255,255,0.1);
}


/* demo styles */

@import url(https://fonts.googleapis.com/css?family=Roboto:400,500,300,700);
body{
  background: -webkit-linear-gradient(left, #25c481, #25b7c4);
  background: linear-gradient(to right, #25c481, #25b7c4);
  font-family: "Kanit", sans-serif;
}
section{
  margin: 50px;
}

/* follow me template */
.made-with-love {
  margin-top: 40px;
  padding: 10px;
  clear: left;
  text-align: center;
  font-size: 10px;
  font-family: arial;
  color: #fff;
}
.made-with-love i {
  font-style: normal;
  color: #F50057;
  font-size: 14px;
  position: relative;
  top: 2px;
}
.made-with-love a {
  color: #fff;
  text-decoration: none;
}
.made-with-love a:hover {
  text-decoration: underline;
}


/* for custom scrollbar for webkit browser*/

::-webkit-scrollbar {
    width: 6px;
} 
::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
} 
::-webkit-scrollbar-thumb {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
}
</style>
<?php

session_start();

if($_SESSION['user_id'] == "")
{
	echo "Please Login!";
	exit();
}
$serverName = "localhost";
$userName = "root";
$userPassword = "";
$dbName = "find_for_you";

$objCon = mysqli_connect($serverName,$userName,$userPassword,$dbName);
$strSQL = "SELECT * FROM member WHERE user_id = '".$_SESSION['user_id']."' ";
$objQuery = mysqli_query($objCon,$strSQL);
$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
?>

<body class="w3-content" style="max-width:1500px" bgcolor= "#B9E3AE">

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:300px" id="mySidebar">
  <div class="w3-container w3-display-container w3-padding-16">
    <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
    <h3 class="w3-wide"><b>Find For You</b></h3>
  </div>
  

<h3 align ="center">Welcome 
<br>K. <?php echo $objResult["name"];?>

  <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">
    
	
	<a href="index_user.php" class="w3-bar-item w3-button">หางาน</a>
    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding" onclick="document.getElementById('postjobs').style.display='block'">ฝากงาน</a> 
    <a href="index_user.php" class="w3-bar-item w3-button">บทความเกี่ยวกับงาน</a> <br>
    <a href="index_user.php" class="w3-bar-item w3-button w3-padding">ติดต่อ</a><br><br><br>
	<a href="edit_profile.php" class="w3-bar-item w3-button">แก้ไขข้อมูลส่วนตัว</a>
	<a href="logout.php" class="w3-bar-item w3-button">ออกจากระบบ</a></h3>
</div>
</nav>

<!-- Top menu on small screens -->
<header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
  <div class="w3-bar-item w3-padding-24 w3-wide">Find For You</div>
  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-24 w3-right" onclick="w3_open()"><i class="fa fa-bars"></i></a>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px" bgcolor ="black">

  <!-- Push down content on small screens -->
<div class="w3-hide-large" style="margin-top:83px" bgcolor ="black"></div>
	
	</header>

<div class="w3-content w3-display-container" style="max-width:100%">
  <img class="mySlides" src="images/header.jpg" style="width:100%">
</div>

<form name="editForm" method="post" action="save_profile.php">


<br><br>
<center><h3 class="w3-wide"><b>Edit Profile</b></h3></center>
<table align="center" border="0" width="400" style="width: 400px">
		<TR><TD align="right">ไอดี &nbsp;</TD>
			<TD><?php echo $objResult["user_id"];?></TD></TR>
		<TR><TD align="right">ชื่อผู้ใช้ &nbsp;</TD>
			<TD><input type="text" name="username" maxlength="100" size="20" value="<?php echo $objResult["username"];?>"></TD></TR>
		<TR><TD align="right">รหัสผ่าน &nbsp;</TD>
			<TD><input type="password" name="password" maxlength="10"size="20" value="<?php echo $objResult["password"];?>"></TD></TR>
		<TR><TD align="right">ยืนยันรหัสผ่าน &nbsp;</TD>
			<TD><input type="password" name="conpassword" maxlength="10"size="20" value="<?php echo $objResult["password"];?>"></TD></TR>
			<TR><TD>&nbsp;</TD></TR>
		<TR><TD align="right">ชื่อ-นามสกุล &nbsp;</TD>
			<TD><input type="text" name="name" maxlength="100"size="20" value="<?php echo $objResult["name"];?>"></TD></TR>
		<TR><TD align="right">ที่อยู่ &nbsp;</TD>
			<TD><input type="text" name="address" maxlength="100"size="20" value="<?php echo $objResult["address"];?>"></TD></TR>
		<TR><TD align="right">อีเมล &nbsp;</TD>
			<TD><input type="email" name="email" maxlength="100"size="20" value="<?php echo $objResult["email"];?>"></TD></TR>
		<TR><TD align="right">เบอร์โทร &nbsp;</TD>
			<TD><input type="text" name="tel" maxlength="100"size="20" value="<?php echo $objResult["tel"];?>"></TD></TR>
		<TR><TD align="right">สถานะ &nbsp;</TD>
			<TD><?php echo $objResult["status"];?></TD></TR>
		
<br>
<TR><TD></TD><TD><BR><input type="submit" name="save" value="บันทึก">
<input type="reset" name="cancel" value="ยกเลิก"></TD></TR>
</table>
</form>
<?php

mysqli_close($objCon);

?>

<!-- Postjobs Modal -->
<div id="postjobs" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
    <div class="w3-container w3-white w3-center">
      <i onclick="document.getElementById('postjobs').style.display='none'" class="fa fa-remove w3-right w3-button w3-transparent w3-xxlarge"></i>
	<h2 class="w3-wide">ฝากงาน</h2>
      <center>กรุณาเข้าสู่ระบบสำหรับบริษัท</center><br>
		<form name="loginForm" method="post" action="login.php">
			<input type="text" class="input1" name="username" placeholder="ชื่อผู้ใช้">
			<br><input type="password" class="input1" name="password" placeholder="รหัสผ่าน">
			<br><br><input type="submit" class="button" value="เข้าสู่ระบบ">&nbsp;&nbsp;<input type="reset" name="cancel" value="ยกเลิก"> 
		</form>
		<br><a href="registerForm.php">ยังไม่มีบัญชีผู้ใช้ใช่หรือไม่ ?</a>
    </div>
  </div>
</div>

<!-- Login Modal -->
<div id="login" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
    <div class="w3-container w3-white w3-center">
      <i onclick="document.getElementById('login').style.display='none'" class="fa fa-remove w3-right w3-button w3-transparent w3-xxlarge"></i>
	<h2 class="w3-wide">เข้าสู่ระบบ</h2>
		<form name="loginForm" method="post" action="login.php">
			<input type="text" class="input1" name="username" placeholder="ชื่อผู้ใช้">
			<br><input type="password" class="input1" name="password" placeholder="รหัสผ่าน">
			<br><br><input type="submit" class="button" value="เข้าสู่ระบบ">&nbsp;&nbsp;<input type="reset" name="cancel" value="ยกเลิก"> 
		</form>
		<br><a href="registerForm.php">ยังไม่มีบัญชีผู้ใช้ใช่หรือไม่ ?</a>
    </div>
  </div>
</div>

<script>
// Accordion 
function myAccFunc() {
  var x = document.getElementById("demoAcc");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else {
    x.className = x.className.replace(" w3-show", "");
  }
}


// Open and close sidebar
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("myOverlay").style.display = "none";
}

// SlideIndex

var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" w3-white", "");
  }
  x[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " w3-white";
}

$(document).ready( function() {
    $('.subMenu').smint({
    	'scrollSpeed' : 1000
    });
});

</script>
<br>
<footer class="footer">
  <p > </br>Powered by Find For You</p>
</footer>

</body>
</html>
