<?php
include 'connect.php'; // connect to the database

if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['login'])) {
  $UserID = mysqli_real_escape_string($con, $_POST['UserID']);
  $userOption = mysqli_real_escape_string($con, $_POST['userOption']);

  if (empty($UserID)) {
    echo "<script>alert('StudentID is empty')</script>";
  } else {
    $result = mysqli_query($con, "SELECT * FROM studentlogin WHERE UserID='$UserID'");

    if (mysqli_num_rows($result) == 0) {
      echo "<script>alert('Student with ID $UserID not found')</script>";
    } else if (empty($userOption)) {
      echo "<script>alert('Please select a field to update')</script>";
    } else {
      $query = "";
      $fieldName = "";

      if ($userOption == "name") {
        $UserName = mysqli_real_escape_string($con, $_POST['UserName']);

        if (empty($UserName)) {
          echo "<script>alert('Name field is empty')</script>";
        } else {
          $query = "UPDATE studentlogin SET UserName='$UserName' WHERE UserID='$UserID'";
          $fieldName = "UserName";
        }
      } else if ($userOption == "password") {
        $Password = mysqli_real_escape_string($con, $_POST['Password']);

        if (empty($Password)) {
          echo "<script>alert('Password field is empty')</script>";
        } else {
          $hashedPassword = password_hash($Password, PASSWORD_DEFAULT);
          $query = "UPDATE studentlogin SET Password='$hashedPassword' WHERE UserID='$UserID'";
          $fieldName = "Password";
        }
      }

      if (!empty($query)) {
        $result = mysqli_query($con, $query);

        if ($result) {
          echo "<script>alert('$fieldName updated successfully')</script>";
        } else {
          echo "<script>alert('Update failed')</script>";
        }
      }
    }
  }
}

mysqli_close($con); // close the database connection
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>QIS College of Engineering & Technology</title>
  <link rel="stylesheet" href="./CSS/Updatestudent.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
  <div class="login-box">
    <h2>Update Student</h2>
    <form action="" method="post">
      <div class="user-box">
        <input type="text" name="UserID" placeholder="Enter UserID" autocomplete="off">
        <label>UserID</label>
      </div>
      <div class="user-box">
        <select name="userOption" onchange="showFields()">
          <option value="">Select User</option>
          <option value="name">Name</option>
          <option value="password">Password</option>
        </select>
      </div>
      <h1> </h1>
      <div class="user-box" id="name-field" style="display:none;">
        <input type="text" name="UserName" placeholder="Enter Name" autocomplete="off">
        <label>Name</label>
      </div>
      <div class="user-box" id="password-field" style="display:none;">
        <i class="fas fa-eye" id="toggle-password" style="color: #03e9f4; float: right"></i>
        <input type="password" name="Password" id="password" placeholder="Enter Password" autocomplete="off">
        <label for="password">Password</label>
      </div>

      <button type="submit" name="login">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        Update Student
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

    function showFields() {
      var nameField = document.getElementById("name-field");
      var passwordField = document.getElementById("password-field");
      var selectedOption = document.getElementsByName("userOption")[0].value;
      if (selectedOption === "name") {
        nameField.style.display = "block";
        passwordField.style.display = "none";
      } else if (selectedOption === "password") {
        passwordField.style.display = "block";
        nameField.style.display = "none";
      } else {
        nameField.style.display = "none";
        passwordField.style.display = "none";
      }
    }
  </script>
</body>

</html>