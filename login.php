<?php

include "db.php";
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `admin` WHERE `name`='$email' AND `password`='$password'";
    $res = mysqli_query($con, $sql);
    $row = mysqli_num_rows($res);

    $sql_em = "SELECT * FROM `registration` WHERE `email`='$email'";
    $res_em = mysqli_query($con, $sql_em);
    $row_em = mysqli_num_rows($res_em);

    $sql_pas = "SELECT * FROM `registration` WHERE `password`='$password'";
    $res_pas = mysqli_query($con, $sql_pas);
    $row_pas = mysqli_num_rows($res_pas);



    if ($row > 0) {
        $_SESSION["email"] = $email;
        $_SESSION["password"] = $password;
        header("location:view-data.php");
    } else if ($row_em > 0) {
        echo "Plese Enter Correct Password";
    } else if ($row_pas > 0) {
        echo "Plese Enter Correct Email";
    } else {
        echo "Enter Currect Email And Pasword";
    }

}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/media-query.css">
    <link rel="stylesheet" href="assets/css/319-responsive.css">
    <script src="assets/js/jquery-3.6.3.min.js"></script>
    <script src="assets/js/hide-show.js"></script>
</head>

<body>
    <div class="container" id="container">
        <div class="content" id="content">
            <form method="POST">
                <table align="center">
                    <tr class="row">
                        <td>
                            <label class="detail" for="email">E-mail :-</label>
                        </td>
                        <td>
                            <input class="value" id="email" type="email" name="email" placeholder="Enter Your email...">
                        </td>
                    </tr>
                    <tr class="row">
                        <td>
                            <label class="detail" for="password">Password :-</label>
                        </td>
                        <td>
                            <input class="value" id="password" type="password" name="password"
                                placeholder="Enter Your password...">
                        </td>
                    </tr>
                    <tr class="row">
                        <td colspan="2" align="center">
                            <input class="Register" id="login" type="submit" name="submit" value="Login">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <a href="index.php" class="account">Dont have an account ?</a>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <div id="emojis">
            <img src="assets/logo/smile.png" alt="" class="images" id="smile">
            <img src="assets/logo/hide.png" alt="" class="hide" id="hide">
        </div>
    </div>
</body>

</html>