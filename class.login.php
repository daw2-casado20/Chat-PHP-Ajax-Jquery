<?php
class Login extends DataBoundObject {

        protected $username;
        protected $password;        
        

        protected function DefineTableName() {
                return("login");
        }

        protected function DefineRelationMap() {
                return(array(
                        "id" => "ID",
                        "username" => "username",
                        "password" => "password",
                ));
        }
        public function getData($connect){
            $query = "
               SELECT * FROM login 
                WHERE username = :username
             ";
             $statment = $connect->prepare($query);
             $statment->execute(
                array(
                  ':username' => $this->username
                 )
              );
            return $statment;
        }
})
?>
