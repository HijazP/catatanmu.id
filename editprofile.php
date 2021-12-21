<?php 
require_once("auth.php");
require("configMYSQLi.php");

$uname = $_GET["username"];

$profile = mysqli_query($conn, "SELECT * FROM profile WHERE username='$uname'");

if (false == $profile) {
    printf("error: %s\n", mysqli_error($conn));
}

if (isset($_POST['update'])) {
    $email = $_POST['email'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $born_date = $_POST['born_date'];
    $phone_number = $_POST['phone_number'];

    $update = mysqli_query($conn, "UPDATE profile SET 
    email='$email', 
    first_name='$first_name', 
    last_name='$last_name', 
    born_date='$born_date',
    phone_number='$phone_number'
    ");

    header('Location: profile.php');
}

if (isset($_GET['delete'])) {
    $delete = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM account WHERE username='$delete'");

    header('location: index.html');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="dashboard.css"/>
    <title>Profil <?php echo $_SESSION["user"]["username"] ?> | Catatanmu.id</title>
</head>
<body>
        <nav>
            <h1 class="catatanmu">Catatanmu.id</h1>
            <ul class="nav_links">
                <li><a class="db_ref" href="dashboard.php">Dashboard</a></li>
                <li>    
                    <a class="userlogo" href="profile.php"> 
                        <img class="profilelogo" src="img/Avatar.svg" width="50em" href="profile.php">
                    </a>
                </li>
            </ul>
        </nav>

    <?php while ($row = mysqli_fetch_assoc($profile)) { ?>
    <div class="box">
        <h2>Ubah Profil</h2>
        <form action="" method="POST">
            <label for="">Username</label>
            <input type="text" name="username" value="<?php echo $row['username']; ?>"><br>
            <label for="">Email</label>
            <input type="text" name="email" value="<?php echo $row['email']; ?>"><br>
            <label for="">Nama Depan</label>
            <input type="text" name="first_name" value="<?php echo $row['first_name']; ?>"><br>
            <label for="">Nama Belakang</label>
            <input type="text" name="last_name" value="<?php echo $row['last_name']; ?>"><br>
            <label for="">Tanggal Lahir</label>
            <input type="date" name="born_date" value="<?php echo $row['born_date']; ?>"><br>
            <label for="">Nomor Telepon</label>
            <input type="text" name="phone_number" value="<?php echo $row['phone_number']; ?>"><br>
            <button type="submit" name="update">Simpan</button>
        </form>
            <a href="editprofile.php?delete=<?php echo $row['username']; ?>">Hapus Akun</a>
        <?php } ?>

        <a href="logout.php">Logout</a>

    </div>

</body>
</html>