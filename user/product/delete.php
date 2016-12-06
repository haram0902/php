<?php
session_start();
$conn = pg_Connect("user=postgres password=".$_SESSION['password']." dbname=mpharam");
$id = $_GET['id'];

$query = "delete from products where id=".$id.";";
$result = pg_query($conn, $query);
$query = "delete from ordertoproduct where product_id=".$id.";";
$result = pg_query($conn, $query);

echo '<script>alert("Successfully deleted product")</script>';
echo '<script>window.location.href="/"</script>';
?>