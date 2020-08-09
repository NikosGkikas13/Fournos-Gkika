<?php
$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');
$name=filter_input(INPUT_POST,'name');
$surname=filter_input(INPUT_POST,'surname');
$address=filter_input(INPUT_POST,'address');
$email=filter_input(INPUT_POST,'email');
$age=filter_input(INPUT_POST,'age');

$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";


if (!empty($username)){
if (!empty($password)){

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


else   if (!preg_match("/^[a-zA-Z ]*$/",$username)) {
 $nameErr = "Only letters and white space allowed ";
 echo "$nameErr";
 die();

    }
	
else{	
$sql = "INSERT INTO customers_info(username)
values ('$username')";






if ($conn->query($sql)){
echo "New record is inserted sucessfully";
}







else{
echo "Error: ". $sql ."
". $conn->error;
}
$conn->close();
}
}
else{
echo "Password should not be empty";
die();
}
}
else{
echo "Username should not be empty";
die();

}
?>

<!DOCTYPE html>
<html>
<head>
<style>
.button {
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}

.button1 {background-color: #4CAF50;} /* Green */
.button2 {background-color: #008CBA;} /* Blue */
</style>
</head>
<body>



<a href="http://localhost:8080/sitefournos2/mo.html"><button class="button button2">Κεντρική Σελίδα</button></a>

</body>
</html>
