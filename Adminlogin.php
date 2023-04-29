<?php
include("connect.php");

if (isset($_POST['login'])) {
    $userid = $_POST['UserID'];
    $password = $_POST['Password'];

    if (empty($userid)) {
        echo "<script>alert('Please enter your UserID')</script>";
    } elseif (empty($password)) {
        echo "<script>alert('Please enter your Password')</script>";
    } else {
        $query = "SELECT * FROM Adminlogin WHERE UserID='$userid'";
        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);

            if ($password == $row['Password']) {
                // login successful, redirect to the dashboard
                header("Location: Mainadmin.php?username=" . $row['UserName']);
            } else {
                echo "<script>alert('Wrong password. Please try again.')</script>";
            }
        } else {
            echo "<script>alert('UserID not found. Please try again.')</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QIS College of Engineering & Technology</title>
    <link rel="stylesheet" href="./CSS/Adminlogin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
    <div>
        <center>
            <marquee behavior="scroll" direction="left" scrollamount="15" scrolldelay="15">
                <table>
                    <tr>
                        <td>
                            <img class="icon" src="./IMAGE/college_icon.jpeg" width="80px" height="80px">
                        </td>
                        <td>
                            <h1>QIS College of Engineering and Technology</h1>
                            <h2>Ongole</h2>
                        </td>
                    </tr>
                </table>
            </marquee>
        </center>
    </div>
    <hr>
    <div class="login-box">
        <h2>Login</h2>
        <form action="" method="post">
            <div class="user-box">
                <input type="text" name="UserID" placeholder="Enter Your UserID" autocomplete="off">
                <label>UserID</label>
            </div>
            <div class="user-box">
                <i class="fas fa-eye" id="toggle-password" style="color: #03e9f4; float: right"></i>
                <input type="password" name="Password" id="password" placeholder="Enter Password" autocomplete="off">
                <label for="password">Password</label>

            </div>
            <button type="submit" name="login">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                Login
            </button>
        </form>
    </div>
    <script>
        const togglePassword = document.querySelector('#toggle-password');
        const password = document.querySelector('#password');
        togglePassword.addEventListener('click', function(e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the icon
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
    </script>

</body>

</html>