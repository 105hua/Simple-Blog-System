<?php

    session_start();
    include("./database.php");
    include("./validation.php");

    $validationRes = ValidateDetails($_SESSION["username"], $_SESSION["password"]);

    if($validationRes == false){

        header("Location: /");
        return;

    }

    $title = $DatabaseConnection->quote($_GET["blogtitle"]);
    $text = $DatabaseConnection->quote($_GET["blogtext"]);
    $DatabaseConnection->query("INSERT INTO blog_entry VALUES(NULL, $title, $text)");
    
    header("Location: /");

?>