<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Story Jeans</title>
	<link rel="icon" href="img/favicon.ico">
	<link rel="stylesheet" href="libs/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="libs/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="libs/slick/css/slick.css">
	<link rel="stylesheet" href="css/fonts.css">
<!--	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans&amp;subset=latin-ext,vietnamese" rel="stylesheet">-->
<!--	<link href="https://fonts.googleapis.com/css?family=Gentium+Basic" rel="stylesheet">-->
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/media.css">
</head>
<body>
	<header>
		<div class="header-desktop" >
			<div class="logo">

				<a href="index.php">
					<img src="img/logo.png" alt="" >
				</a>
			</div>
			<div class="menu-left">
				<a href="contacts.php">Контакты</a>
				<a href="delivery.php">Доставка и Оплата</a>
				<!-- <a href="faq.php">FAQ</a>
				<a href="#">Новости</a> -->
				<a href="catalog.php">Каталог</a>
			</div>
			<div class="input-wrapper search" data-text="">
					<input type="text" placeholder="Поиск  по сайту…">          
				</div>
			<!-- <div class="menu-right"> -->
				
				<a href="cart.php" class="cart">
					<i class="fa fa-shopping-cart " aria-hidden="true"></i>
					<span id="count-cart">0</span>
				</a>
				<div class="contacts-wrap">
					<div class="phones phones-header">
			            <p class="icon mtc"> 099 378 33 31</p>
						<p class="icon kievstar"> 096 002 65 69</p>
					</div>
				</div>
				<!-- <div class="numbers">
					<a href="tel:0993783331" class="phone ">
						099 378 33 31
					</a>
				</div> -->
		</div>
		<div class="header-mobile">
			<div class="menu-up">
				<a href="index.php" class="logo-mobile">
					<img src="img/1_whitemini_logo.png" alt="">
				</a>
				<a href="tel:0993783331" class="phone ">
						099 378 33 31
					</a>
				<a href="cart.php" class="cart">
					<i class="fa fa-shopping-cart " aria-hidden="true"></i>
					<span>0</span>
				</a>
				<div class="burger">
					<input type="checkbox" id="burger_check" class="burger_checkbox">
					<label for="burger_check">
						<i class="fa fa-bars"></i>
					</label>
				</div>
			</div>
			<div class="menu-left-mobile">
				<a href="catalog.php">Каталог</a>
				<a href="delivery.php">Доставка и Оплата</a>
				<a href="faq.php">FAQ</a>
				<a href="#">Новости</a>
				<a href="contacts.php">Контакты</a>
			</div>
		</div>
	</header>
	<main>