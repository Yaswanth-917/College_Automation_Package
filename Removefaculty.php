<?php
require_once('connect.php');

if (isset($_POST['login'])) {
    $userid = $_POST['UserID'];

    if (empty($userid)) {
        echo '<script>alert("FacultyID cannot be empty!");</script>';
    } else {
        $query = "SELECT * FROM facultylogin WHERE userid = '$userid'";
        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result) == 0) {
            echo '<script>alert("FacultyID not found!");</script>';
        } else {
            echo '<script>
                    if(confirm("Are you sure you want to remove this user?")) {
                        window.location.href = "removefaculty.php?userid=' . $userid . '";
                    }
                </script>';
        }
    }
}

if (isset($_GET['userid'])) {
    $userid = $_GET['userid'];

    $query = "DELETE FROM facultylogin WHERE userid = '$userid'";
    mysqli_query($con, $query);

    echo '<script>alert("Faculty removed successfully!");</script>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QIS College of Engineering & Technology</title>
    <link rel="stylesheet" href="./CSS/Removefaculty.css">
</head>

<body>
    <div class="login-box">
        <h2>Remove Faculty</h2>
        <form action="" method="post">
            <div class="user-box">
                <input type="text" name="UserID" placeholder="Enter UserID" autocomplete="off">
                <label>UserID</label>
            </div>
            <button type="submit" name="login">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                Remove Faculty
            </button>
        </form>
    </div>
</body>

</html>