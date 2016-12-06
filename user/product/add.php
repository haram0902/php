<?php
session_start();
$conn = pg_Connect("user=postgres password=".$_SESSION['password']." dbname=mpharam");
$name = $_POST['itemname'];
$detail = $_POST['detail'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];

$query = "select max(id) from products;";
$result = pg_query($conn, $query);
$row = pg_fetch_row($result);
$id = $row[0];
$id = $id + 1;

$query = "insert into products values('".$name."','".$detail."','available',".$quantity.",".$id.",".$price.");";
echo $query;
$result = pg_query($conn, $query);

echo '<script>alert("Successfully added product")</script>';
echo '<script>window.location.href="/"</script>';
?>