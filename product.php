<?php
session_start();
if(isset($_SESSION['id'])){}
else{
	echo '<script>window.location.href="/"</script>';
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Shopping</title>

		<link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
		
		<style>
            html, body {
                height: 100%;
            }

            body {
				background-color: #C1D9C2;
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-family: 'Righteous';
            }
			.topmenu{
				text-align: left;
				vertical-align: middle;
				background-color: #878885;
				height: 50px;
				box-shadow: 0 2px 10px 0px grey;
			}
			.topborder{
				height: 10px;
			}
            .container {
				height: 91%;
                text-align: center;
                display: table-cell;
            }

            .content {
                text-align: center;
                display: inline-block;
            }
			.image{
				padding-top: 4px;
				padding-left: 20px;
				float: left;
			}
			.menu{
				color: black;
                font-size: 30px;
				font-weight: bold;
				text-shadow: 0 0 1px black;
				float: left;
				padding-left: 10px;
				padding-top: 5px;
			}
			.text{
				font-family: Arial;
				color: rgb(220,220,220);
				border-color: white;
				font-size: 14px;
				font-weight: bold;
				float: right;
				padding-right: 15px;
				padding-left: 15px;
				padding-top: 16px;
				padding-bottom: 16px;
				text-shadow: 0 0 1px grey;
				transition: all 0.5s;
			}
			.marginright{
				color: #878885;
				float: right;
				width: 40px;
				height: 40px;
				background-color: none;
			}
			.text:hover{
				background-color: rgb(90,90,90);
				color: white;
			}
			.welcome{
				font-family: Arial;
				color: rgb(220,220,220);
				border-color: white;
				font-size: 14px;
				font-weight: bold;
				float: right;
				padding-right: 10px;
				padding-top: 16px;
				padding-bottom: 16px;
				text-shadow: 0 0 1px grey;
				transition: all 0.5s;
			}
			.item{
				width: 800px;
				height: 400px;
				background-color: #DFEBF9;
				border-radius: 10px;
				margin-top: 30px;
				margin-left: 80px;
				margin-right: 80px;
				padding: 5px;
				box-shadow: 0 2px 14px 2px grey;
				text-align: left;
			}
			.itemimg{
				width: 250px;
				height: 250px;
				box-shadow: 0 1px 7px 1px grey;
				margin-top: 50px;
				margin-left: 40px;
				float: left;
			}
			.itemtitle{
				font-family: 'Righteous';
				font-size: 17pt;
				font-weight: bold;
				border-radius: 8px;
				background-color: #878885;
				width: 400px;
				heigh: 20px;
				margin-top: 30px;
				margin-left: 320px;
				padding-left: 40px;
				text-shadow: 0 0 1px grey;
				box-shadow: 0 1px 4px 1px grey;
			}
			.itemtxt{
				font-family: 'Righteous';
				font-size: 12pt;
				margin-top: 30px;
				margin-left: 320px;
				border-radius: 8px;
				background-color: rgb(210,210,210);
				box-shadow: 0 1px 4px 1px rgb(180,180,180);
				width: 360px;
				height: 160px;
				padding-left: 40px;
				padding-right: 40px;
				padding-top: 10px;
				text-shadow: 0 0 1px grey;
			}
			.itemprice{
				font-family: 'Righteous';
				font-size: 40pt;
				color: rgb(220,220,220);
				text-shadow: 1px 1px 1px black;
				transition: all 0.4s;
			}
			.button{
				width: 300px;
				height: 100px;
				border-radius: 8px;
				background-color: #878885;
				box-shadow: 0 1px 7px 1px grey;
				margin-top: 20px;
				margin-right: 39px;
				transition: all 0.4s;
				text-align: center;
				float: right;
			}
			.button:hover{
				background-color: rgb(70,180,70);
				box-shadow: 0 2px 13px 2px grey;
			}
			.button:hover .itemprice{
				color: rgb(250,250,250);
			}
			.button:hover .addkart{
				color: red;
			}
			.addkart{
				font-family: Calibri;
				font-size: 12pt;
				font-weight: bold;
				color: rgb(220,220,220);
				text-shadow: 0 1px grey;
				margin-top: 2px;
				transition: all 0.4s;
			}
			.price{
				text-decoration: none;
			}
			.stock{
				border-radius: 8px;
				width: 120px;
				height: 100px;
				background-color: #878885;
				margin-left: 320px;
				margin-top: 20px;
				padding: 1px;
				box-shadow: 0 1px 7px 1px grey;
			}
			.stocknumber{
				font-size: 30pt;
				margin-right: 45px;
				color: rgb(70,180,70);
				margin-top: 5px;
				text-align: center;
				text-shadow: 1px 1px 1px black;
			}
			.stocknumber2{
				font-size: 15pt;
				margin-left: 70px;
				margin-top: 10px;
				color: red;
				text-shadow: 1px 1px 1px black;
			}
			.modalDialog {
				position: fixed;
				font-family: Arial, Helvetica, sans-serif;
				top: 0;
				right: 0;
				bottom: 0;
				left: 0;
				background: rgba(0, 0, 0, 0.8);
				z-index: 99999;
				opacity:0;
				-webkit-transition: opacity 400ms ease-in;
				-moz-transition: opacity 400ms ease-in;
				transition: opacity 400ms ease-in;
				pointer-events: none;
			}
			.modalDialog:target {
				opacity:1;
				pointer-events: auto;
			}
			.modalDialog > div {
				width: 400px;
				height: 300px;
				position: relative;
				margin: 10% auto;
				padding: 5px 20px 13px 20px;
				background: rgb(240,240,240);
				border: 1px solid black;
			}
			.close {
				background: #606061;
				color: #FFFFFF;
				line-height: 25px;
				position: absolute;
				right: -12px;
				text-align: center;
				top: -10px;
				width: 24px;
				text-decoration: none;
				font-weight: bold;
				-webkit-border-radius: 12px;
				-moz-border-radius: 12px;
				border-radius: 12px;
				-moz-box-shadow: 1px 1px 3px #000;
				-webkit-box-shadow: 1px 1px 3px #000;
				box-shadow: 1px 1px 3px #000;
			}
			.amount{
				font-family: 'Righteous';
				font-size: 20pt;
				color: black;
				text-shadow: 0 0 1px black;
				margin: 10px;
			}
			.input{
				height: 40px;
				width: 70px;
				font: Arial;
				font-size: 15pt;
				text-align: center;
			}
			.order{
				font-family: 'Righteous';
				font-size: 20pt;
				color: black;
				text-shadow: 0 0 1px grey;
				width: 140px;
				height: 80px;
				margin-top: 10px;
				border-radius: 5px;
				background: rgb(30,100,170);
				border: 0px solid rgb(50,50,50);
			}
			.order:hover{
				border: 3px solid;
			}
        </style>
    </head>
    <body>
        <div class="container">
			<div class="topborder"></div>
			<div class="topmenu">
				<div class="image"><a href="/"><img src="cart.png" width=40 height=40></img></a></div>
				<a href="/"><div class="menu">Shopping</div></a>
				<div class="marginright"></div>
				<a href="logout.php"><div class="text">Log Out</div></a>
				<a href="/user/history"><div class="text">History</div></a>
				<?php
					echo '<a href="/user/cart"><div class="text">My Cart</div></a>';
					if ($_SESSION['type']==1){
						echo '<a href="/user/product"><div class="text">Products</div></a>';
					}
				?>
				<a href="/"><div class="text">Home</div></a>
				<?php
					echo '<a href="/"><div class="text">'.$_SESSION['lname'].', '.$_SESSION['fname'].'</div></a>';
					echo '<div class="welcome">Welcome, </div>';
				?>
			</div>
            <div class="content">
				<?php
					$conn = pg_Connect("user=postgres password=rhkgkr6 dbname=mpharam");
					$query = "select * from products where id=".$_GET['id'].";";
					$result = pg_query($conn, $query);
					$row = pg_fetch_row($result);
					$price = $row[5];
					$input = 0;
					echo '<div class="item">
							<img src="../image/'.$row[4].'.jpg" class="itemimg"></img>
							<div class="itemtitle">Product Name: '.$row[0].'</div>
							<div class="itemtxt">Detail: '.$row[1].'</div>
							<a class="price" href="#order">
							<div class="button">
								<div class="itemprice">Php '.$row[5].'</div>
								<div class="addkart">Add to Cart</div>
							</div>
							</a>
							<div class="stock">
								<div class="stocknumber">'.$row[3].'</div>
								<div class="stocknumber2">left</div>
							</div>
						</div>
						<div id="order" class="modalDialog">
							<div><a href="#close" title="Close" class="close">X</a>
								<form name="form" onsubmit="return validateform()" action="order.php?id='.$_GET['id'].'" method="POST">
									<div class="amount">Amount: </div>
									<input class="input" name="amount" id="input" type="text" maxlength="4" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="0"></input>
									<div class="amount">Total: </div>
									<div class="amount" id="amount">Php 0</div>
									<input type="submit" class="order" value="Order"></input>
								</form>
							</div>
						</div>';
				?>
            </div>
        </div>
		<script type="text/javascript">
			document.getElementById("input").onkeyup = function(){
				document.getElementById("amount").innerHTML = "Php "+this.value * <?php echo $price ?>;
			}
		</script>
		<script>
			function validateform(){
				var x = document.forms["form"]["amount"].value;
				if (x == null || x == "" || x==0){
					alert("Please indicate the amount you will order");
					return false;
				}
				if (x > <?php echo $row[3]; ?>){
					alert("The amount is more than the stock available");
					return false;
				}
			}
		</script>
    </body>
</html>