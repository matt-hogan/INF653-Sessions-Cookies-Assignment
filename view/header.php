<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zippy's Used Autos</title>
    <link rel="stylesheet" href="view/css/main.css" >
</head>
<body>
    <main class="main">
        <?php if ($action != "register" && !isset($_SESSION["user_id"])) { ?>
            <div>
                <p class="register-message"><a href="./?action=register">Register</a></p>
            </div>
        <?php } else if (isset($_SESSION["user_id"]) && ($action != "register" && $action != "logout")) { ?>
            <p class="welcome-message">Welcome, <?= $_SESSION["user_id"] ?> (<a href="./?action=logout">Logout</a>)</p>
        <?php } ?>
        <h1>Zippy's Used Autos</h1>