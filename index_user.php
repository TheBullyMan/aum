<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<title>Find For You | หาเพื่อคุณ</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href='https://fonts.googleapis.com/css?family=Kanit&subset=thai,latin' rel='stylesheet' type='text/css'>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
<style>
.tbl-header{
  background-color: rgba(255,255,255,0.3);
 }
  .tbl-content{
  height:300px;
  overflow-x:auto;
  margin-top: 0px;
  border: 1px solid rgba(255,255,255,0.3);
}

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
	
	.font {
	font-family: "Kanit", sans-serif;
	font-size: 14px;}
	
	.font2 {
	font-family: "Kanit", sans-serif;
	font-size: 20px;}
		
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
<br>K. <?php echo $objResult["name"];?>

  <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">
    
	
	<a href="#search" class="w3-bar-item w3-button">หางาน</a>
    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding" onclick="document.getElementById('postjobs').style.display='block'">ฝากงาน</a> 
    <a href="#news" class="w3-bar-item w3-button">บทความเกี่ยวกับงาน</a> <br>
    <a href="#contact" class="w3-bar-item w3-button w3-padding">ติดต่อ</a><br><br><br>
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

<!-- Image header -->
<div class="w3-content w3-display-container" style="max-width:100%">
  <img class="mySlides" src="images/1.jpg" style="width:100%">
  <img class="mySlides" src="images/2.jpg" style="width:100%">
  <img class="mySlides" src="images/3.jpg" style="width:100%">
  
  <div class="w3-center w3-container w3-section w3-large w3-text-white w3-display-bottommiddle" style="width:100%">
    <p><a href="#search" class="w3-button w3-black w3-padding-large w3-large">SEARCH NOW</a></p>
	<div class="w3-left w3-hover-text-khaki" onclick="plusDivs(-1)">&#10094;</div>
    <div class="w3-right w3-hover-text-khaki" onclick="plusDivs(1)">&#10095;</div>
	
    <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(1)"></span>
    <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(2)"></span>
    <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(3)"></span>
  </div>
</div>

<!-- Search Section -->

<div class="w3-hide-large" style="margin-top:83px" bgcolor ="black"></div>
<div class="w3-container w3-text-grey"  id = "search"></div>
<h2 class="w3-wide" align="center">หางาน</h2>
<br>
<div class="container">
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon">Search</span>
					<input type="text" name="search_text" id="search_text" placeholder="Search by Details" class="form-control" />
				</div>
			</div>
			<br />
			<div class="tbl-content" id="result"></div>
		</div>
		<div style="clear:both"></div>
    <br><br>

<!-- News Section -->

    <div class="w3-container w3-text-grey" id="news">
	</div>
	
<div class="w3-hide-large" style="margin-top:83px" bgcolor ="black"></div>
<h2 class="w3-wide" align="center"><b>บทความเกี่ยวกับงาน</b></h2>
<h4 class="w3-wide" align="right"><a href="news.php">ดูทั้งหมด</a></h4>

  <div class="w3-row-padding" style="margin-top:50px" align="center">
	<div class="w3-col l4 m6 w3-margin-bottom">
          <div class="w3-card">
        <div class="thumbnail">
		<img src="images/news/news1.jpg" alt="Image" align="center"/>
		</div>
        <div class="w3-container">
          <h3>บรรยากาศการทำงานที่ดีเริ่มต้นที่ตัวเรา</h3>
          <p><button class="button button2"> <a href="https://www.krungsri.com/bank/th/plearn-plearn/creating-a-positive-work-environment.html?fbclid=IwAR0exHbhh8Qj3PsjRptodCxR233dA_B5vI3cYu9IlD9EL0DWuLXBUIf_kEw"><font color="black">เพิ่มเติม</font></a></button></p>
        </div>
		</div>
    </div>
	  
    <div class="w3-col l4 m6 w3-margin-bottom">
          <div class="w3-card">
        <div class="thumbnail">
		<img src="images/news/news2.jpg" alt="Image" align="center"/>
		</div>
        <div class="w3-container">
          <h3>บรรยากาศการทำงานที่ดีเริ่มต้นที่ตัวเรา</h3>
          <p><button class="button button2"> <a href="https://www.krungsri.com/bank/th/plearn-plearn/creating-a-positive-work-environment.html?fbclid=IwAR0exHbhh8Qj3PsjRptodCxR233dA_B5vI3cYu9IlD9EL0DWuLXBUIf_kEw"><font color="black">เพิ่มเติม</font></a></button></p>
        </div>
		</div>
    </div>
	
    <div class="w3-col l4 m6 w3-margin-bottom">
          <div class="w3-card">
        <div class="thumbnail">
		<img src="images/news/news3.jpg" alt="Image" align="center"/>
		</div>
        <div class="w3-container">
          <h3>บรรยากาศการทำงานที่ดีเริ่มต้นที่ตัวเรา</h3>
          <p><button class="button button2"> <a href="https://www.krungsri.com/bank/th/plearn-plearn/creating-a-positive-work-environment.html?fbclid=IwAR0exHbhh8Qj3PsjRptodCxR233dA_B5vI3cYu9IlD9EL0DWuLXBUIf_kEw"><font color="black">เพิ่มเติม</font></a></button></p>
        </div>
		</div>
    </div>
	
    <div class="w3-col l4 m6 w3-margin-bottom">
          <div class="w3-card">
        <div class="thumbnail">
		<img src="images/news/news4.jpg" alt="Image" align="center"/>
		</div>
        <div class="w3-container">
          <h3>บรรยากาศการทำงานที่ดีเริ่มต้นที่ตัวเรา</h3>
          <p><button class="button button2"> <a href="https://www.krungsri.com/bank/th/plearn-plearn/creating-a-positive-work-environment.html?fbclid=IwAR0exHbhh8Qj3PsjRptodCxR233dA_B5vI3cYu9IlD9EL0DWuLXBUIf_kEw"><font color="black">เพิ่มเติม</font></a></button></p>
        </div>
		</div>
    </div>
	
	 <div class="w3-col l4 m6 w3-margin-bottom">
          <div class="w3-card">
        <div class="thumbnail">
		<img src="images/news/news3.jpg" alt="Image" align="center"/>
		</div>
        <div class="w3-container">
          <h3>บรรยากาศการทำงานที่ดีเริ่มต้นที่ตัวเรา</h3>
          <p><button class="button button2"> <a href="https://www.krungsri.com/bank/th/plearn-plearn/creating-a-positive-work-environment.html?fbclid=IwAR0exHbhh8Qj3PsjRptodCxR233dA_B5vI3cYu9IlD9EL0DWuLXBUIf_kEw"><font color="black">เพิ่มเติม</font></a></button></p>
        </div>
		</div>
    </div>
	
    <div class="w3-col l4 m6 w3-margin-bottom">
          <div class="w3-card">
        <div class="thumbnail">
		<img src="images/news/news4.jpg" alt="Image" align="center"/>
		</div>
        <div class="w3-container">
          <h3>บรรยากาศการทำงานที่ดีเริ่มต้นที่ตัวเรา</h3>
          <p><button class="button button2"> <a href="https://www.krungsri.com/bank/th/plearn-plearn/creating-a-positive-work-environment.html?fbclid=IwAR0exHbhh8Qj3PsjRptodCxR233dA_B5vI3cYu9IlD9EL0DWuLXBUIf_kEw"><font color="black">เพิ่มเติม</font></a></button></p>
        </div>
		</div>
    </div>


  </div>

<br><br>

  <!-- Postjobs Modal -->
<div id="postjobs" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
    <div class="w3-container w3-white w3-center">
      <i onclick="document.getElementById('postjobs').style.display='none'" class="fa fa-remove w3-right w3-button w3-transparent w3-xxlarge"></i>
	<h2 class="w3-wide">ฝากงาน</h2>
      <center>กรุณาเข้าสู่ระบบสำหรับบริษัท</center><br>
		<form name="loginForm" method="post" action="login.php">
			<input type="text" class="font2" name="username" placeholder="ชื่อผู้ใช้">
			<br><input type="password" class="font2" name="password" placeholder="รหัสผ่าน">
			<br><br><input type="submit" class="button" value="เข้าสู่ระบบ">&nbsp;&nbsp;<input type="reset" class="button" name="cancel" value="ยกเลิก"> 
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
			<input type="text" class="font2" name="username" placeholder="ชื่อผู้ใช้">
			<br><input type="password" class="font2" name="password" placeholder="รหัสผ่าน">
			<br><br><input type="submit" class="button" value="เข้าสู่ระบบ">&nbsp;&nbsp;<input type="reset" class="button" name="cancel" value="ยกเลิก"> 
		</form>
		<br><a href="registerForm.php">ยังไม่มีบัญชีผู้ใช้ใช่หรือไม่ ?</a>
    </div>
  </div>
</div>
<!-- Contact Section -->

    <div class="w3-container w3-text-grey" id="contact">
	</div>
	
	<div class="w3-hide-large" style="margin-top:83px" bgcolor ="black"></div>
	<h2 class="w3-wide" align="center"><b>ติดต่อ</b></h2>
	<h2 class="font2" align="center"><b>ช่องทางการติดต่อผู้พัฒนาเว็บไซต์</b></h2><br>

<div class="font" align="center">
<table align="center" border="0" width="100%" style="width: 100%">
<tr>
	<td><a href="https://www.facebook.com/profile.php?id=100004244267210"><img src="images/icon/face.png" width="30" align="center"></a>  Pookie Jidapa<br><br>
	<a href="https://www.instagram.com/?hl=th"><img src="images/icon/ig.png" width="30" align="center"></a>  pookiejs<br><br>
	<img src="images/icon/email.png" width="30" align="center"></a>  jidapa_pook2@hotmail.com</td>

	<td><a href="https://www.facebook.com/praewpailin.sarochwimolsin"><img src="images/icon/face.png" width="30" align="center"></a>  Praewpailin Sarochwimolsin<br><br>
	<a href="https://www.instagram.com/im.ppls/?hl=th"><img src="images/icon/ig.png" width="30" align="center"></a>  im.ppls<br><br>
	<img src="images/icon/email.png" width="30" align="center"></a>  praewpailin.qw@gmail.com</td>
	
	<td><a href="https://www.facebook.com/poramut.toejungreed"><img src="images/icon/face.png" width="30" align="center"></a>  Teddy Ham<br><br>
	<a href="https://www.instagram.com/stealcatfc/?hl=th"><img src="images/icon/ig.png" width="30" align="center"></a>  stealcatfc<br><br>
	<img src="images/icon/email.png" width="30" align="center"></a>  p0r4mut@gmail.com</td>
	
	<td><a href="https://www.facebook.com/aum.ja.50"><img src="images/icon/face.png" width="30" align="center"></a>  Kunanon Reanchop<br><br>
	<a href="https://www.instagram.com/a_aum22/?hl=th"><img src="images/icon/ig.png" width="30" align="center"></a>  a_aum22<br><br>
	<img src="images/icon/email.png" width="30" align="center"></a>  Kunanon2306@gmail.com</td>
	
	<td><a href="https://www.facebook.com/urtrayok"><img src="images/icon/face.png" width="30" align="center"></a>  Thawanrat Keawnil<br><br>
	<a href="https://www.instagram.com/yok_tkeawnil/?hl=th"><img src="images/icon/ig.png" width="30" align="center"></a>  yok_tkeawnil<br><br>
	<img src="images/icon/email.png" width="30" align="center"></a>  urtrayok@hotmail.com</td>

</tr>

</div>
</table>
<br>
<br>

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



$(document).ready(function(){
	load_data();
	function load_data(query)
	{
		$.ajax({
			url:"fetch.php",
			method:"post",
			data:{queryx:query}, // send queryx to fetch.php , give value query
			success:function(data)
			{
				$('#result').html(data);
			}
		});
	}
	
	$('#search_text').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search);
		}
		else
		{
			load_data();			
		}
	});
});
</script>

<br>
<footer class="footer">
  <p > </br>Powered by Find For You</p>
</footer>

</body>
</html>
