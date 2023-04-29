<?php
include "connect.php";

if (isset($_POST['login'])) {
    $UserID = $_POST['UserID'];
    $UserName = $_POST['UserName'];
    $Password = $_POST['Password'];
    $ConfirmPassword = $_POST['ConfirmPassword'];

    if (empty($UserID)) {
        echo "<script>alert('Please enter UserID')</script>";
    } elseif (empty($UserName)) {
        echo "<script>alert('Please enter UserName')</script>";
    } elseif (empty($Password)) {
        echo "<script>alert('Please enter Password')</script>";
    } elseif (empty($ConfirmPassword)) {
        echo "<script>alert('Please enter Confirm Password')</script>";
    } elseif ($Password != $ConfirmPassword) {
        echo "<script>alert('Password and Confirm Password do not match')</script>";
    } else {
        // check if UserID already exists in the database
        $query = "SELECT * FROM StudentLogin WHERE LOWER(UserID) = LOWER('$UserID')";
        $result = mysqli_query($con, $query);
        $count = mysqli_num_rows($result);
        if ($count > 0) {
            echo "<script>alert('StudentID already exists')</script>";
        } else {
            // insert the new student record into the database
            $query = "INSERT INTO StudentLogin (UserID, UserName, Password) VALUES ('$UserID','$UserName','$Password')";
            if (mysqli_query($con, $query)) {
                echo "<script>alert('Student Registration successful')</script>";
            } else {
                echo "<script>alert('Student Registration failed')</script>";
            }
        }
    }
}

mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QIS College of Engineering & Technology</title>
    <link rel="stylesheet" href="./CSS/Addstudent.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
    <div class="login-box">
        <h2>Add Student</h2>
        <form action="" method="post">
            <div class="user-box">
                <input type="text" name="UserID" placeholder="Enter UserID" autocomplete="off">
                <label>UserID</label>
            </div>
            <div class="user-box">
                <input type="text" name="UserName" placeholder="Enter Name" autocomplete="off">
                <label>UserName</label>
            </div>
            <div class="user-box">
                <i class="fas fa-eye" id="toggle-password1" style="color: #03e9f4; float: right"></i>
                <input type="password" name="Password" id="password1" placeholder="Enter Password" autocomplete="off">
                <label for="password1">Password</label>
            </div>
            <div class="user-box">
                <i class="fas fa-eye" id="toggle-password2" style="color: #03e9f4; float: right"></i>
                <input type="password" name="ConfirmPassword" id="password2" placeholder="Re-Enter Password" autocomplete="off">
                <label for="password2">Confirm Password</label>
            </div>

            <button type="submit" name="login">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                Add student
            </button>
        </form>
    </div>
    <script>
        const togglePassword1 = document.querySelector('#toggle-password1');
        const password1 = document.querySelector('#password1');
        togglePassword1.addEventListener('click', function(e) {
            // toggle the type attribute
            const type = password1.getAttribute('type') === 'password' ? 'text' : 'password';
            password1.setAttribute('type', type);
            // toggle the icon
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });

        const togglePassword2 = document.querySelector('#toggle-password2');
        const password2 = document.querySelector('#password2');
        togglePassword2.addEventListener('click', function(e) {
            // toggle the type attribute
            const type = password2.getAttribute('type') === 'password' ? 'text' : 'password';
            password2.setAttribute('type', type);
            // toggle the icon
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
    </script>
</body>

</html>