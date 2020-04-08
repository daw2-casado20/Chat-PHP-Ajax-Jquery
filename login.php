<!--
//login.php
!-->

<?php
include('database_connection.php');
include('class.login.php');
include('class.login.details.php');
include('class.chat_message.php');

session_start();

$message = '';

if(isset($_SESSION['user_id']))
{
	//header('location:index.php');
}

if(isset($_POST['login']))
{
 $loginuser = new Login($connect,$_POST["username"]);
 $statment=$loginuser->getData($connect);
 $statment->execute(
    array(
      ':username' => $_POST["username"]
     )
  );
   $count = $statment->rowCount();
  if($count > 0)
 {
  $result = $statment->fetchAll();
    foreach($result as $row)
    {
      if(password_verify($_POST["password"], $row["password"]))
      {
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        $loginuser2 = new Login($connect,$_SESSION['user_id']);
        $id = $loginuser2->getID();
        $ActUser = new Login_Details($connect);
        $ActUser->setuser_id($loginuser2->getID())->Save();
        $_SESSION['login_details_id'] = $connect->lastInsertId();
        header("location:index.php");
      }
      else
      {
       $message = "<label>Wrong Password</label>";
      }
    }
 }
      /*if(password_verify($_POST["password"], $loginuser->getpassword()))
      {
        $_SESSION['user_id'] = $loginuser->getID();
        $_SESSION['username'] = $loginuser->getusername();
        $ActUser = new Login_Details($connect);
        $ActUser->setuser_id($loginuser->getID())->Save();
        $_SESSION['login_details_id'] = $connect->lastInsertId();
        header("location:index.php");
      }
      else
      {
       $message = "<label>Wrong Password</label>";
      }*/

}


?>

<html>  
    <head>  
        <title>Chat Application using PHP Ajax Jquery</title>  
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    </head>  
    <body>  
        <div class="container">
			<br />
			
			<h3 align="center">Chat Application using PHP Ajax Jquery</h3><br />
			<br />
			<div class="panel panel-default">
  				<div class="panel-heading">Chat Application Login</div>
				<div class="panel-body">
					<p class="text-danger"><?php echo $message; ?></p>
					<form method="post">
						<div class="form-group">
							<label>Enter Username</label>
							<input type="text" name="username" class="form-control" required />
						</div>
						<div class="form-group">
							<label>Enter Password</label>
							<input type="password" name="password" class="form-control" required />
						</div>
						<div class="form-group">
							<input type="submit" name="login" class="btn btn-info" value="Login" />
						</div>
						<div align="center">
							<a href="register.php">Register</a>
						</div>
					</form>
					<br />
					<br />
					<br />
					<br />
				</div>
			</div>
		</div>

    </body>  
</html>
