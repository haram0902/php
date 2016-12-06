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
$order_id = $row[0];

$query = "update orders set status='ordered', total=".$_GET['total']." where id = ".$order_id.";";
$result = pg_query($conn, $query);
$query = "update usertoorder set status='ordered' where user_id = ".$_SESSION['id']." and order_id = ".$order_id.";";
$result = pg_query($conn, $query);

echo '<script>alert("Successfully ordered")</script>';
echo '<script>window.location.href="/"</script>';
?>