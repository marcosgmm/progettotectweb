<?php
require_once ('db.php');
// Here the user id is harcoded.
// You can integrate your authentication code here to get the logged in user id
$userId = 1;

if (isset($_POST["index"], $_POST["restaurant_id"])) {

    $restaurantId = $_POST["restaurant_id"];
    $rating = $_POST["index"];

    $checkIfExistQuery = "select * from tbl_rating where user_id = '" . $userId . "' and restaurant_id = '" . $restaurantId . "'";
    if ($result = mysqli_query($conn, $checkIfExistQuery)) {
        $rowcount = mysqli_num_rows($result);
    }

    if ($rowcount == 0) {
        $insertQuery = "INSERT INTO tbl_rating(user_id,restaurant_id, rating) VALUES ('" . $userId . "','" . $restaurantId . "','" . $rating . "') ";
        $result = mysqli_query($conn, $insertQuery);
        echo "success";
    } else {
        echo "Already Voted!";
    }
}
