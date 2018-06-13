<?php
session_start();
require 'db.php';
if(isset($_SESSION['user_id'])){
        header("Location:index.php");

}
$msg="";
$msg1="";
if(isset($_POST['submit'])){
  $name=$_POST['name'];
  $mail=$_POST['email'];




  if ($name=='' && $mail='' && !empty($_POST['password'])) {
     $msg="Molim vas proverite vaše unose";
} else {

	$password=password_hash($_POST['password'], PASSWORD_BCRYPT);
	$sql="INSERT INTO user (name,password,email)  VALUES (:name,:password,:email)";
															$stmt=$conn->prepare($sql);
															$stmt->bindParam(":name",$name);
															$stmt->bindParam(":password",$password);
															$stmt->bindParam(":email",$mail);
															$stmt->execute();
															 if($stmt){
																		 $msg="Informacija je uspešno uneta u bazu.";
															 }
															 else {$msg1= "Greska prilikom unosa.";
															 };
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

            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><img src="Logo-MetHotels.png" alt="" height="80px" width="80px" style=" text-align: left;display: inline; vertical-align: middle;"></a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
									<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown">O nama <b class="caret"></b></a>
											<ul class="dropdown-menu">
												<li>
														<a href="index.php#ko_smo_mi">Ko smo mi?</a>
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
                </ul>
            </div>

        </div>

    </nav>


    <div class="centered">
        <form class="forma" method="post" action="register.php">
          <h1>Forma za registraciju</h1>
           <div class="poruka_servera"><?php if($msg!="") echo $msg . "<br><br>" ?></div>

               <div class="form-group">
                <label for="name" style="font-size: 18px;color:white;font-weight: bold;">Name</label>
                <input type="name" class="form-control" name="name" minlength="3" id="name" aria-describedby="nameHelp" placeholder="Enter name">
                </div>
              <div class="form-group">
               <label for="email" style="font-size: 18px;color:white;font-weight: bold;">Email address</label>
               <input type="email" class="form-control"  name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email">
               <small id="emailHelp" class="form-text text-muted"style="font-size: 11px;color:white;">We'll never share your email with anyone else.</small>
              </div>
              <div class="form-group">
               <label for="password" style="font-size: 18px;color:white;font-weight: bold;">Password</label>
               <input type="password" class="form-control" name="password" minlength="5" id="password" placeholder="Password">
              </div>

              <button type="submit" name="submit"class="btn btn-success btn-block">Register</button>
        </form>

    </div>





    </header>





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
