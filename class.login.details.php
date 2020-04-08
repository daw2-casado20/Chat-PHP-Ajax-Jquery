<?php
class Login_Details extends DataBoundObject {

        protected $user_id;
        protected $last_activity;
        protected $chat_message;
        protected $is_type;

        protected function DefineTableName() {
                return("login_details");
        }

        protected function DefineRelationMap() {
                return(array(
                        "id" => "ID",
                        "user_id" => "user_id",
                        "last_activity" => "last_activity",
                        "is_type" => "is_type"  
                ));
        }

}

?>
