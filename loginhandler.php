<?php

include("./database.php");

$username = $_GET["username"];
$password = $_GET["password"];

if($username == "" || $password == ""){

    echo "One or more credentials are missing, go back to the homepage.";
    return;

}

$username = hash("sha256", $username);
$password = hash("sha256", $password);

$response = $DatabaseConnection->query("SELECT * FROM blog_account WHERE username='$username'");
$responseRow = null;
$numOfRows = 0;

foreach($response as $row){

    $responseRow = $row;
    $numOfRows = $numOfRows + 1;

}

if($numOfRows > 1){ // If more than one row is returned.

    echo "There seems to be more than one account with that username. Please contact an administrator.";
    return;

}elseif($numOfRows == 0){ // If no rows were returned.

    echo "The credentials you entered don't seem to be correct, please go back to the login page and try again.";
    return;

}else{ // In any other case, assume users credentials are valid.

    session_start();
    $_SESSION["username"] = $responseRow["username"];
    $_SESSION["password"] = $responseRow["password"];
    header("Location: /");

}

?>