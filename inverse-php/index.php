<?php
session_start();
error_reporting(0);
include("dbconnection.php");
if(isset($_POST['login']))
{
  $adminusername=$_POST['username'];
  $pass=md5($_POST['password']);
$ret=mysqli_query($con,"SELECT * FROM admin WHERE username='$adminusername' and password='$pass'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
$extra="home.php";
$_SESSION['login']=$_POST['username'];
$_SESSION['id']=$num['id'];
echo "<script>window.location.href='".$extra."'</script>";
exit();
}
else
{
$_SESSION['action1']="*Invalid username or password";
$extra="index.php";
echo "<script>window.location.href='".$extra."'</script>";
exit();
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>SpexHR</title>
    <link href="./dist/css/pages/login-register-lock.css" rel="stylesheet">
    <link href="./dist/css/style.min.css" rel="stylesheet">
</head>

<body class="skin-default card-no-border">
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">SpexHR</p>
        </div>
    </div>
    <section id="wrapper">
        <div class="login-register" style="background-image:url(../assets/images/background/login-register.jpg);">
            <div class="login-box card">
                <div class="card-body">
                <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                        </div>
                        <form class="user" action="" method="post">
                        <p style="color:#F00; padding-top:20px;" align="center">
                        <?php echo $_SESSION['action1'];?><?php echo $_SESSION['action1']="";?></p>
                            <div class="form-group">
		                          <input type="text" name="username" class="form-control" placeholder="User ID" autofocus>
                            </div>
                            <div class="form-group">
		                           <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                            <input name="login" class="btn btn-primary btn-block" type="submit">
                        </form>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
include('includes/scripts.php');
?>

