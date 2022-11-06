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

                            <a class="nav-link" aria-current="page" href="./index.php">Home</a>

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

        <h1 class="title white-text">New Blog Entry</h1>

        <form>

            <div class="form-group">

                <label class="blog-label white-text" for="blogTitleInput">Title</label>
                <input type="text" class="form-control input-box" name="blogtitle" id="blogTitleInput">

            </div>

            <div class="form-group separator">

                <label class="blog-label white-text" for="blogBodyInput">Body</label>
                <textarea class="form-control blog-text" rows="20" cols="50" name="blogtext" id="blogBodyInput"></textarea>

            </div>

            <button type="submit" formaction="./entryhandler.php" class="btn login-submit-button">Create!</button>

        </form>

    </body>

</html>