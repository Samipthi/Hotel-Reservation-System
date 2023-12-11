<?php

include '../config.php';

$id = $_GET['payment_id'];

$deletesql = "DELETE FROM payment WHERE payment_id = $id";

$result = mysqli_query($conn, $deletesql);

header("Location:payment.php");

?>