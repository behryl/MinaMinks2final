<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("../settings/connection.php");
include("../settings/core.php");

$userId = isset($_SESSION['userid']) ? $_SESSION['userid'] : null;

if ($userId === null) {
    header("Location: ../index.php?msg=Error: User not logged in.");
    exit;
}

$query = "SELECT b.bookingid, b.serviceid, b.bookingtime, b.bookingdate, b.message, s.servicename
          FROM bookings b
          JOIN services s ON b.serviceid = s.serviceid
          JOIN bstatus st ON b.bookingstatus = st.status_id
          WHERE b.userid = ?
          ORDER BY b.bookingdate DESC";
// $query = "SELECT b.bookingid, b.serviceid, b.bookingtime, b.bookingdate, b.message, s.servicename 
//           FROM bookings b
//           JOIN services s ON b.serviceid = s.serviceid
//           WHERE b.userid = ?
//           ORDER BY b.bookingdate DESC";

$stmt = $conn->prepare($query);
if ($stmt) {
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    $bookings = [];
    while ($row = $result->fetch_assoc()) {
        $bookings[] = $row;
    }

    // Print the bookings array
    echo "<pre>";
    print_r($bookings);
    echo "</pre>";
    $stmt->close();

    
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
echo json_encode($bookings);
?>
