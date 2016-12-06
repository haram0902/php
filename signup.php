<?php 
$conn = pg_Connect("user=postgres password=rhkgkr6 dbname=mpharam");

$query = "select max(id) from users;";
$result = pg_query($conn, $query);
$row = pg_fetch_row($result);

if ($row[0]==null){
	$id = 0;
}
else{
	$id = $row[0]+1;
}
$username = $_POST["username"];
$password = $_POST["password"];
$cpassword = $_POST["cpassword"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];

if ($password == $cpassword){
	$query = "select * from users where username='".$username."';";
	$result = pg_query($conn, $query);
	$row = pg_fetch_row($result);
	if ($row[0] == null){
		$pw = crypt($password,'st');
		$query = "insert into users values(".$id.",'".$username."','".$pw."','".strtoupper($fname)."','".strtoupper($lname)."',0);";
		$result = pg_query($conn, $query);
	}
	else{
		echo "username exist";
	}
}
else{
	echo $password;
	echo $cpassword;
}

pg_close($conn);
echo '<script>location.href="/"</script>';
?>