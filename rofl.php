<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (isset($_SESSION['loggedin'])) {
	
   

	echo"kalws ton";
}



$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "customers";
// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
if (mysqli_connect_error()){
die('Connect Error ('. mysqli_connect_errno() .') '
. mysqli_connect_error());
}


// We don't have the password or email info stored in sessions so instead we can get the results from the database.
$stmt = $conn->prepare('SELECT name,password, email FROM customers_info WHERE username = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('s', $_SESSION['name']);
$stmt->execute();
$stmt->bind_result($name,$password, $email);
$stmt->fetch();
$stmt->close();
?>




<html>
<head>
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: lightgray;
  background-image: url("ssepia50.jpg");
  background-repeat: no-repeat;
    background-size:100% 100%;

}
input[type=text], input[type=password] {
  width: 85%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: white;
}

form{
display:block;
  background-color: lightgray;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 50%; /* Could be more or less, depending on screen size */
}

.container {
  padding: 14px;
}

.modal{
display: none;
position: fixed; 
z-index: 1; 
left: 0;
top: 0;
width:100%;
height:100%;
background-color: #474e5d;
}

li5 {
float:left;
position:relative;
top:20px;
background-color: lightgray;
}



ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: white;
}

li {
float:left;
position:relative;
left:450px;
}


li a {
  display: block;
  color: gray;
  text-align: center;
  padding: 44px 50px;
  text-decoration: none;

}

li a:hover {
  background-color: #DCC9C5;
  color:#E8F3CE;
}

li2 {
float:right;
position:relative;
right:450px;
}

li2 a {
  display: block;
  color: gray;
  text-align: center;
  padding: 44px 50px;
  text-decoration: none;

}

li2 a:hover {
  background-color: #DCC9C5;
  color:#E8F3CE;
}

img{
position:absolute;
top:10px;
left:870px;
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 10%;
}
  .clearfix::after {
  content: "";
  clear: both;
  display: table;
}


@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
     width: 30%;
  }
}

.cancelbtn {
  padding: 14px ;
  background-color: #f44336;
 
}

.cancelbtn, .signupbtn {
position:relative;
font-size:20px;
  float: left;
  width: 30%;
  left:20%;
}


input[type="email"]
{
 background-color: white;
 width: 85%;
 height: 5%;
 border-style: none;
}

</style>
</head>
<body>





<ul>
  <li><a href="proiontaparagwgismas.html">Products</a></li>
  <li><a href="gallery.html">Gallery</a></li>
  <li2><a href="">About</a></li2>
  <li2><a href="contact.html">Contact</a></li2>


</ul>

<img class="img" src="LionIcon.png" alt="" width="200" height="100">




<button id="23" onclick="document.getElementById('yeah').style.display='block'" style="width:auto;">Εγγραφή</button>
<button onclick ="document.getElementById('yeah2').style.display='block'" style="width:auto;">Σύνδεση</button>



<div id="yeah" class="modal">
<form class="li5" action="connection.php" method="post">
    <div class="container">
<legend style="font-size: 30px"><b>Εγγραφή χρήστη </b></legend>
<p>Όνομα Χρήστη:<br> <input type="text" name="username" required> </p>
<p>Κωδικός: <br><input type="password" name="password"required></p>
<p>Επιβεβαίωση Κωδικού: <br><input type="password" name="confirmpassword"required></p>
<p>Όνομα: <br><input type="text" name="name"required></p>
<p>Επίθετο: <br><input type="text" name="surname"required></p>
<p>Διέυθυνση: <br><input type="text" name="address"required></p>
<p>Email: <br><input type="email" name="email"required><br> </p>
<div class="clearfix">
        <button type="button" onclick="document.getElementById('yeah').style.display='none'" class="cancelbtn">Cancel</button>
        <button type="submit" class="signupbtn">Sign Up</button>
      </div>
	  </div>

</form>
</div>


<div id="yeah2" class="modal">
<form class="li5" action="yolo.php" method="post" >
<div class="container">
<legend style="font-size:30px"> Σύνδεση</legend>
<p>Όνομα Χρήστη:<br> <input type="text" name="username"required></p>
<p>Κωδικός: <br><input type="password" name="password"required></p><br><br>
<div class="clearfix">
        <button type="button" onclick="document.getElementById('yeah2').style.display='none'" class="cancelbtn">Cancel</button>
        <button type="submit" class="signupbtn">Sign In</button>
      </div>
	  </div>

</form>
</div>

<h2>Profile Page</h2>
			
					<tr>
					
						<td>Welcome:<?=$_SESSION['name']?></td>
					</tr>
					<br>
		
					<tr>
						<td>Email:</td>
						<td><?=$email?></td>
					</tr><br>
					<a href=logout.php>Log out</a>
					




<script>
var modal2 = document.getElementById('yeah2');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal2) {
    modal2.style.display = "none";
  }
}
</script>
<script>
// Get the modal
var modal = document.getElementById('yeah');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>










</body>
</html>
