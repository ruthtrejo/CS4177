<?php

class DatabaseConnector {

    private static $database;

    public function __constructor(){}


    public function connect()
    {
        if (getenv("VERSION") === "LOCAL")
        {
            return $this->env_connect();
        }
        return $this->utep_connect();
    }

    public function utep_connect() {
        ////////////////////////////////////////////////
        $address = "localhost";
        $user = "root";
        $password = "mysql";
        $database = "users";
        ////////////////////////////////////////////////
        $conn = new mysqli($address,$user,$password,$database);
        if ($conn -> connect_error){
            die("Failed connection to database");
        }
        return $conn;
    }

    public function env_connect(){

        $host_uri = getenv("MYSQL_HOST");
        $username = getenv("MYSQL_USER");
        $password = getenv("MYSQL_PASSWORD");
        $database = getenv("MYSQL_DATABASE");

        $connection = new mysqli($host_uri,$username,$password,$database);

        if ($connection -> connect_error) {
            die("Failed to connect to Docker instance");
        }
        return $connection;
    }

    public function docker_compose_connect()
    {
        $dockerComposeHost = "mysqlDB";
        $databaseURL = getenv("MYSQL_HOST");
        $connection = new mysqli($dockerComposeHost,"root","password",$dockerComposeHost);
        if ($connection -> connect_error)
        {
            die("Failed to connect to Docker Compose Instance");
        }
        return $connection;
    }


}

