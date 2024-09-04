<?php

include "db.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql_delete = "DELETE FROM `registration` WHERE `id`=" . $id;
    mysqli_query($con, $sql_delete);
    header("location:view-data.php");
}
?>