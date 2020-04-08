<?php

//update_last_activity.php

include('database_connection.php');
include('class.login.php');
include('class.login.details.php');
include('class.chat_message.php');

session_start();

$logindet2 = new Login_Details($connect, $_SESSION["login_details_id"]);
$logindet2->setlast_activity(now());
$logindet2->Save();

/*$query = "
UPDATE login_details 
SET last_activity = now() 
WHERE id = '".$_SESSION["login_details_id"]."'
";

$statement = $connect->prepare($query);

$statement->execute();*/

?>

