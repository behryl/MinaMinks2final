<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("../settings/connection.php");
include("../settings/core.php");

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Get booking ID from POST data
    $bookingId = isset($_GET['id']) ? intval($_GET['id']) : 0;

    if ($bookingId <= 0) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid booking ID.']);
        exit;
    }

    // Check if the user is logged in
    if (!isset($_SESSION['userid'])) {
        echo json_encode(['status' => 'error', 'message' => 'User not logged in.']);
        exit;
    }

    $userId = $_SESSION['userid'];

    // Prepare SQL query to delete booking
    $query = "DELETE FROM bookings WHERE bookingid = ? AND userid = ?";
    $stmt = $conn->prepare($query);

    if (!$stmt) {
        echo json_encode(['status' => 'error', 'message' => 'Error preparing statement: ' . $conn->error]);
        exit;
    }

    $stmt->bind_param("ii", $bookingId, $userId);

    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            echo json_encode(['status' => 'success', 'message' => 'Booking successfully deleted.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'No matching booking found to delete.']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Error executing query: ' . $stmt->error]);
    }

    $stmt->close();
    $conn->close();
} else {

    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}
?>
