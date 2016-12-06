<?php
session_start();
$conn = pg_Connect("user=postgres password=rhkgkr6 dbname=mpharam");

$username = $_POST["username"];
$password = $_POST["password"];
$pw = crypt($password,'st');

$query = "select password,id,firstname,lastname,type from users where username='".$username."';";
$result = pg_query($conn, $query);
$row = pg_fetch_row($result);
if ($row[0] == null){
	echo "Wrong Username or Password";
}
else if($row[0] != $pw){
	echo "Wrong Username or Password";
}
else{
	$_SESSION['username'] = $username;
	$_SESSION['id'] = $row[1];
	$_SESSION['fname'] = $row[2];
	$_SESSION['lname'] = $row[3];
	$_SESSION['type'] = $row[4];
}
echo("<script>location.href='/user';</script>");
?>