<?php
session_start();

		 $message = '';


require 'db.php';

if( isset($_SESSION['user_id']) ){
	$stmt = $conn->prepare('SELECT* FROM user WHERE id = :id');
	$stmt->bindParam(':id', $_SESSION['user_id']);

	$stmt->execute();
	$results = $stmt->fetch(PDO::FETCH_ASSOC);

		$user = NULL;

	if( count($results) > 0){
		$user = $results;


};
};


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>MET Hotel </title>


    <link href="css/bootstrap.min.css" rel="stylesheet">


    <link href="css/full-width-pics.css" rel="stylesheet">



</head>

<body>
<header class="image-bg-fixed-height-1">

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">

            <div class="navbar-header" >
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><img src="Logo-MetHotels.png" alt="" height="80px" width="80px" style=" text-align: left;display: inline; vertical-align: middle;"></a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" >
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">O nama <b class="caret"></b></a>
												<ul class="dropdown-menu">
													<li>
															<a href="#">Ko smo mi?</a>
													</li>
													<li>
															<a href="#">Cenovnik</a>
													</li>
													<li>
															<a href="#">Usluge</a>
													</li>
												</ul>
                    </li>

                    <li>
                        <a href="#">Bookiranje</a>
                    </li>
                    <li>
                        <a href="#">Kontakt</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right ml-auto">
			<li class="nav-item dropdown">
				<a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#"><i class="fa fa-user-o"></i> Login</a>
				<ul class="dropdown-menu">
					<li>
                        <form class="form-inline login-form" action="login.php" method="post">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" name="email" class="form-control" placeholder="Email" required>
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
					</li>
				</ul>
			<?php if( isset($_SESSION['user_id']) ){ ?>

				<li>  <a href="logout.php">Logout</a></li>
    <?php }else{?>
					<li>  <a href="register.php">Registracija</a></li>
		</ul>

<?php };?>


            </div>

        </div>

    </nav>

    <div class="centered"><p>Dobro došao/la <?php if( !empty($user) ){ echo $user['name']; };?><br>  u MetHotel </p></div>

    <div class="text-block">
    <p>Noćenje već od 89eur-a<br><br> </p>
    <a href="" class="window-cta">Rezervišite</a>

  </div>

    </header>


    <section>
        <div class="container" id="ko_smo_mi">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="section-heading">MET HOTELI</h1>
                    <p class="lead section-lead">Koncept</p>
                    <p class="section-paragraph">MetHotel je prestižni hotel sa 5 zvezdica.Koncept hotela je da vam ispuni svaku vašu želju i san.
                    <br/><br/>
                    MET hotel je savremeno zdanje sa svim neophodnim sadržajima koji će vam olakšati boravak i naterati vas da produžite odmor bar za još neki dan.
                    <br/><br/>
                    Unutrašnjost je dekorisana sa miksom prirodnih materijala i veštačkih kao što su kamen,zlato,drvo,plastika, što daje jedan prijatan i kućni ambijent i elegantnu atmosferu.</p>
                </div>
            </div>
        </div>
    </section>


    <aside class="image-bg-fixed-height-2"></aside>


    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="section-heading">Korporativne i privatne žurke</h1>

                    <p class="section-paragraph">Zahvalni smo što imamo priliku da skoro 20 godina budemo lideri u ugostiteljskoj industriji u planiranju i održavanju privantih žurki i korporativnih događaja. Nadamo se da ćemo i u budućnosti imate priliku da vam pružimo širok izbor lokacija za vaš dogadjaj u zavisnosti od prilike.
                    <br/><br/>
                    Kada planirate svoj sledeći događaj - privatnu žurku, proslava zajednice ili sećanja, korporativnu proslavu ili bilo koji drugi razlog - voleli bi da razmišljate o nama.
                    <br/><br/>
                    Da organizujete vaš događaj u MetHotelu molimo Vas da nas kontaktirate preko:
                    Telefona +381 11 33 33 517 ili email: office@met.rs</p>
                </div>
            </div>

        </div>

    </section>


    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Petar Maksimovic</p>
                </div>
            </div>

        </div>

    </footer>


    <script src="js/jquery.js"></script>


    <script src="js/bootstrap.min.js"></script>
    <script src="js/change_color.js"></script>

</body>

</html>
