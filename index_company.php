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
	
	body,h1,h2,h3,h4,h5,h6 {
		font-family: "Kanit", sans-serif;
		font-size: 20px;
	}
	
	.w3-wide {
	font-family: "Kanit", sans-serif;
	font-size: 30px;}
	
	.footer {
	position: center;
	height:10%;
	background-color: black;
	color: white;
	text-align: center;
	width: 100%;
	font-size: 15px;
	}
	div.table {
    border-radius: 5px;
    background-color: #f2f2f2;
    adding: 20px;
    }
</style>


<body class="w3-content" style="max-width:1500px" bgcolor= "#B9E3AE">

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:300px" id="mySidebar">
  <div class="w3-container w3-display-container w3-padding-16">
    <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
    <h3 class="w3-wide"><b>Find For You</b></h3>
  </div>

<?php
session_start();
if($_SESSION['user_id'] == "")
{
echo "Please Login!";
exit();
}

include ('connect.php');
 
$strSQL = "SELECT * FROM member WHERE user_id = '".$_SESSION['user_id']."' ";

$objQuery = mysqli_query($conn,$strSQL);

$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);

?>


<h3 align ="center">Welcome 
<br>K. <?php echo $objResult["name"];
         $user_id = $_SESSION["user_id"];
?>

  <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">
  <?php echo '<a href="registerFormCompany.php?user_id=' . $user_id . '" class="w3-bar-item w3-button">ข้อมูลบริษัท</a> <br><br>';?>
	
    <a href="#" class="w3-bar-item w3-button">หางาน</a>
    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding" onclick="document.getElementById('postjobs').style.display='block'">ฝากงาน</a> 
    <a href="#" class="w3-bar-item w3-button">บทความเกี่ยวกับงาน</a> <br><br>
    <a href="contact.php" class="w3-bar-item w3-button w3-padding">ติดต่อ</a>
	<a href="edit_profile.php" class="w3-bar-item w3-button">แก้ไขข้อมูลส่วนตัว</a>
	<a href="edit_company.php" class="w3-bar-item w3-button">แก้ไขข้อมูลบริษัท</a>
	<a href="view_regiscom.php" class="w3-bar-item w3-button">ผู้ที่สนใจมาสมัคร</a>
	<a href="logout.php" class="w3-bar-item w3-button">ออกจากระบบ</a></h3>
	
</div>21
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
<br /><br />
<div class="table">
<?php

               // connect to the database
               include("connect.php");
               // get results from database
               $sql="SELECT * FROM jobs WHERE com_id = '".$user_id."'";//'".$user_id."'"
               $rs=$conn->query($sql)or die($conn->error);   
               // Print Header of Table
               echo '<div class="table">';
               echo '<table align="center" border="0"  wjob_idth=80%>'; //open table
               echo '<tr>
               <th><p>ชื่องาน</p></th>
               <th><p>รายละเอียดงาน</p> </th>
               <th><a href="company/insertjobform.php? com_id=' . $user_id . '" class="w3-button w3-xlarge w3-circle w3-black">+</a></th>
                </tr></p>';
               // loop through results of database query, displaying them in the table
               while($row = $rs->fetch_assoc()) {
                // echo out the contents of each row into a table
               $data = "return alertjob_id($row[job_id])";      
               echo "<tr>";
               echo '<td>' . $row['job_name'] . '</td>';
               echo '<td><p>' . $row['job_detail'] . '</p></td>';
               echo '<td><a href="company/detail_job.php?job_id=' . $row['job_id'] . '" class="w3-bar-item w3-button w3-blue" style="width:100%">Detail</a>';
			     echo '<td><a href="company/view_regiscom.php?job_id=' . $row['job_id'] . '" class="w3-bar-item w3-button w3-blue" style="width:40%">ยอดผู้สมัคร</a>';
         echo '<a href="company/editjobForm.php?job_id=' . $row['job_id'] . '" class="w3-bar-item w3-button w3-orange" style="width:25%">Edit</a> ';
               echo '<a href="company/deletejob.php?job_id=' . $row['job_id'] . '"onclick="'.$data.'" class="w3-bar-item w3-button w3-red" style="width:25%">Delete</a></td>';
			   
               echo "</tr>";
               }
               echo "</table>"; // close table
               echo "</div>";
               $conn->close(); // close database connection
               ?></div>

<br /><br />
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
