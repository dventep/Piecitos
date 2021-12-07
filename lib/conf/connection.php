<?php
    class Connection{
        private $server;
        private $user;
        private $password;
        private $dataBase;
        private $port;
        private $link;

        function __construct() {
            $this->setConnect();
            $this->connect();
        }
        
        private function setConnect() {
            require_once 'conf.php';

            $this->server = $server;
            $this->user = $user;
            $this->password = $password;
            $this->dataBase = $dataBase;
            $this->port = $port;
        }

        private function connect() {
            $this->link = mysqli_connect($this->server,$this->user,$this->password,$this->dataBase);

            if ($this->link) {
                // echo "exitosa";
            } else {
                // mysqli_error($this->link);
            }
        }

        public function getConnect() {
            return $this->link;
        }

        public function close() {
            mysqli_close($this->link);
        }

    }

?>