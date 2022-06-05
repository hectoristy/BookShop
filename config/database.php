<?php

$dbHost = "localhost";
$dbName = "bookshopDb";
$dbUser = "root";
$dbPass = "";

$dbMode = "remote";

if($dbMode == "remote"){

    $dbHost = "bdmnt4lojlwmhmh84sde-mysql.services.clever-cloud.com";
    $dbName = "bdmnt4lojlwmhmh84sde";
    $dbUser = "u6vfjlrvzxku2itk";
    $dbPass = "INrp9Hw0vOOgd77X6w9Z";
}

try {
    $conn = new PDO("mysql:host=$dbHost; dbname=$dbName", $dbUser, $dbPass);

        CreateTableUsers($conn, $dbName);
        CreateTableBooks($conn, $dbName);
   
} catch (Exception $err) {
    echo "error: " . $err->getMessage();
}

function CreateTableBooks($conn, $dbName){

    $query = 'SELECT table_name FROM information_schema.tables
                WHERE table_schema = "'.$dbName.'" AND table_name = "books"';

    if(!$conn->query($query)->fetchColumn()){
        $query = $conn->prepare("Create table books (
        id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        title varchar(100) NOT NULL,
        author varchar(100) NOT NULL,
        image varchar(100) NOT NULL,
        category varchar(100) NOT NULL,
        publication_date date NOT NULL,
        rating int(11) NOT NULL
        )");

        $query->execute();

    }
}

function CreateTableUsers($conn, $dbName){

    $query = 'SELECT table_name FROM information_schema.tables
                WHERE table_schema = "'.$dbName.'" AND table_name = "users"';

    if(!$conn->query($query)->fetchColumn()){
        $query = $conn->prepare("Create table users (
        id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        username varchar(100) NOT NULL,
        name varchar(100) NOT NULL,
        email varchar(100) NOT NULL,
        password varchar(100) NOT NULL,
        role varchar(100) NOT NULL
        )");

        $query->execute();

        UsersMockData($conn);

    }
}

function UsersMockData($conn){
    
    $query = $conn->prepare("INSERT INTO users (username, name, email, password, role) 
        VALUES ('hectoristy', 'hector', 'hectoristy1@gmail.com', '123456', 'admin')");
    
    $query->execute();

    $query = $conn->prepare("INSERT INTO users (username, name, email, password, role) 
        VALUES ('fulano', 'fulano', 'fulano@gmail.com', '123456', 'user')");

    $query->execute();

    $query = $conn->prepare("INSERT INTO users (username, name, email, password, role) 
        VALUES ('mengano', 'mengano', 'mengano@gmail.com', '123456', 'user')");

    $query->execute();

    $query = $conn->prepare("INSERT INTO users (username, name, email, password, role) 
        VALUES ('meleno', 'meleno', 'meleno@gmail.com', '123456', 'user')");
        
}

?>
