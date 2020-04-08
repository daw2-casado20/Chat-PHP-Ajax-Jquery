<?php

//insert_chat.php

include('database_connection.php');
include('class.login.php');
include('class.login.details.php');
include('class.chat_message.php');

session_start();
/*$data = array(
 ':to_user_id'  => $_POST['to_user_id'],
 ':from_user_id'  => $_SESSION['user_id'],
 ':chat_message'  => $_POST['chat_message'],
 ':status'   => '1'
);*/
echo $_POST['to_user_id'];
echo $_SESSION["user_id"];
$mensaje = $_POST['chat_message'];
$nuevomensaje = new Chat_Message($connect);
$nuevomensaje->setto_user_id($_POST['to_user_id']);
$nuevomensaje->setfrom_user_id($_SESSION["user_id"]);
$nuevomensaje->setchat_message($mensaje);
$nuevomensaje->setstatus(1);
$nuevomensaje->Save();

/*$query = "
INSERT INTO chat_message 
(to_user_id, from_user_id, chat_message, status) 
VALUES (:to_user_id, :from_user_id, :chat_message, :status)
";

$statement = $connect->prepare($query);

if($statement->execute($data))
{
	echo fetch_user_chat_history($_SESSION['user_id'], $_POST['to_user_id'], $connect);
}*/

?>
