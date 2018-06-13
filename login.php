<?php
session_start();
if(isset($_SESSION['user_id'])){
	header("Location:index.php");
}
require 'db.php';
$message='';

  if(!empty($_POST['email']) && !empty($_POST['password'])):
                                $email=$_POST['email'];
                                $password=$_POST['password'];

                                $sql="SELECT* FROM user WHERE email=:email";
                                $stmt=$conn->prepare($sql);
                                $stmt->bindParam(":email",$email);
                                $stmt->execute();
                                $results=$stmt->fetch(PDO::FETCH_ASSOC);



                                if(count($results) > 0 && password_verify($password, $results['password'])){
                                                                                                      $_SESSION['user_id'] =$results['id'];
                                                                                                    //  $_SESSION['username']=$results['name'];
                                                                                                      header("Location:index.php");
                                                                                                      $message = 'uspešno ste se ulogovali';
                                                                                                      echo $message;
                                                                    }    else{
                                                                    $message = 'Pogrešno ste uneli password ili korisničko ime';
                                                                    echo $message;

                                                                    header("refresh:2;url=index.php");
                                };
                            endif;

?>
