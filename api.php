<?php

    include 'db.php';

    header("Content-Type: application/json");

    $method = $_SERVER['REQUEST_METHOD'];
    $input = json_decode(file_get_contents('php://input'), true);

    switch ($method) {
        case 'GET':
            if (isset($_GET['username']) && isset($_GET['password'])) { 
                $username = $_GET['username'];
                $password = $_GET['password'];
                $result = $conn -> query("SELECT * FROM users where username = '$username' AND password = '$password'");
                $data = $result -> fetch_assoc();
                echo json_encode($data);
            } elseif (isset($_GET['email']) && isset($_GET['password'])) { 
                $email = $_GET['email'];
                $password = $_GET['password'];
                $result = $conn -> query("SELECT * FROM users where username = '$email' AND password = '$password'");
                $data = $result -> fetch_assoc();
                echo json_encode($data);
            }
            break;

            default:
                echo json_encode(["message" => "Invalid request method"]);
                break;
    }

    $conn->close();
    
?>