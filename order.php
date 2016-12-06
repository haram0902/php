<?php
session_start();
if(isset($_SESSION['id'])){}
else{
	echo '<script>window.location.href="/"</script>';
}
$conn = pg_Connect("user=postgres password=rhkgkr6 dbname=mpharam");

$query = "select order_id from usertoorder where user_id = ".$_SESSION['id']." and status='current'";
$result = pg_query($conn, $query);
$row = pg_fetch_row($result);
if ($row == null){
	$query = "insert into orders(status,date,total) values('current',now(),0)";
	$result = pg_query($conn, $query);
	$query = "select max(id) from orders";
	$result = pg_query($conn, $query);
	$row = pg_fetch_row($result);
	$query = "insert into usertoorder values(".$_SESSION['id'].",".$row[0].",'current');";
	$result = pg_query($conn, $query);
}
$query = "select product_id from ordertoproduct where order_id = ".$row[0].";";
$result = pg_query($conn, $query);
$row2 = pg_fetch_row($result);
if ($row2 == null){
	$query = "insert into ordertoproduct values(".$row[0].",".$_GET['id'].",".$_POST['amount'].");";
	$result = pg_query($conn, $query);
}
else{
	$query = "update ordertoproduct set quantity = quantity + ".$_POST['amount']." where order_id = ".$row[0]." and product_id = ".$row2[0].";";
	$result = pg_query($conn, $query);
}
$query = "update products set noitems = noitems - ".$_POST['amount']." where id=".$_GET['id'].";";
$result = pg_query($conn, $query);
echo '<script>alert("Successfully added to cart");</script>';
echo '<script>window.location.href="/user";</script>';
?>