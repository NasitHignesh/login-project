<?php

include "db.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql_sel = "SELECT * FROM `registration` WHERE `id`=" . $id;
    $res = mysqli_query($con, $sql_sel);
    $row = mysqli_fetch_assoc($res);
    $hobby = array();

    if (isset($row['hobby']) && $row['hobby'] != '') {
        $hobby_arr = explode(",", $row['hobby']);
    }


} 

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $date = $_POST['date-of-birth'];
    $hobby = '';
    if (isset($_POST['hobby']) && count($_POST['hobby']) > 0) {
        $hobby = implode(",", $_POST['hobby']);
    }
    $address = $_POST['address'];
    $city = $_POST['city'];

    $image = $_FILES['image']['name'];
    $temp_name = $_FILES['image']['tmp_name'];
    $path = "assets/images/ " . $image;
    move_uploaded_file($temp_name, $path);


    if ($_GET['id']) {
        $sql = "UPDATE `registration` SET `name` = '$name', `email` = '$email', `password` = '$password' , `gender`='$gender', `date-of-birth` = '$date' , `hobby` = '$hobby' , `address` = '$address' , `image` = '$image' WHERE `id`=" . $_GET['id'];
        header("location:view-data.php");
    } else {

        $sql = "INSERT INTO `registration` (`name`,`email`,`password`,`gender`,`date-of-birth`,`hobby`,`address`,`image`) VALUES ('$name','$email','$password','$gender','$date','$hobby','$address','$image')";
    }


    if (mysqli_query($con, $sql)) {
        echo "Your Data Successfully Insert";
    } else {
        echo "Something Went Wrong";
        echo mysqli_error($con);
    }


}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/media-query.css">
</head>

<body>
    <div class="container">
        <div class="title">Edit</div>
        <div class="content">
            <form method="POST" enctype="multipart/form-data">
                <table align="center">
                    <tr class="row">
                        <td>
                            <label class="detail" for="name">Name :-</label>
                        </td>
                        <td>
                            <input class="value" type="text" name="name" value="<?php echo $row['name']; ?>">
                        </td>
                    </tr>
                    <tr class="row">
                        <td>
                            <label class="detail" for="email">E-mail :-</label>
                        </td>
                        <td>
                            <input class="value" type="email" name="email" value="<?php echo $row['email']; ?>">
                        </td>
                    </tr>
                    <tr class="row">
                        <td>
                            <label class="detail" for="password">Password :-</label>
                        </td>
                        <td>
                            <input class="value" type="password" name="password"
                                value="<?php echo $row['password']; ?>">
                        </td>
                    </tr>
                    <tr class="row">
                        <td>
                            <label class="detail" for="gender">Gender :-</label>
                        </td>
                        <td>
                            <input type="radio" name="gender" value="male " <?php if ($row['gender'] == 'male') {
                                echo "checked";
                            } ?>>Male
                            <input type="radio" name="gender" value="female" <?php if ($row['gender'] == 'female') {
                                echo "checked";
                            } ?>>Female
                        </td>
                    </tr>
                    <tr class="row">
                        <td>
                            <label class="detail" for="date-of-birth">Date-Of-Birth :-</label>
                        </td>
                        <td>
                            <input class="value" type="date" name="date-of-birth"
                                value="<?php echo $row['date-of-birth']; ?>">
                        </td>
                    </tr>
                    <tr class="row">
                        <td>
                            <label class="detail" for="hobby">Hobby :-</label>
                        </td>
                        <td class="hobby1">
                            <input class="hobby" type="checkbox" name="hobby[]" value="music" <?php
                            echo (in_array('music', $hobby_arr)) ? 'checked' : ''; ?>> Music <span class="hobb"> <br>
                            </span>
                            <input class="hobby" type="checkbox" name="hobby[]" value="singing" <?php
                            echo (in_array('singing', $hobby_arr)) ? 'checked' : ''; ?>> Singing <span class="hobb">
                                <br> </span>
                            <input class="hobby" type="checkbox" name="hobby[]" value="playing" <?php
                            echo (in_array('playing', $hobby_arr)) ? 'checked' : ''; ?>> Playing
                        </td>
                    </tr>
                    <tr class="row">
                        <td>
                            <label class="detail" for="address">Address :-</label>
                        </td>
                        <td>
                            <textarea class="area" name="address" cols="25"
                                rows="2"><?php echo $row['address']; ?></textarea>
                        </td>
                    </tr>
                    <tr class="row">
                        <td>
                            <label class="detail" for="city">City :-</label>
                        </td>
                        <td>
                            <select class="select" name="city">
                                <option selected disabled>Plese Select Your City</option>
                                <option value="surat" <?php if ($row['city'] == 'surat') {
                                    echo "selected";
                                } ?>>Surat
                                </option>
                                <option value="vadodra" <?php if ($row['city'] == 'vadodra') {
                                    echo "selected";
                                } ?>>
                                    Vadodara</option>
                                <option value="other" <?php if ($row['city'] == 'other') {
                                    echo "selected";
                                } ?>>other
                                </option>
                            </select>
                    </tr>
                    <tr class="row">
                        <td>
                            <label for="image">image</label>
                        </td>
                        <td>
                            <input type="file" name="image">
                            <?php echo $row['image']; ?>
                        
                        </td>
                    </tr>
                    <tr class="row">
                        <td colspan="2" align="center">
                            <input class="Register" type="submit" name="submit" value="Update">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>

</html>