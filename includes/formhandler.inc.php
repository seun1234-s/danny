<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $Name = $_POST["name"];
    $Email = $_POST["email"];
    $Message = $_POST["message"];

    try{
        require_once "dbh.inc.php";

        $query = "INSERT INTO registration_response (Name, Email, Message) VALUES(?, ?, ?)";

        $stmt = $pdo->prepare($query);

        $stmt->execute([$Name, $Email, $Message]);

        echo "Thank you for registering with us.";
    } catch(PDOException $e){
        die("Query failed: " . $e->getMessage());
    }
}
else {
    header("Location: ../index.php");
}