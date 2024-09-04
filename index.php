<?php

include "db.php";

$sql = "SELECT * FROM `countries`";
$res = mysqli_query($con, $sql);
// echo "<pre>";
// print_r($res);
// die();


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
    $state = $_POST['state_id'];
    $country = $_POST['country_id'];

    $image = $_FILES['image']['name'];
    $temp_name = $_FILES['image']['tmp_name'];
    $path = "assets/images/ " . $image;
    move_uploaded_file($temp_name, $path);

    $sql = "INSERT INTO `registration`(`name`,`email`,`password`,`gender`,`date-of-birth`,`hobby`,`address`,`city`,`state_id`,`country_id`,`image`) VALUES ('$name','$email','$password','$gender','$date','$hobby','$address','$city','$state','$country','$image')";

    if (mysqli_query($con, $sql)) {
        echo "Your Data Successfully Insert";
        header("location:view-data.php");
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
    <script src="assets/js/jquery-3.6.3.min.js"></script>
    <script>
        <script>
            $(document).ready(function(){
                $("#country_id").change(function () {

                    var country_id = $(this).val();

                    $.ajax({
                        url: 'ajax.php',
                        data: { country: country_id },
                        type: 'POST',
                        dataType: 'html',
                        success: function (data) {
                            $('#state_id').html(data);
                        }
                    });
                })
            });
    </script>
    </script>
</head>

<body>
    <div class="container">
        <div class="title">Registration</div>
        <div class="content">
            <form method="POST" enctype="multipart/form-data">
                <table align="center">
                    <tr class="row">
                        <td>
                            <label class="detail" for="name">Name :-</label>
                        </td>
                        <td>
                            <input class="value" type="text" name="name" placeholder="Enter Your Name...">
                        </td>
                    </tr>
                    <tr class="row">
                        <td>
                            <label class="detail" for="email">E-mail :-</label>
                        </td>
                        <td>
                            <input class="value" type="email" name="email" placeholder="Enter Your email...">
                        </td>
                    </tr>
                    <tr class="row">
                        <td>
                            <label class="detail" for="password">Password :-</label>
                        </td>
                        <td>
                            <input class="value" type="password" name="password" placeholder="Enter Your password...">
                        </td>
                    </tr>
                    <tr class="row">
                        <td>
                            <label class="detail" for="gender">Gender :-</label>
                        </td>
                        <td>
                            <input class="gendercs" type="radio" name="gender" value="male" checked> Male &nbsp;&nbsp;
                            <input class="gendercs" type="radio" name="gender" value="female"> Female
                        </td>
                    </tr>
                    <tr class="row">
                        <td>
                            <label class="detail" for="date-of-birth">Date-Of-Birth :-</label>
                        </td>
                        <td>
                            <input class="value" type="date" name="date-of-birth">
                        </td>
                    </tr>
                    <tr class="row">
                        <td>
                            <label class="detail" for="hobby">Hobby :-</label>
                        </td>
                        <td class="hobby1">
                            <input class="hobby" type="checkbox" name="hobby[]" value="music"> Music <span class="hobb">
                                <br> </span>
                            <input class="hobby" type="checkbox" name="hobby[]" value="singing"> Singing <span
                                class="hobb"> <br> </span>
                            <input class="hobby" type="checkbox" name="hobby[]" value="playing"> Playing
                        </td>
                    </tr>
                    <tr class="row">
                        <td>
                            <label class="detail" for="address">Address :-</label>
                        </td>
                        <td>
                            <textarea class="area" name="address" cols="25" rows="2"></textarea>
                        </td>
                    </tr>
                    <!-- <tr class="row">
                        <td>
                            <label class="detail" for="city">City :-</label>
                        </td>
                        <td>
                            <select class="select" name="city">
                                <option selected disabled>Plese Select Your City</option>
                                <option value="vadodra">Vadodara</option>
                                <option value="amreli">amreli</option>
                                <option value="other">other</option>
                            </select>
                        </td>
                    </tr> -->
                    <tr class="row">
                        <td>
                            <label class="detail" for="state_id">state_id :-</label>
                        </td>
                        <td>
                            <select class="select" name="state_id" id="state_id">
                                <option selected disabled>Plese Select Your state</option>
                                <option value="gujrat">gujrat</option>
                                <option value="hariyana">hariyana</option>
                                <option value="landan-city">landan-city</option>
                                <option value="uk-city">uk-city</option>
                                <option value="china-city">china-city</option>
                            </select>
                        </td>
                    </tr>
                    <tr class="row">
                        <td>
                            <label class="detail" for="country_id">country_id :-</label>
                        </td>
                        <td>
                            <select class="select" name="country_id" id="country_id">
                                <option selected disabled>Plese Select Your country</option>
                                <?php while ($row = mysqli_fetch_assoc($res)) { ?>

                                    <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>

                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr class="row">
                        <td>
                            <label for="image">image</label>
                        </td>
                        <td>
                            <input type="file" name="image">
                        </td>
                    </tr>
                    <tr class="row">
                        <td colspan="2" align="center">
                            <input class="Register" type="submit" name="submit" value="Register">
                        </td>
                    </tr>
                    <tr class="row">
                        <td colspan="2" align="center">
                            <p class="login">Already have an account ? <a href="login.php">Login</a></p>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>

</html>