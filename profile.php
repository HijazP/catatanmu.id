<?php require_once("auth.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style2.css"/>
    <title>Profil <?php echo $_SESSION["user"]["username"] ?> | Catatanmu.id</title>
</head>
<body>
    <header class="navbar">
        <nav>
            <h1 class="catatanmu">Catatanmu.id</h1>
            <ul class="nav_links">
                <li>
                    <a class="db_ref" href="dashboard.php">Dashboard</a>
                    <a class="userlogo" href="profile.php"> 
                        <img class="profilelogo" src="img/Avatar.svg" width="40em" href="profile.php">
                    </a>
                <li>
            </ul>
        </nav>
    </header>

    <div class="box">
        <h2>Profil</h2>
        <ul class="data-profil">
            <li>Username<br><?php echo $_SESSION["user"]["username"] ?></li>
            <li>Email<br></li>
            <li>Nama Depan<br></li>
            <li>Nama Belakang<br></li>
            <li>Tanggal Lahir<br></li>
            <li>Nomor Telepon<br></li>
        </ul>

        <a href="editprofile.php">Edit</a>
        <a href="logout.php">Logout</a>
    </div>

</body>
</html>