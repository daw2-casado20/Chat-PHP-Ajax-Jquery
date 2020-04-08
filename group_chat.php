<?php

//group_chat.php

include('database_connection.php');
include('class.login.php');
include('class.login.details.php');
include('class.chat_message.php');

session_start();

if($_POST["action"] == "insert_data")
{
	/*$data = array(
		':to_user_id'       =>  $_SESSION["user_id"],
		':from_user_id'		=>	$_SESSION["user_id"],
		':chat_message'		=>	$_POST['chat_message'],
		':status'			=>	'1'
	);

	$query = "
	INSERT INTO chat_message 
	(to_user_id, from_user_id, chat_message, status) 
	VALUES (:to_user_id, :from_user_id, :chat_message, :status)
	";

	$statement = $connect->prepare($query);

	if($statement->execute($data))
	{
		echo fetch_group_chat_history($connect);
	}*/
	$nuevomensaje2 = new Chat_Message($connect);
	$nuevomensaje2->setto_user_id($_SESSION["user_id"]);
	$nuevomensaje2->setfrom_user_id($_SESSION["user_id"]);
	$nuevomensaje2->setchat_message($_POST['chat_message']);
	$nuevomensaje2->setstatus(1);
	$nuevomensaje2->Save();
	/*$nuevomensaje = new Chat_Message($connect);
	$nuevomensaje->setto_user_id($_SESSION["user_id"])->setfrom_user_id($_SESSION['user_id'])->setchat_message($_POST['chat_message'])->setstatus(1)->Save();*/

}

/*if($_POST["action"] == "fetch_data")
{
	echo fetch_group_chat_history($connect);
}*/

?>
