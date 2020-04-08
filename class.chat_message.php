<?php
class Chat_Message extends DataBoundObject {

        protected $to_user_id;
        protected $from_user_id;
        protected $chat_message;
        protected $timestamp;
        protected $status;

        protected function DefineTableName() {
                return("chat_message");
        }

        protected function DefineRelationMap() {
                return(array(
                        "id" => "ID",
                        "to_user_id" => "to_user_id",
                        "from_user_id" => "from_user_id",
                        "chat_message" => "chat_message",
                        "timestamp" => "timestamp",
                        "status" => "status"
                ));
        }

}

?>
