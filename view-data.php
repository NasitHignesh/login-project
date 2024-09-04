<?php

include "db.php";


$sql = "SELECT * FROM `registration`";
$res = mysqli_query($con, $sql);

$limit = 3;

$num = mysqli_num_rows($res);

$total = ceil($num / $limit);

$page = 1;
if (isset($_GET['page']) && $_GET['page'] > 0) {
    $page = $_GET['page'];
}

$offset = ($page - 1) * $limit;

if (isset($_GET['search']) && $_GET['search'] != '') {
    $search = $_GET['search'];
    $sql = "SELECT * FROM `registration` WHERE `name` LIKE  '%" . $search . "%' LIMIT $offset,$limit";
    $res = mysqli_query($con, $sql);
} else {
    $sql = "SELECT * FROM `registration` LIMIT $offset,$limit";
    $res = mysqli_query($con, $sql);

}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="item">
        <table border="2" cellspacing="0" cellpadding="7">
            <tr>
                <td colspan="4">
                    <form>
                        <input type="text" size="30" name="search" placeholder="Enter search hear" value="<?php if (isset($_GET['search']) && $_GET['search'] != '') {
                            echo $_GET['search'];
                        } ?>">
                        <input type="submit" name="search_btn" value="search">
                    </form>
                </td>
                <td>
                    <a href="view-data.php">Reset</a>
                </td>
                <th colspan="8">
                    <?php
                    if (isset($_SESSION["email"])) {
                        echo "welcome " . $_SESSION["email"];
                    }
                    ?>
                </th>
                <td colspan="2">
                    <span> <a href="index.php" class="newdata">Add New Data</a></span>
                </td>
                <td colspan="2">
                    <a href="logout.php"><input type="submit" name="submit" value="Logout"></a>

                </td>
            </tr>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>E-mail</th>
                <th>Password</th>
                <th>Gender</th>
                <th>Date-of-Birth</th>
                <th>Hobby</th>
                <th>Address</th>
                <th>City</th>
                <th>State</th>
                <th>Country</th>
                <th>Image</th>
                <th>Created_At</th>
                <th>Upadated_At</th>
                <th>Action</th>
                <th>Action</th>
            </tr>
            <?php

            while ($row = mysqli_fetch_assoc($res)) {

                ?>
                <tr>
                    <td>
                        <?php echo $row['id']; ?>
                    </td>
                    <td>
                        <?php echo $row['name']; ?>
                    </td>
                    <td>
                        <?php echo $row['email']; ?>
                    </td>
                    <td>
                        <?php echo $row['password']; ?>
                    </td>
                    <td>
                        <?php echo $row['gender']; ?>
                    </td>
                    <td>
                        <?php echo $row['date-of-birth']; ?>
                    </td>
                    <td>
                        <?php echo $row['hobby']; ?>
                    </td>
                    <td>
                        <?php echo $row['address']; ?>
                    </td>
                    <td>
                        <?php echo $row['city']; ?>
                    </td>
                    <td>
                        <?php echo $row['state_id']; ?>
                    </td>
                    <td>
                        <?php echo $row['country_id']; ?>
                    </td>
                    <td><img src="assets/images/ <?php echo $row['image']; ?>" width="80px" height="80px"></td>
                    <td>
                        <?php echo $row['created-at']; ?>
                    </td>
                    <td>
                        <?php echo $row['updated-at']; ?>
                    </td>
                    <td>
                        <a href="delet.php?id=<?php echo $row['id']; ?>"
                            onclick="return confirm('Are you want to sure Delete this data?');">Delete</a>
                    </td>
                    <td>
                        <a href="edit.php?id=<?php echo $row['id']; ?>"
                            onclick="return confirm('Are you want to sure Edit this data?');">Edit</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <div class="page-num">
            <?php
            for ($i = 1; $i <= $total; $i++) {
                ?>
                <a
                    href="view-data.php?page=<?php echo $i; ?>&search=<?php echo (isset($_GET['search']) && $_GET['search'] != '') ? $_GET['search'] : ''; ?>"><?php echo $i; ?></a>
                <?php
            }
            ?>
        </div>
    </div>
</body>

</html>