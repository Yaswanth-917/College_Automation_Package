<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QIS College of Engineering & Technology</title>
    <link rel="stylesheet" href="./CSS/Mainadmin.css">
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
    <div>
        <center>
            <table style="width: 92%;">
                <tr>
                    <?php
                    // retrieve the username from the URL parameter
                    if (isset($_GET['username'])) {
                        $username = $_GET['username'];
                    }
                    ?>

                    <!-- display the username in place of "Welcome User" -->
                    <td style="width: 25%; text-align: left; color: bisque"><b>Welcome <?php echo $username; ?></b></td>
                    <td style="text-align: center"><a href="Changepassword.php" target="options"><b>Change Password</b></a></td>
                    <td style="text-align: right;"><a href="Logout.php"><b>Logout</b></a></td>
                </tr>
            </table>
        </center>
    </div>
    <hr>
    <div>
        <table border="1" style="width: 150px; margin-left: 4%;">
            <tr>
                <td><a href="Addfaculty.php" target="options"><b>Add Faculty</b></a></td>
            </tr>
            <tr>
                <td><a href="Updatefaculty.php" target="options"><b>Update Faculty</b></a></td>
            </tr>
            <tr>
                <td><a href="Removefaculty.php" target="options"><b>Remove Faculty</b></a></td>
            </tr>
            <tr>
                <td><a href="Addstudent.php" target="options"><b>Add Student</b></a></td>
            </tr>
            <tr>
                <td><a href="Updatestudent.php" target="options"><b>Update Student</b></a></td>
            </tr>
            <tr>
                <td><a href="Removestudent.php" target="options"><b>Remove Student</b></a></td>
            </tr>
        </table>
        <iframe name="options" class="options" src=""></iframe>
    </div>
</body>

</html>