<?php

    class conexión{
        private $server = "localhost";
        private $user = "root";
        private $password = "";
        private $db = "vb";

        public function conectar()
        {
        $connection = mysqli_connect(
            $this->server,
            $this->user,
            $this->password,
            $this->db);

            return $connection;
        }

    }



?>