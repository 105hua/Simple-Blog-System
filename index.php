<?php

    error_reporting(0); // Silences undefined key warnings.

?>

<!DOCTYPE html>

<html lang="en">

    <head>

        <!-- Meta Stuff and Title -->
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Josh's Blog - Home</title>

        <!-- Bootstrap Framework -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

        <!-- My Content -->
        <link rel="stylesheet" href="./css/general.css">  

    </head>
    
    <body>

        <nav class="navbar navbar-dark bg-dark">

            <div class="container-fluid">

                <a class="navbar-brand" href="#">Josh's Blog</a>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarBlog" aria-controls="navbarBlog" aria-expanded="false" aria-label="Toggle navigation">
                    
                    <span class="navbar-toggler-icon"></span>

                </button>

                <div class="collapse navbar-collapse" id="navbarBlog">

                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                        <li class="nav-item">

                            <a class="nav-link active" aria-current="page" href="./index.php">Home</a>

                        </li>

                        <?php

                            session_start();

                            if($_SESSION["username"] && $_SESSION["password"]){

                                echo "<li class='nav-item'><a class='nav-link active' aria-current='page' href='./newentry.php'>Create Blog</a></li>";

                            }
                            
                            if($_SESSION["username"] == '' || $_SESSION["password"] == ''){

                                echo "<li class='nav-item'><a class='nav-link' aria-current='page' href='./login.php'>Login</a></li>";
                                
                            }

                            if($_SESSION["username"] && $_SESSION["password"]){

                                echo "<li class='nav-item'><a class='nav-link' aria-current='page' href='./logout.php'>Logout</a></li>";

                            }

                        ?>

                    </ul>

                </div>

            </div>

        </nav>

        <h1 class="title white-text">Welcome to my Blog!</h1>

        <h5 class="white-text align-text-center">The purpose of this blog is to document my 120 hours of self-learning for Personal Skills Development.</h5>

        <div class="entries-history-container">

            <div class="blog-entries black-border white-text">

                <h1 class="align-text-center">Blog Entries</h1>

                <?php

                    include("./database.php");

                    $entriesExist = false;

                    foreach($DatabaseConnection->query("SELECT * FROM blog_entry") as $row){

                        echo @"<div class='entry'>
                        <h5>" . $row["entry_title"] . @"</h5>
                        <p>" . $row["entry_body"] . "</p></div>";

                        if($entriesExist == false){

                            $entriesExist = true;

                        }

                    }

                    if($entriesExist == false){

                        echo "No entries :(";

                    }

                ?>

            </div>

            <div class="blog-history black-border white-text">

                <h3 class="align-text-center header">Blog History</h3>

                <?php

                    include("./database.php");

                    $entriesExist = false;

                    foreach($DatabaseConnection->query("SELECT * FROM blog_entry") as $row){

                        echo "<div class='align-text-center'>" . $row["entry_id"] . " - " . $row["entry_title"];

                        if($entriesExist == false){

                            $entriesExist = true;

                        }

                    }

                    if($entriesExist == false){

                        echo "<div class='align-text-center'>No entries :(</div>";

                    }

                ?>

            </div>

        </div>

    </body>

</html>