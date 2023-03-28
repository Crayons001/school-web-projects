<?php

    $firstName = $_POST['firstName'];
    $surname = $_POST['surname'];
    $otherName = $_POST['otherName'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $location = $_POST['location'];

    //mysqli(server, username, password, database(optional))
    //Connecting to server

    $conn = new mysqli('localhost', 'root', '', 'first_web_db');
    if($conn->connect_error)
    {
        die("Connection failed: ". $conn->connect_error);
    }
    else {
        echo "Connected to database successfully";
        //Feeding data to database
        $sql_stmnt = $conn->prepare("insert into user_details(first_name, surname, other_name, dob, gender, phone, email, location) values(?, ?, ?, ?, ?, ?, ?, ?)");
        $sql_stmnt->bind_param("ssssssss", $firstName, $surname, $otherName, $dob, $gender, $phone, $email, $location);
        $sql_stmnt->execute();
        echo "Data saved!";
        $sql_stmnt->close();
        $conn->close(); //Closing connection
    }

    
    /*$servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'first_website_db';
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
      } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
      }*/

?>