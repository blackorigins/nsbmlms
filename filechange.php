<!doctype html>
<?php
session_start();

$host='localhost';
$connect=mysqli_connect($host,'root','','login');

// Initialize some vars
$user_ok = false;
$log_username = "";
$log_password = "";
// User Verify function
function evalLoggedUser($connect,$u,$p){
	$sql = "SELECT id FROM user WHERE username = '$u' AND password = '$p'";
    $query = mysqli_query($connect, $sql);
    $numrows = mysqli_num_rows($query);
	if($numrows > 0){
		return true;
	}
}
if(isset($_SESSION["userid"]) && isset($_SESSION["username"]) && isset($_SESSION["password"])) {
	$log_username = preg_replace('#[^a-z0-9]#i', '', $_SESSION['username']);
	$log_password = preg_replace('#[^a-z0-9]#i', '', $_SESSION['password']);
	// Verify the user
	$user_ok = evalLoggedUser($connect,$log_username,$log_password);
	
} else if(isset($_COOKIE["user"]) && isset($_COOKIE["password"])){
    $_SESSION['username'] = preg_replace('#[^a-z0-9]#i', '', $_COOKIE['user']);
    $_SESSION['password'] = preg_replace('#[^a-z0-9]#i', '', $_COOKIE['password']);
	$log_username = $_SESSION['username'];
	$log_password = $_SESSION['password'];
	// Verify the user
	$user_ok = evalLoggedUser($connect,$log_username,$log_password);
	
}
if($user_ok==false){
	 die("You have to log in first");
	}

$sql1 ="SELECT user_access FROM user WHERE username = '$log_username' AND password = '$log_password'";
$query=mysqli_query($connect, $sql1);
$user=mysqli_fetch_array($query);
$user_access=$user['user_access'];


?>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<style type="text/css">

body{
	
	font-size:87.5%;
	font-family:Verdana, Geneva, sans-serif;
	line-height:1.5;
	text-align:left;
	/*border:outset;*/
	border-top-color:#FFF;
	border-bottom-color:#FFF;
	border-left-color:#FFF;
	border-right-color:#FFF;
	/*background-clip:content-box;*/
	background:#DCDCDC;
	/*background-image:url(518164-backgrounds.jpg);*/
	}

header img {
	width:17%;
	height:190px;
	float:left;
	margin-top:3px;
	/*box-shadow:1PX 1px 1px 3px rgba(0,0,0,0.25);*/
	border:#FFF outset ;
	border-radius:2px;
	margin-left:3px;
	}
	
header {
	position:relative;
	height:200px;
	width:100%;
	box-shadow: 1PX 1px 1px 2px rgba(0,0,0,0.20);
	border-radius:2px;
	margin-top:0px;
	background-color:#FFF;
	}

header div{
		   width:80%;
		   margin-left:20%;
		   margin-top:0%;
		   position:absolute;
		}
header div h3{
	font-family:fontawesome;
	font-size:32px;
	}

#inside {float:right;
		 /*border:#000 solid 1px;*/
		 margin-top:-3px;
		 font-size:14px;
		 padding:0px;
		 margin-right:5px;	
		}	
		
#inside_p {
			padding-top:0px;
			padding-bottom:0px;
			}
	
#header_div1 {
	margin-right:0px;
	font-family: Verdana, Geneva, sans-serif;
	font-size: 10px;
	font-style: normal;
	background-color:#fff;
	/*margin: 100px;*/
	height: 50px;
	width:81.5%;
	margin-top:11.5%;
	position:absolute;
	margin-left:18%;
	border-top:#9C6 solid 2px;
	border-bottom:#9C6 solid 2px;
}

a {
	text-decoration:none;
	}

nav {
	position:relative;
	box-shadow: 1PX 1px 1px 2px rgba(0,0,0,0.20);
	margin-top:1%;
	/*background: #666;*/
	height:42px;
	border-radius:2px;
	width:100%;
	margin-bottom:0.5%;
	background:#FFF;
	}
	
nav ul{
	list-style:none;
	margin-left:-3%;
	
	}
nav ul li{
	float:left;
	display:inline;
	text-align:left;
	
		}
nav ul li a{
	transition:all 0.3s;
	/*margin-left:35px;*/
	margin-right:35px;
	font-weight:600;
	font-family:Verdana, Geneva, sans-serif;
	font-size:14px;
	}

nav ul li a:link , nav ul li a:visited {
	color:#333;
	display:inline-block;
	padding:10px 20px;
	}
nav ul li a:hover{
	background-color:#00FF7F/*#CF5C3F*/;
	color:#000;	
	}
#topicinside{box-shadow: 1PX 1px 1px 2px #99FF99;
			 width:50%;
			 margin-left:26%;
			}

#topic {font-family:fontawesome;
		  text-shadow: 2px 3px #99FF66;
		  font-size:36px;
		  color:#0000
		 }
#topic2  {font-family:fontawesome;
		  text-shadow: 2px 3px #99FF66;
		  font-size:36px;
		  color:#0000
		 }
#topic3 {
		  font-family:fontawesome;
		  text-shadow: 1px 2px #99FF66;
		  font-size:30px;
		  color:#0000;
		  margin-left:3%;
		}
#topic3inside{
	   box-shadow: 1PX 1px 1px 2px #99FF99;
	   width:45%;
	   text-align:left;
	   margin-left:28%;
	   margin-top:5%;
	
	}


#imgdiv {
		 position:absolute;
		 width:99%;
		 margin-top:-5px;
		 }

#divimg{
	margin-left:17%;
	margin-top:3px;
	box-shadow: 1PX 1px 1px 2px #99FF99;
   }
button{
	display:block;
	margin-top:15px;
	width:250px;
	height:60px;
	box-shadow: 1PX 1px 1px 1px #99FF99;
	text-align:center;
	font-size:18px;
	
	}
#divbutton{
	margin-top:40%;
	width:300px;
	margin-left:40%;
	position:absolute;
	
	}
	#footer1{
	width:99%;
	height:170px;
	margin-top:2%;
	position:absolute;
	margin-bottom:15px;
	}
	#footer1 img{
		width:100%;
		border-radius: 0px 0px 3px 3px;
		height:170px;
		box-shadow:1PX 1px 1px 2px rgba(0,0,0,0.20);
		}
	#footer2{
	height:30px;
	background-color:#333;
	color:#999;
	position:absolute;
	margin-top:14%;
	border-radius:0px 0px 5px 5px;
	width:99%;
	text-align:center;
	margin-bottom:3px;
	
	}
#filehandling{
	box-shadow:1PX 1px 1px 2px rgba(0,0,0,0.20);
	margin-left:30%;
	width:40%;
	padding:1%;
	}
	
#bottomdivfile{margin-bottom:15px;}
	
#filehandling ul {list-style-type:none;}

#filehandling ul li a{color:#333;
					  font-family:Verdana, Geneva, sans-serif;
					
					  
					  }
#filehandling ul li :hover{color:#060;}

.filehandlinginside{box-shadow:1PX 1px 1px 2px rgba(0,0,0,0.20);
					margin-top:-1%;
					padding-bottom:1%;
					margin-bottom:60px;;
					}
	
.filehandlinginside h2{margin-left:1%;
					   color:#333;
					
					}
/*#imghide{display:none;}*/

.adminshow {display:none;}

#addidimg{display:none;}

#addidlink{display:none;}

#innerhtml{display:none;
		   margin-top:-2%;
		   margin-bottom:4px;
		   
		   }
#hideform,#hideid{display:inline;
				  display:none;
					}
#hideform{position:absolute;
		  padding:10px;
		  margin-left:93%;
		  margin-top:0%;
		 }
#hideid{
	padding:10px;
	position:absolute;
	margin-top:4px;
	margin-left:78%;
		}
.button1{width:10%;
		 display:none;}

</style>
<script>

function checklog(){
	var user_access="<?php echo $user_access ?>";
	var x = document.getElementsByClassName('adminshow');
	var y = document.getElementsByClassName('button1');
	var z = document.getElementsByClassName('hidelist');
	var a;
	var i;
	var rtn
	<?php $number=3; ?>
	if(user_access=='b'){
		for(i = 0; i < x.length; i++){
			y[i].style.display="inline-block";
			x[i].style.display="inline-block ";

			}
	}
	
	if(user_access=='a'){

	<?php 
 
 		
 		$connect=mysqli_connect('localhost','root','','computing');
 		$sql = mysqli_query($connect,"SELECT avilability FROM yearonecprogramming WHERE id='1'");
 		$row=mysqli_fetch_array($sql);
 		$available=$row['avilability'];
 	?>
		if("<?php echo $available ?>" == 'y'){
			document.getElementById('hide1').style.display="block";	
		}
		if("<?php echo $available ?>" == 'n'){
			document.getElementById('hide1').style.display="none";
			}
	
	<?php 
 
 		
 		$connect1=mysqli_connect('localhost','root','','computing');
 		$sql1 = mysqli_query($connect1,"SELECT avilability FROM yearonecprogramming WHERE id='2'");
 		$row1=mysqli_fetch_array($sql1);
 		$available1=$row1['avilability'];
 	?>
		if("<?php echo $available1 ?>" == 'y'){
			document.getElementById('hide2').style.display="block";	
		}
		if("<?php echo $available1 ?>" == 'n'){
			document.getElementById('hide2').style.display="none";
			}
	
	<?php 
 
 		
 		$connect2=mysqli_connect('localhost','root','','computing');
 		$sql2 = mysqli_query($connect2,"SELECT avilability FROM yearonecprogramming WHERE id='3'");
 		$row2=mysqli_fetch_array($sql2);
 		$available2=$row2['avilability'];
 	?>
		if("<?php echo $available2 ?>" == 'y'){
			document.getElementById('hide3').style.display="block";	
		}
		if("<?php echo $available2 ?>" == 'n'){
			document.getElementById('hide3').style.display="none";
			}
	
	<?php 
 
 		
 		$connect3=mysqli_connect('localhost','root','','computing');
 		$sql3 = mysqli_query($connect3,"SELECT avilability FROM yearonecprogramming WHERE id='4'");
 		$row3=mysqli_fetch_array($sql3);
 		$available3=$row3['avilability'];
 	?>
		if("<?php echo $available3 ?>" == 'y'){
			document.getElementById('hide4').style.display="block";	
		}
		if("<?php echo $available3 ?>" == 'n'){
			document.getElementById('hide4').style.display="none";
			}
	
	<?php 
 
 		
 		$connect4=mysqli_connect('localhost','root','','computing');
 		$sql4 = mysqli_query($connect4,"SELECT avilability FROM yearonecprogramming WHERE id='5'");
 		$row4=mysqli_fetch_array($sql4);
 		$available4=$row4['avilability'];
 	?>
		if("<?php echo $available4 ?>" == 'y'){
			document.getElementById('hide5').style.display="block";	
		}
		if("<?php echo $available4 ?>" == 'n'){
			document.getElementById('hide5').style.display="none";
			}
	
	<?php 
 
 		
 		$connect5=mysqli_connect('localhost','root','','computing');
 		$sql5 = mysqli_query($connect5,"SELECT avilability FROM yearonecprogramming WHERE id='6'");
 		$row5=mysqli_fetch_array($sql5);
 		$available5=$row5['avilability'];
 	?>
		if("<?php echo $available5 ?>" == 'y'){
			document.getElementById('hide6').style.display="block";	
		}
		if("<?php echo $available5 ?>" == 'n'){
			document.getElementById('hide6').style.display="none";
			}
	
	<?php 
 
 		
 		$connect6=mysqli_connect('localhost','root','','computing');
 		$sql6 = mysqli_query($connect6,"SELECT avilability FROM yearonecprogramming WHERE id='7'");
 		$row6=mysqli_fetch_array($sql6);
 		$available6=$row6['avilability'];
 	?>
		if("<?php echo $available6 ?>" == 'y'){
			document.getElementById('hide7').style.display="block";	
		}
		if("<?php echo $available6 ?>" == 'n'){
			document.getElementById('hide7').style.display="none";
			}
	
}
</script> 
<body onLoad="checklog()">
<header> <img src="nsbm.jpg" alt='Logo'><div><h3> NSBM GREEN UNIVERSITY LERNING MANEGEMENT SYSTEM</h3></div>
  <div id="header_div1"><marquee> <h4>  Recognizing the trends in technology and globalization, NSBM has designed an alternative and innovative approach to higher education to prepare young people to face new challenges of the world. As a degree school which enables its students to experience the future of higher education NSBM is encouraging their students to deal with sophisticated technology throughout their academic life. “e-Learning Management System” is the novel initiative taken up by NSBM to give hi-tech exposure to the students in order to pursue their studies in virtual terms. Through this learning process learners can communicate with their lecturers, their peers, and access learning materials, over the Internet or other computer networks. This area provides you with a wealth of information and resources designed to enrich student’s experience at NSBM. From information on registration, fees and exams to student support services and who to contact for academic advice, you’ll find it all here in one place.</h4></marquee></div>
</header>
<!--<center>-->
<nav>
	<ul>
   
    	<li id="headerhome"><a href="Home.html">Home</a></li>
        <li><a href="#">About us</a></li>
        <li><a href="#">Services</a></li>
        <li><a href="#">Support</a></li>
        <li><a href="#">Events</a></li>
       <div id="hidehide"><h5 id="hideid"></h5><form method="post" action="logout.php" id="hideform"><button 	type="submit" >Log out</button></form></div>
        <div id='inside'><p id="inside_p">You are not logged in(<a href="login.php" id="inside_anchar">Log In</a>)</p></div>
        
    </ul>
</nav>
<div id="topicinside">
<center><div><h1 id='topic'>SCHOOL OF COMPUTING</h1></center>
<center><div><h1 id='topic2'>Year one</h1></center></div>

<div id="topic3inside"><h3 id="topic3">C-PROGRAMMING TOPIC OUT LINE</h3></div>
<br>
<div id="filehandling"><div class="filehandlinginside"><h2>1</h2><ul><li id="hide1" class="hidelist"><h3><img  src="icons/vnd-openxmlformats-officedocum.png">&nbsp; <a href="files/intro c.pptx" download>Introduction to C-Programming</a>&nbsp;&nbsp;&nbsp;<button class="button1" onClick="functiondisplayblock('hide1','Introduction to C-Programming')"><img src="icons/698394-icon-130-cloud-upload-1.png" class="adminshow"></button>&nbsp;&nbsp;&nbsp;
<button class="button1" onClick="functiondisplayhide('hide1','Introduction to C-Programming')" ><img src="icons/download.png" class="adminshow"></button></h3></li>
<li id="hide2" class="hidelist"><h3><img src="icons/Word_PC.gif">&nbsp; <a href="files/tute_1_data_types.docx" download>Tute-Data type</a>&nbsp;&nbsp;&nbsp;<button class="button1" onClick="functiondisplayblock('hide2','Tute-Data type')"><img src="icons/698394-icon-130-cloud-upload-1.png" class="adminshow"></button>&nbsp;&nbsp;&nbsp;
<button class="button1" onClick="functiondisplayhide('hide2','Tute-Data type')"><img src="icons/download.png" class="adminshow" id="imghide"></button></h3></li>
</ul></div>

<div class="filehandlinginside"><h2>2</h2><ul><li id="hide3" class="hidelist"><h3>
<img src="icons/vnd-openxmlformats-officedocum.png">&nbsp;
 <a href="files/Lesson_2 (1).pptx" download>Operetors</a>&nbsp;&nbsp;&nbsp;
 <button class="button1" onClick="functiondisplayblock('hide3','Operetors')"><img src="icons/698394-icon-130-cloud-upload-1.png" class="adminshow"></button>&nbsp;&nbsp;&nbsp;
 <button class="button1" onClick="functiondisplayhide('hide3','Operetors')"> <img src="icons/download.png" class="adminshow"></button></h3></li>
<li id="hide4" class="hidelist"><h3><img src="icons/Word_PC.gif">&nbsp; <a href="files/tute_operators.doc"download>Tute-Operetors</a>&nbsp;&nbsp;&nbsp;<button class="button1" onClick="functiondisplayblock('hide4','Tute-Operetors')"> <img src="icons/698394-icon-130-cloud-upload-1.png" class="adminshow"></button>&nbsp;&nbsp;&nbsp;
<button class="button1" onClick="functiondisplayhide('hide4','Tute-Operetors')" ><img class="adminshow" src="icons/download.png">
</button></h3></li>
</ul></div>

<div class="filehandlinginside" id="bottomdivfile"><h2>3</h2><ul><li id="hide5" class="hidelist"><h3>
<img src="icons/vnd-openxmlformats-officedocum.png">&nbsp;
 <a href="files/Lesson2_part_2.pptx" download>Conditions</a>&nbsp;&nbsp;&nbsp;
 <button class="button1" onClick="functiondisplayblock('hide5','Conditions')">
 <img src= "icons/698394-icon-130-cloud-upload-1.png" class="adminshow"></button>&nbsp;&nbsp;&nbsp;
<button class="button1" onClick="functiondisplayhide('hide5','Conditions')">
 <img src="icons/download.png" class="adminshow" ></button></h3></li>
<li hide="hide6" class="hidelist"><h3><img src="icons/vnd-openxmlformats-officedocum.png">&nbsp; <a href="files/Switch_Case.pptx"download>Switch-case</a>&nbsp;&nbsp;&nbsp;<button class="button1" onClick="functiondisplayblock('hide6','Switch-case')"> <img src="icons/698394-icon-130-cloud-upload-1.png" class="adminshow"></button>&nbsp;&nbsp;&nbsp;<button class="button1" onClick="functiondisplayhide('hide6','Switch-case')"><img src="icons/download.png" class="adminshow" onClick="functiondisplayhide('hide6','Switch-case')"></button></h3></li>
<li id="hide7" class="hidelist"><h3><img src="icons/Word_PC.gif">&nbsp;<a href="files/Switch_Case.pptx"download>Tute-if</a>&nbsp;&nbsp;&nbsp;<button class="button1" onClick="functiondisplayblock('hide5','Conditions')">
<img src="icons/698394-icon-130-cloud-upload-1.png" class="adminshow"></button>&nbsp;&nbsp;&nbsp;
<button class="button1" onClick="functiondisplayhide('hide7','Tute-if')"><img src="icons/download.png" class="adminshow" ></button>
</h3></li>
</ul></div>

</div>

<script>
function functiondisplayhide(hide,lesson){
	
	// Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();
    // Create some variables we need to send to our PHP file
	var url = "available.php";
    var value = 'n';
	var vars = "avilability="+value+"&lesson="+lesson;
	hr.open("POST", url, true);
	// Set content type header information for sending url encoded variables in the request
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	// Access the onreadystatechange event for the XMLHttpRequest object
    hr.onreadystatechange = function() {
	    if(hr.readyState == 4 && hr.status == 200) {
		    var return_data = hr.responseText;
			//document.getElementById("status").innerHTML = return_data;
	    }
	 }
    // Send the data to PHP now... and wait for response to update the status div
    hr.send(vars); // Actually execute the request
   // document.getElementById("status").innerHTML = "processing...";
	}
</script>

<script>
function functiondisplayblock(show,lesson){
	
   // Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();
    // Create some variables we need to send to our PHP file
	var url = "disable.php";
    var value = 'y';
	var vars = "avilability="+value+"&lesson="+lesson;
	hr.open("POST", url, true);
	// Set content type header information for sending url encoded variables in the request
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	// Access the onreadystatechange event for the XMLHttpRequest object
    hr.onreadystatechange = function() {
	    if(hr.readyState == 4 && hr.status == 200) {
		    var return_data = hr.responseText;
			//document.getElementById("status").innerHTML = return_data;
	    }
	 }
    // Send the data to PHP now... and wait for response to update the status div
    hr.send(vars); // Actually execute the request
   // document.getElementById("status").innerHTML = "processing...";
	
	}
</script>
<footer id="footer1"><img src="banner-logos.png" id="footerimg" alt="footerlogo"/> </footer>
<footer id="footer2">Copyright © 2016 National School of Business Management. All Rights Reserved.</footer>
</body>
</html>
