<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("../settings/connection.php");
include("../settings/core.php");


// $userId = isset($_SESSION['userid']) ? $_SESSION['userid'] : null;

// if ($userId === null) {
//     header("Location: ../admindash.php?msg=Error: User not logged in.");
//     exit;
// }

$query = "SELECT b.bookingid, b.serviceid, b.bookingtime, b.bookingdate, b.message, s.servicename, st.status_name, st.status_id, u.firstname, u.lastname
          FROM bookings b
          JOIN services s ON b.serviceid = s.serviceid
          JOIN bstatus st ON b.bookingstatus = st.status_id
                    JOIN users u ON b.userid = u.userid

          ORDER BY b.bookingdate DESC";


$stmt = $conn->prepare($query);
if ($stmt) {
    $stmt->execute();
    $result = $stmt->get_result();

    $bookings = [];
    while ($row = $result->fetch_assoc()) {
        $bookings[] = $row;
    }
    $stmt->close();
} else {
    echo "Error: " . $conn->error;
}

$conn->close();

echo json_encode($bookings);
?>
