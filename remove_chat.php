<?php

//remove_chat.php

include('database_connection.php');
include('class.login.php');
include('class.login.details.php');
include('class.chat_message.php');

if(isset($_POST["chat_message_id"]))
{
	$nuevomensaje3 = new Chat_Message($connect, $_POST["chat_message_id"]);
	$nuevomensaje3->setstatus(2);
	$nuevomensaje3->Save();
	/*$query = "
	UPDATE chat_message 
	SET status = '2' 
	WHERE id = '".$_POST["chat_message_id"]."'
	";

	$statement = $connect->prepare($query);

	$statement->execute();*/
}

?>
