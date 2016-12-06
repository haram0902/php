<?php
session_start();
$conn = pg_Connect("user=postgres password=".$_SESSION['password']." dbname=mpharam");
$id = $_GET['id'];
$name = $_POST['itemname'];
$detail = $_POST['detail'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];

$query = "update products set item='".$name."', description = '".$detail."', noitems = ".$quantity.", price = ".$price." where id = ".$id.";";
$result = pg_query($conn, $query);

echo '<script>alert("Successfully updated product")</script>';
echo '<script>window.location.href="/"</script>';
?>