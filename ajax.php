<?php



include 'db.php';

$html = '<option value="">Select State</option>';

if (isset($_POST['country_id']) && $_POST['country_id'] > 0) {

    $country_id = $_POST['country_id'];

    $sql = "SELECT * FROM `states` WHERE country_id=" . $country_id;
    $res = mysqli_query($con, $sql);
    ?>
    <option value="">Select State...</option>
    <?php

    while ($row = mysqli_fetch_assoc($res)) {

        ?>
         <option value="<?php echo $row['id']; ?>"><?php $row['name']; ?></option>
        <?php

    }

}

// echo $html;
exit();

?>