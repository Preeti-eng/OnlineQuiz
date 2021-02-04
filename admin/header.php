<?php
session_start();
if(!isset($_SESSION['admin'])){
    header('location:../index.php');
}
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    </head>
    <body>
        <!-- ##################### Header ###################### -->
        <div>
            <nav class="navbar navbar-expand-lg navbar-light" style="background-color:black;">
                <div class="container-fluid">
                    <a class="navbar-brand" href="index.php" style="color:black;font-size:35px;text-shadow:4px 3px white">ONLINE TEST PLATFORM</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav" style="padding-left:40%;">
                        <form class="form-inline" style="padding-left:45%;">
                            <div class="greetings" style="color:white;">
                                Hii......
                                <?php echo $_SESSION['admin']['name']?>!!!!
                            </div>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="../logout.php" class="btn btn-light" type="submit">Logout</a>
                        </form>
                    </div>
                </div>
            </nav>
        </div>
        <!-- ########################################## -->
    </body>
</html>
