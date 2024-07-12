<?php 

    class User{

        private $userToken = [];

        public function generate($user){
            if(isset($this->userToken[$user]) && count($this->userToken[$user]) >= 10){
                unset($this->userToken[$user][0]);
                $tempArray = array_values($this->userToken[$user]);
                $this->userToken[$user] = $tempArray;
            }

            $token = $this->_generateRandomString();
            $this->userToken[$user][] = $token;
            
            return $token;

        }

        public function getUserToken($user){
            return $this->userToken[$user];
        }

        public function verify_token($user, $token){
            $index = array_search($token, $this->userToken[$user]);
            if($index){
                unset($this->userToken[$user][$index]);
                $tempArray = array_values($this->userToken[$user]);
                $this->userToken[$user] = $tempArray;
                return true;
            }

            return false;
        }

        private function _generateRandomString($length = 10) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[random_int(0, $charactersLength - 1)];
            }
            return $randomString;
        }
    }

    $name = "Edo";
    $user = new User();

    echo "<h3>".$name."</h3>";
    for ($i=0; $i < 12; $i++) { 
        echo $user->generate($name)."<br>";
    }

    $listToken = $user->getUserToken($name);
    echo "<pre>";print_r($listToken);"</pre>";

    $listToken[1];

    echo $listToken[1]." is exist? ".($user->verify_token($name, $listToken[1]) ? "exist" : "not Exist");
    $listToken = $user->getUserToken($name);
    echo "<pre>";print_r($listToken);"</pre>";

    echo "asd is exist? ".($user->verify_token($name, "asd") ? "exist" : "not Exist");
    echo "<pre>";print_r($listToken);"</pre>";
    

 ?>