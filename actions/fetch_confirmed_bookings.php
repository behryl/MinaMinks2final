<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("../settings/connection.php");
include("../settings/core.php");


// Fetch booking count
$sql_count = "SELECT COUNT(*) as booking_count FROM bookings    WHERE bookingstatus=1";
$result_count = $conn->query($sql_count);
$count = $result_count->fetch_assoc();

$response = array("count" => $count['booking_count']);

echo json_encode($response);

$conn->close();
?>
