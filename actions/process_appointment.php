<?php
// Display all errors and warnings
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include database connection file
include("../settings/connection.php");
include("../settings/core.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $firstName = htmlspecialchars($_POST['firstName']);
    $lastName = htmlspecialchars($_POST['lastName']);
    $phoneNumber = htmlspecialchars($_POST['contact']);

    // Default or placeholder values for additional fields
    $userId = $_SESSION['userid'];
    $email = "user_" . time() . rand(1000, 9999) . "@example.com";
    $password = password_hash("defaultpassword", PASSWORD_BCRYPT); // Default hashed password
    $passwordConfirmation = $password; // Set to the same hashed password
    $service_id = isset($_POST['service']) ? $_POST['service'] : '';
    $appointment_time = isset($_POST['appointmentTime']) ? $_POST['appointmentTime'] : '';
    $appointment_date = isset($_POST['appointmentDate']) ? $_POST['appointmentDate'] : '';
    $message = isset($_POST['message']) ? $_POST['message'] : '';

    // Simple validation
    if (empty($service_id) || empty($appointment_time) || empty($appointment_date)) {
        header("Location: ../index.php?msg=All fields are required.");
        exit;
    }

    $currentDate = new DateTime();
    $appointmentDate = new DateTime($appointment_date);

    if ($appointmentDate < $currentDate) {
        header("Location: ../index.php?msg=Error: The appointment date cannot be in the past.");
        exit;
    }

    // Use the global connection
    global $conn; // Ensure this refers to the valid connection

    // Check if $conn is valid
    if ($conn === null) {
        die("Database connection not established.");
    }



    // try {
    // Insert user data into the users table
    $stmt = $conn->prepare("INSERT INTO users (firstname, lastname, email, password, phonenumber, password_confirmation) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $firstName, $lastName, $email, $password, $phoneNumber, $passwordConfirmation);
    $stmt->execute();

    // Get the user ID of the newly inserted user
    $userId = $stmt->insert_id;






    // Insert data into the database using prepared statements
    $stmt = $conn->prepare("INSERT INTO bookings (userid, serviceid,bookingtime , message,bookingdate, bookingstatus ) VALUES (?, ?, ?, ?, ?, 3)");
    if ($stmt) {
        $stmt->bind_param("iisss", $userId, $service_id, $appointment_time, $message, $appointment_date);

        if ($stmt->execute()) {
            header("Location: ../index.php?msg=Appointment successfully booked.");
        } else {
            header("Location: ../index.php?msg=Error: " . $stmt->error);
        }

        $stmt->close();
    } else {
        header("Location: ../index.php?msg=Error: " . $conn->error);
    }
}
