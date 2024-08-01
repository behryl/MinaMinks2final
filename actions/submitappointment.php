<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("../settings/connection.php");
include("../settings/core.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate input data
    $service_id = isset($_POST['service']) ? $_POST['service'] : '';
    $appointment_time = isset($_POST['appointmentTime']) ? $_POST['appointmentTime'] : '';
    $appointment_date = isset($_POST['appointmentDate']) ? $_POST['appointmentDate'] : '';
    $message = isset($_POST['message']) ? $_POST['message'] : '';
    $userId = $_SESSION['userid']; 

    if ($userId === null) {
        header("Location: ../bookappointment.php?msg=Error: User not logged in.");
        exit;
    }
    // Simple validation
    if (empty($service_id) || empty($appointment_time) || empty($appointment_date)) {
        header("Location: ../bookappointment.php?msg=All fields are required.");
        exit;
    }

    // Check if the appointment date is before today
    $currentDate = new DateTime();
    $appointmentDate = new DateTime($appointment_date);

    if ($appointmentDate < $currentDate) {
        header("Location: ../bookappointment.php?msg=Error: The appointment date cannot be in the past.");
        exit;
    }

    // Insert data into the database using prepared statements
    $stmt = $conn->prepare("INSERT INTO bookings (userid, serviceid, bookingtime, bookingdate, message, bookingstatus) VALUES (?, ?, ?, ?, ?, 3)");
    if ($stmt) {
        $stmt->bind_param("iisss", $userId, $service_id, $appointment_time, $appointment_date, $message);

        if ($stmt->execute()) {
            header("Location: ../bookinghistory.php?msg=Appointment successfully booked.");
        } else {
            header("Location: ../bookappointment.php?msg=Error: " . $stmt->error);
        }

        $stmt->close();
    } else {
        header("Location: ../bookappointment.php?msg=Error: " . $conn->error);
    }

    $conn->close();
} else {
    header("Location: ../bookappointment.php?msg=Invalid request.");
}
?>
