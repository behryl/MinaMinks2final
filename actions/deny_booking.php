<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
include("../settings/connection.php");
include("../settings/core.php");

// Check if 'id' is set in the query string
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $bookingId = $_GET['id'];

    $query = "UPDATE bookings SET bookingstatus = 2 WHERE bookingid = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $bookingId);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Booking successfully denied.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Error executing query: ' . $stmt->error]);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}
exit;
?>
