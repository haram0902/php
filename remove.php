<?php
session_start();
if(isset($_SESSION['id'])){}
else{
	echo '<script>window.location.href="/"</script>';
}
$conn = pg_Connect("user=postgres password=rhkgkr6 dbname=mpharam");

$query = "select order_id from usertoorder where user_id=".$_SESSION['id']." and status='current';";
$result = pg_query($conn, $query);
$row = pg_fetch_row($result);
$order_id = $row[0];

$query = "select quantity from ordertoproduct where order_id=".$order_id." and product_id=".$_GET['id'].";";
$result = pg_query($conn, $query);
$row = pg_fetch_row($result);
$quantity = $row[0];

$query = "delete from ordertoproduct where order_id=".$order_id." and product_id=".$_GET['id'].";";
$result = pg_query($conn, $query);

$query = "update products set noitems = noitems + ".$quantity." where id=".$_GET['id'].";";
$result = pg_query($conn, $query);
echo '<script>alert("Successfully removed from cart")</script>';
echo '<script>window.location.href="/"</script>';
?>