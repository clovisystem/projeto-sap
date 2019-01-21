<!DOCTYPE html>
<html lang="en">
<head>
	<title>Cryptocurrency - Landing Page Template</title>
	<meta charset="UTF-8">
	<meta name="description" content="Cryptocurrency Landing Page Template">
	<meta name="keywords" content="cryptocurrency, unica, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/themify-icons.css"/>
	<link rel="stylesheet" href="css/animate.css"/>
	<link rel="stylesheet" href="css/owl.carousel.css"/>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="jquery-3.2.1.min.js"/>


	<style>

	h2{
		color:purple;
	}

	</style>
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
        function cadastrar(){
            $('#cadastro').css({"visibility":"visible"});
			$('#cadastroImage').css({"visibility":"visible"});
			$('#credenciais').hide();
			$('#credenciaisImage').hide();
        }
    </script>
		
</head>
<body>
		
	<?php
		ini_set("display_errors",0);
		include('Banco_de_Dados/conexao.php');
	?>

	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Header section -->
	<header class="header-section clearfix">

		<div class="container-fluid">

			<a href="index.html" class="site-logo">
				<img src="img/logo.png" alt="">
			</a>
			<div class="responsive-bar">
			<i class="fa fa-bars"></i></div>
			<a href="" class="user"><i class="fa fa-user"></i></a>
			<button type="button" style="background:transparent;"  class="site-btn" onclick="cadastrar()">Cadastrar Novo Funcionário</button>
			<nav class="main-menu">
				<ul class="menu-list">
					<li><a href="">Solution</a></li>
					<li><a href="">Features</a></li>
					<!--<li><a href="">News</a></li>-->
					<li><a href="">About</a></li>
					<li><a href="">Contact</a></li>
				</ul>
			</nav>
		</div>
	</header>
	<!-- Header section end -->


	<!-- Hero section -->
	<section class="hero-section" style="height:1100px;">
	<!--<div id="notificacao" class="btn btn-danger" style="visibility:-->

	<?php
		
		if($_POST['cadastrar']){

				
				echo '<div id="notificacao" class="btn btn-danger"></div>';
				echo '<div id="permissao" class="btn btn-success"></div>';
		}
		else{
			echo "";
		}	
	
	
		
	 ?><!--"></div>
	<div id="permissao" class="btn btn-success" style="visibility:-->
		<div class="container">

			<div class="row">

				<div class="col-md-6 hero-text" id="credenciais" style="visibility:visible;">
					<h2>Suas Credenciais</h2>		
					<!--<h4>Use modern progressive technologies of Bitcoin to earn money</h4>-->
					<form class="hero-subscribe-from" method="post" action="index.php">
                        <input type="text" name="nome" placeholder="Seu nome de usuário" required>
                        <br/><br/>
                        <input type="password" name="senha" placeholder="Sua senha" required>
                        <br/><br/>
						<button class="site-btn sb-gradients">Entrar</button>
					</form>
				</div>
				<div class="col-md-6" id="credenciaisImage">
					<img src="img/laptop.png" class="laptop-image" alt="">
				</div>



				<!--DIV de cadastro de novos funcionários-->
				<div class="col-md-6 hero-text" id="cadastro" style="visibility:hidden;">
					<h2>Cadastro de Novo Funcionário</h2>
					<!--<h4>Use modern progressive technologies of Bitcoin to earn money</h4>-->
					<form name="formCad" class="hero-subscribe-from" method="post" >
                        <input type="text" name="nomeCad" placeholder="Seu nome de usuário" required>
                        <br/><br/>
						<input type="text" name="setorCad" placeholder="Qual seu setor?" required>
                        <br/><br/>
                        <input type="password" name="senhaCad" placeholder="Sua senha" required>
                        <br/><br/>
						<input type="password" name="repeteSenhaCad" placeholder="Repita sua senha" required>
                        <br/><br/>
						<input type="submit" name="cadastrar" value="Cadastrar" class="site-btn sb-gradients"/>
					</form>
					<?php
						

						if($_POST['cadastrar']=="Cadastrar"){
						

							$nomeCad=filter_input(INPUT_POST,nomeCad);
							$setorCad=filter_input(INPUT_POST,setorCad);
							$senhaCad=filter_input(INPUT_POST,senhaCad);
							$repeteSenhaCad=filter_input(INPUT_POST,repeteSenhaCad);	
							
							/*echo $nomeCad=$_POST['nomeCad'];
							echo $nomeCad=str_replace(" ","_",$_POST['nomeCad']);
							echo $setorCad=$_POST['setorCad'];
							echo $senhaCad=$_POST['senhaCad'];
							echo $repeteSenhaCad=$_POST['repeteSenhaCad'];*/

							$verificaFuncionario=mysqli_query($conexao,"select * from funcionarios WHERE func_nome='$nomeCad'");
							$verificaFuncionarioRows=mysqli_num_rows($verificaFuncionario);
									
									
							if($verificaFuncionarioRows > 0){
								echo"<script>
									window.onload=function(){
										$('#notificacao').show();
										$('#notificacao').html('Cadastro já existente, tente outro nome');
										
										$('#permissao').hide();
									}
									</script>";	
														
							
							}
							else{
							//$nome=$_POST['nome'];
							//$senha=$_POST['senha'];
				

								$queryCadastra=mysqli_query($conexao,"insert into funcionarios (func_nome,func_senha,func_setor) values('$nomeCad','$senhaCad','$setorCad')");

									echo"<script>
									window.onload=function(){

										$('#permissao').show();
										$('#permissao').html('Cadastro realizado com sucesso, logue-se!');
									
										$('#notificacao').hide();
									}
									</script>";					
									
								
							}

									if($senhaCad != $repeteSenhaCad){
												echo"<script>
															window.onload=function(){
																	$('#notificacao').html('Senhas não conferem.');
																}
													</script>";
									}
											
								}
							
					
					?>
				</div>
				<div class="col-md-6" id="cadastroImage" style="visibility:hidden;">
					<img src="img/laptop.png" class="laptop-image" alt="">
				</div>
			</div>
        </div>
        
	</section>
	<!-- Hero section end -->

<?php

	/*<!-- About section -->
	<section class="about-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 offset-lg-6 about-text">
					<h2>What is Bitcoin</h2>
					<h5>Bitcoin is an innovative payment network and a new kind of money.</h5>
					<p>Bitcoin is one of the most important inventions in all of human history. For the first time ever, anyone can send or receive any amount of money with anyone else, anywhere on the planet, conveniently and without restriction. It’s the dawn of a better, more free world.</p>
					<a href="" class="site-btn sb-gradients sbg-line mt-5">Get Started</a>
				</div>
			</div>
			<div class="about-img">
				<img src="img/about-img.png" alt="">
			</div>
		</div>
	</section>
	<!-- About section end -->


	<!-- Features section -->
	<section class="features-section spad gradient-bg">
		<div class="container text-white">
			<div class="section-title text-center">
				<h2>Our Features</h2>
				<p>Bitcoin is the simplest way to exchange money at very low cost.</p>
			</div>
			<div class="row">
				<!-- feature -->
				<div class="col-md-6 col-lg-4 feature">
					<i class="ti-mobile"></i>
					<div class="feature-content">
						<h4>Mobile Apps</h4>
						<p>Excepteur sint occaecat cupidatat non proident sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
						<a href="" class="readmore">Readmore</a>
					</div>
				</div>
				<!-- feature -->
				<div class="col-md-6 col-lg-4 feature">
					<i class="ti-shield"></i>
					<div class="feature-content">
						<h4>Safe & Secure</h4>
						<p>Excepteur sint occaecat cupidatat non proident sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
						<a href="" class="readmore">Readmore</a>
					</div>
				</div>
				<!-- feature -->
				<div class="col-md-6 col-lg-4 feature">
					<i class="ti-wallet"></i>
					<div class="feature-content">
						<h4>Wallet</h4>
						<p>Excepteur sint occaecat cupidatat non proident sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
						<a href="" class="readmore">Readmore</a>
					</div>
				</div>
				<!-- feature -->
				<div class="col-md-6 col-lg-4 feature">
					<i class="ti-headphone-alt"></i>
					<div class="feature-content">
						<h4>Experts Support</h4>
						<p>Excepteur sint occaecat cupidatat non proident sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
						<a href="" class="readmore">Readmore</a>
					</div>
				</div>
				<!-- feature -->
				<div class="col-md-6 col-lg-4 feature">
					<i class="ti-reload"></i>
					<div class="feature-content">
						<h4>Instant Exchange</h4>
						<p>Excepteur sint occaecat cupidatat non proident sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
						<a href="" class="readmore">Readmore</a>
					</div>
				</div>
				<!-- feature -->
				<div class="col-md-6 col-lg-4 feature">
					<i class="ti-panel"></i>
					<div class="feature-content">
						<h4>Recuring Buys</h4>
						<p>Excepteur sint occaecat cupidatat non proident sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
						<a href="" class="readmore">Readmore</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Features section end -->


	<!-- Process section -->
	<section class="process-section spad">
		<div class="container">
			<div class="section-title text-center">
				<h2>Get Started With Bitcoin</h2>
				<p>Start learning about Bitcoin with interactive tutorials. It’s fun, easy, and takes only a few minutes! </p>
			</div>
			<div class="row">
				<div class="col-md-4 process">
					<div class="process-step">
						<figure class="process-icon">
							<img src="img/process-icons/1.png" alt="#">
						</figure>
						<h4>Create Your Wallet</h4>
						<p>Excepteur sint occaecat cupidatat non proident sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
					</div>
				</div>
				<div class="col-md-4 process">
					<div class="process-step">
						<figure class="process-icon">
							<img src="img/process-icons/2.png" alt="#">
						</figure>
						<h4>Create Your Wallet</h4>
						<p>Excepteur sint occaecat cupidatat non proident sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
					</div>
				</div>
				<div class="col-md-4 process">
					<div class="process-step">
						<figure class="process-icon">
							<img src="img/process-icons/3.png" alt="#">
						</figure>
						<h4>Create Your Wallet</h4>
						<p>Excepteur sint occaecat cupidatat non proident sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Process section end -->


	<!-- Fact section -->
	<section class="fact-section gradient-bg">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-6 col-lg-3">
					<div class="fact">
						<h2>60</h2>
						<p>Support <br> Countries</p>
						<i class="ti-basketball"></i>
					</div>
				</div>
				<div class="col-sm-6 col-md-6 col-lg-3">
					<div class="fact">
						<h2>12K</h2>
						<p>Transactions  <br> per hour</p>
						<i class="ti-panel"></i>
					</div>
				</div>
				<div class="col-sm-6 col-md-6 col-lg-3">
					<div class="fact">
						<h2>5B</h2>
						<p>Largest <br> Transactions</p>
						<i class="ti-stats-up"></i>
					</div>
				</div>
				<div class="col-sm-6 col-md-6 col-lg-3">
					<div class="fact">
						<h2>240</h2>
						<p>Years <br> of Experience</p>
						<i class="ti-user"></i>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Fact section end -->


	<!-- Team section -->
	<section class="team-section spad">
		<div class="container">
			<div class="section-title text-center">
				<h2>Meet Our Team</h2>
				<p>Our experts in the field of crypto currency can always help you with any of your questions!</p>
			</div>
		</div>
		<div class="team-members clearfix">
			<!-- Team member -->
			<div class="member">
				<div class="member-text">
					<div class="member-img set-bg" data-setbg="img/member/1.jpg"></div>
					<h2>Tom Binegar</h2>
					<span>Business Development</span>
				</div>
				<div class="member-social">
					<a href=""><i class="fa fa-facebook"></i></a>
					<a href=""><i class="fa fa-linkedin"></i></a>
					<a href=""><i class="fa fa-twitter"></i></a>
				</div>
				<div class="member-info">
					<div class="member-img mf set-bg" data-setbg="img/member/1.jpg"></div>
					<div class="member-meta">
						<h2>Tom Binegar</h2>
						<span>Marketing Director</span>
					</div>
					<p>Jackson Nash is a full-time faculty member of the Marketing and Behavioural Science Division at the Sauder School of Business at UBC. He leads the Entrepreneurship Group, in the undergraduate and graduate programs, teaching actively in both of these.</p>
				</div>
			</div>
			<!-- Team member -->
			<div class="member">
				<div class="member-text">
					<div class="member-img set-bg" data-setbg="img/member/2.jpg"></div>
					<h2>Jackson Nash</h2>
					<span>Business Development</span>
				</div>
				<div class="member-social">
					<a href=""><i class="fa fa-facebook"></i></a>
					<a href=""><i class="fa fa-linkedin"></i></a>
					<a href=""><i class="fa fa-twitter"></i></a>
				</div>
				<div class="member-info">
					<div class="member-img mf set-bg" data-setbg="img/member/2.jpg"></div>
					<div class="member-meta">
						<h2>Jackson Nash</h2>
						<span>Marketing Director</span>
					</div>
					<p>Jackson Nash is a full-time faculty member of the Marketing and Behavioural Science Division at the Sauder School of Business at UBC. He leads the Entrepreneurship Group, in the undergraduate and graduate programs, teaching actively in both of these.</p>
				</div>
			</div>
			<!-- Team member -->
			<div class="member">
				<div class="member-text">
					<div class="member-img set-bg" data-setbg="img/member/3.jpg"></div>
					<h2>Tom Binegar</h2>
					<span>Business Development</span>
				</div>
				<div class="member-social">
					<a href=""><i class="fa fa-facebook"></i></a>
					<a href=""><i class="fa fa-linkedin"></i></a>
					<a href=""><i class="fa fa-twitter"></i></a>
				</div>
				<div class="member-info">
					<div class="member-img mf set-bg" data-setbg="img/member/3.jpg"></div>
					<div class="member-meta">
						<h2>Aaron Ballance</h2>
						<span>Ceo Bitcoin</span>
					</div>
					<p>Jackson Nash is a full-time faculty member of the Marketing and Behavioural Science Division at the Sauder School of Business at UBC. He leads the Entrepreneurship Group, in the undergraduate and graduate programs, teaching actively in both of these.</p>
				</div>
			</div>
			<!-- Team member -->
			<div class="member">
				<div class="member-text">
					<div class="member-img set-bg" data-setbg="img/member/4.jpg"></div>
					<h2>Melissa Barth</h2>
					<span>Product Manager</span>
				</div>
				<div class="member-social">
					<a href=""><i class="fa fa-facebook"></i></a>
					<a href=""><i class="fa fa-linkedin"></i></a>
					<a href=""><i class="fa fa-twitter"></i></a>
				</div>
				<div class="member-info">
					<div class="member-img mf set-bg" data-setbg="img/member/4.jpg"></div>
					<div class="member-meta">
						<h2>Melissa Barth</h2>
						<span>Product Manager</span>
					</div>
					<p>Jackson Nash is a full-time faculty member of the Marketing and Behavioural Science Division at the Sauder School of Business at UBC. He leads the Entrepreneurship Group, in the undergraduate and graduate programs, teaching actively in both of these.</p>
				</div>
			</div>
			<!-- Team member -->
			<div class="member">
				<div class="member-text">
					<div class="member-img set-bg" data-setbg="img/member/5.jpg"></div>
					<h2>Katy Abrams</h2>
					<span>Head of Design</span>
				</div>
				<div class="member-social">
					<a href=""><i class="fa fa-facebook"></i></a>
					<a href=""><i class="fa fa-linkedin"></i></a>
					<a href=""><i class="fa fa-twitter"></i></a>
				</div>
				<div class="member-info">
					<div class="member-img mf set-bg" data-setbg="img/member/5.jpg"></div>
					<div class="member-meta">
						<h2>Katy Abrams</h2>
						<span>Head of Design</span>
					</div>
					<p>Jackson Nash is a full-time faculty member of the Marketing and Behavioural Science Division at the Sauder School of Business at UBC. He leads the Entrepreneurship Group, in the undergraduate and graduate programs, teaching actively in both of these.</p>
				</div>
			</div>
		</div>
	</section>
	<!-- Team section -->


	<!-- Review section -->
	<section class="review-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 push-8">
					<img src="img/quote.png" alt="" class="quote mb-5">
					<div class="review-text-slider owl-carousel">
						<div class="review-text">
							<p>"Bitcoin is exciting because it shows how cheap it can be. Bitcoin is better than currency in that you don’t have to be physically in the same place and, of course, for large transactions, currency can get pretty inconvenient.”</p>
						</div>
						<div class="review-text">
							<p>"Bitcoin is exciting because it shows how cheap it can be. Bitcoin is better than currency in that you don’t have to be physically in the same place and, of course, for large transactions, currency can get pretty inconvenient.”</p>
						</div>
						<div class="review-text">
							<p>"Bitcoin is exciting because it shows how cheap it can be. Bitcoin is better than currency in that you don’t have to be physically in the same place and, of course, for large transactions, currency can get pretty inconvenient.”</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 pr-0 pull-3">
					<div class="review-meta-slider owl-carousel pt-5">
						<div class="author-meta">
							<div class="author-avatar set-bg" data-setbg="img/review/1.jpg"></div>
							<div class="author-name">
								<h4>Aaron Ballance</h4>
								<p>Ceo Bitcoin</p>
							</div>
						</div>
						<div class="author-meta">
							<div class="author-avatar set-bg" data-setbg="img/review/2.jpg"></div>
							<div class="author-name">
								<h4>Jackson Nash</h4>
								<p>Head of Design</p>
							</div>
						</div>
						<div class="author-meta">
							<div class="author-avatar set-bg" data-setbg="img/review/3.jpg"></div>
							<div class="author-name">
								<h4>Katy Abrams</h4>
								<p>Product Manager</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Review section end -->


	<!-- Newsletter section -->
	<section class="newsletter-section gradient-bg">
		<div class="container text-white">
			<div class="row">
				<div class="col-lg-7 newsletter-text">
					<h2>Subscribe to our Newsletter</h2>
					<p>Sign up for our weekly industry updates, insider perspectives and in-depth market analysis.</p>
				</div>
				<div class="col-lg-5 col-md-8 offset-lg-0 offset-md-2">
					<form class="newsletter-form">
						<input type="text" placeholder="Enter your email">
						<button>Get Started</button>
					</form>
				</div>
			</div>
		</div>
	</section>
	<!-- Newsletter section end -->



	<!-- Blog section -->
	<section class="blog-section spad">
		<div class="container">
			<div class="section-title text-center">
				<h2>Latest News</h2>
				<p>Bitcoin is the simplest way to exchange money at very low cost.</p>
			</div>
			<div class="row">
				<!-- blog item -->
				<div class="col-md-4">
					<div class="blog-item">
						<figure class="blog-thumb">
							<img src="img/blog/1.jpg" alt="">
						</figure>
						<div class="blog-text">
							<div class="post-date">03 jan 2018</div>
							<h4 class="blog-title"><a href="">Coinbase to Reopen the GDAX Bitcoin Cash-Euro Order Book</a></h4>
							<div class="post-meta">
								<a href=""><span>by</span> Admin</a>
								<a href=""><i class="fa fa-heart-o"></i> 234 Likes</a>
								<a href=""><i class="fa fa-comments-o"></i> 08 comments</a>
							</div>
						</div>
					</div>
				</div>
				<!-- blog item -->
				<div class="col-md-4">
					<div class="blog-item">
						<figure class="blog-thumb">
							<img src="img/blog/2.jpg" alt="">
						</figure>
						<div class="blog-text">
							<div class="post-date">28 dec 2018</div>
							<h4 class="blog-title"><a href="">Blockchain Rolls Out Trading Feature for 22 States in the U.S</a></h4>
							<div class="post-meta">
								<a href=""><span>by</span> Admin</a>
								<a href=""><i class="fa fa-heart-o"></i> 234 Likes</a>
								<a href=""><i class="fa fa-comments-o"></i> 08 comments</a>
							</div>
						</div>
					</div>
				</div>
				<!-- blog item -->
				<div class="col-md-4">
					<div class="blog-item">
						<figure class="blog-thumb">
							<img src="img/blog/3.jpg" alt="">
						</figure>
						<div class="blog-text">
							<div class="post-date">28 aug 2018</div>
							<h4 class="blog-title"><a href="">This Week in Bitcoin: Up, Down and Sideways</a></h4>
							<div class="post-meta">
								<a href=""><span>by</span> Admin</a>
								<a href=""><i class="fa fa-heart-o"></i> 234 Likes</a>
								<a href=""><i class="fa fa-comments-o"></i> 08 comments</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Blog section end -->
*/
?>

	<!-- Footer section -->
	<footer class="footer-section">
		<div class="container">
			<div class="row spad">
				<div class="col-md-6 col-lg-3 footer-widget">
					<img src="img/logo.png" class="mb-4" alt="">
					<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia dese mollit anim id est laborum.</p>
					<span><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span>
				</div>
				<div class="col-md-6 col-lg-2 offset-lg-1 footer-widget">
					<h5 class="widget-title">Resources</h5>
					<ul>
						<li><a href="#">How to Buy Coin</a></li>
						<li><a href="#">Coin Overview</a></li>
						<li><a href="#">Blog News</a></li>
						<li><a href="#">How to Sell Coin</a></li>
						<li><a href="#">Purchase Theme</a></li>
					</ul>
				</div>
				<div class="col-md-6 col-lg-2 offset-lg-1 footer-widget">
					<h5 class="widget-title">Quick Links</h5>
					<ul>
						<li><a href="#">Network Stats</a></li>
						<li><a href="#">Block Explorers</a></li>
						<li><a href="#">Governance</a></li>
						<li><a href="#">Exchange Markets</a></li>
						<li><a href="#">Get Theme</a></li>
					</ul>
				</div>
				<div class="col-md-6 col-lg-3 footer-widget pl-lg-5 pl-3">
					<h5 class="widget-title">Follow Us</h5>
					<div class="social">
						<a href="" class="facebook"><i class="fa fa-facebook"></i></a>
						<a href="" class="google"><i class="fa fa-google-plus"></i></a>
						<a href="" class="instagram"><i class="fa fa-instagram"></i></a>
						<a href="" class="twitter"><i class="fa fa-twitter"></i></a>
					</div>
				</div>
			</div>
			<div class="footer-bottom">
				<div class="row">
					<div class="col-lg-4 store-links text-center text-lg-left pb-3 pb-lg-0">
						<a href=""><img src="img/appstore.png" alt="" class="mr-2"></a>
						<a href=""><img src="img/playstore.png" alt=""></a>
					</div>
					<div class="col-lg-8 text-center text-lg-right">
						<ul class="footer-nav">
							<li><a href="">DPA</a></li>
							<li><a href="">Terms of Use</a></li>
							<li><a href="">Privacy Policy </a></li>
							<li><a href="">support@company.com</a></li>
							<li><a href="">(123) 456-7890</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</footer>


	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
