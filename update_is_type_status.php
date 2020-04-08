<?php

//update_is_type_status.php

include('database_connection.php');
include('class.login.php');
include('class.login.details.php');
include('class.chat_message.php');

session_start();

$logindet = new Login_Details($connect, $_SESSION["login_details_id"]);
$logindet->setis_type($_POST["is_type"]);
$logindet->Save();

/*$query = "
UPDATE login_details 
SET is_type = '".$_POST["is_type"]."' 
WHERE id = '".$_SESSION["login_details_id"]."'
";

$statement = $connect->prepare($query);

$statement->execute();*/

?>
