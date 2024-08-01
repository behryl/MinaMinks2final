<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
include("settings/connection.php");
include("settings/core.php");

// Check if 'id' is set in the query string
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $bookingId = $_GET['id'];

    // Fetch booking details from the database
    $query = "SELECT * FROM bookings WHERE bookingid = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $bookingId);
    $stmt->execute();
    $result = $stmt->get_result();
    $booking = $result->fetch_assoc();

 

    if (!$booking) {
        header("Location: ../edit_booking.php?msg=Booking not found.");

        exit;
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission to update booking
    $bookingId = $_POST['booking_id'];

    $serviceId = $_POST['service'];
    $appointmentTime = $_POST['appointmentTime'];
    $appointmentDate = $_POST['appointmentDate'];
    $message = $_POST['message'];

    // Ensure fields are not empty
    if (empty($appointmentTime) || empty($appointmentDate)) {
        header("Location: ../edit_booking.php?msg=Time and date are required.");

        exit;
    }

    // Check if the appointment date is before today
    $currentDate = new DateTime();
    $appointment_Date = new DateTime($appointmentDate);

    if ($appointment_Date < $currentDate) {
        header("Location: ../edit_booking.php?msg=Error: The appointment date cannot be in the past.");
        exit;
    }

    // Handle empty message
    $message = $message ?: '';

    $query = "UPDATE bookings SET serviceid = ?, bookingtime = ?, bookingdate = ?, message = ? WHERE bookingid = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("isssi", $serviceId, $appointmentTime, $appointmentDate, $message, $bookingId);

    if ($stmt->execute()) {
        header('Location: bookinghistory.php'); // Redirect on success
        exit;
    } else {
        echo "Error updating booking: " . $stmt->error;
    }
} else {
    echo "Invalid request.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>MINA MINKS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="PNG image.JPEG" type="image/x-icon">
    <link rel="shortcut icon" href="PNG image.JPEG" type="image/x-icon">
    <script src="js/jquery.js"></script>
    <script src="js/jquery-migrate-1.1.1.js"></script>
    <script src="js/bgstretcher.js"></script>
    <script>
        $(document).ready(function() {
            $('body').bgStretcher({
                images: ['images/slide-1.jpg', 'images/slide-2.jpg', 'images/slide-3.jpg'],
                imageWidth: 1600,
                imageHeight: 964,
                resizeProportionally: true,
                slideDirection: 'N',
                slideShowSpeed: 1000,
                transitionEffect: 'fade',
                sequenceMode: 'normal',
                pagination: '#nav'
            });
            $('#bookAppointmentBtn').click(function() {
                $('#appointmentModal').show();
            });

            $('.close').click(function() {
                $('#appointmentModal').hide();
                $('#editBookingModal').hide();
            });


        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dateInput = document.getElementById('appointmentDate');

            // Set the minimum date to today's date
            const today = new Date().toISOString().split('T')[0];
            dateInput.setAttribute('min', today);
        });
    </script>
</head>

<body>
    <div class="extra-block1">
        <div class="row-top">
            <div class="main">
                <ul class="list-soc">
                    <li><a href="#"><img alt="" src="images/soc-icon1.png"></a></li>
                    <li><a href="#"><img alt="" src="images/soc-icon2.png"></a></li>
                </ul>
            </div>
        </div>
        <header>
            <div class="row-nav">
                <div class="main">
                    <h1 class="logo"><a href="index.html"><img alt="MINA MINKS"></a></h1>
                    <nav>
                        <ul class="menu">
                            <li><a href="bookappointment.php">Home</a></li>
                            <li><a href="about-us-login.php">About Us</a></li>
                            <li><a href="services-login.php">Services</a></li>
                            <li><a href="gallery-login.php">Gallery</a></li>
                            <li><a href="contact-login.php">Contacts</a></li>
                            <li class="current"><a href="bookinghistory.php">Booking history</a></li>
                            <li><a href="invoicehistory.php">Invoice history</a></li>
                            <li><a href="profile.php">Profile</a></li>
                            <li><a href="setting.php">Setting</a></li>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                    </nav>
                    <div class="clear"></div>
                </div>
            </div>
        </header>
        <section id="content">
            <div class="main-block">
                <div class="container_12">
                    <div class="wrapper border-vert">
                        <article class="grid_5">
                            <h2>Edit Booking</h2>
                            <form action="edit_booking.php" method="POST">
                                <input type="hidden" id="booking_id" name="booking_id" value="<?php echo htmlspecialchars($booking['bookingid']); ?>">

                                <label for="service">Service:</label>
                                <select id="service" name="service">
                                    <?php
                                    include './functions/getallservices.php';
                                    $services = fetchServices($conn);
                                    foreach ($services as $service) {
                                        $selected = ($service['serviceid'] == $booking['serviceid']) ? 'selected' : '';
                                        echo '<option value="' . htmlspecialchars($service['serviceid']) . '" ' . $selected . '>' . htmlspecialchars($service['servicename']) . '</option>';
                                    }
                                    ?>
                                </select><br><br>

                                <label for="appointmentTime">Time:</label>
                                <input type="time" id="appointmentTime" name="appointmentTime" value="<?php echo htmlspecialchars($booking['bookingtime']); ?>"><br><br>

                                <label for="appointmentDate">Date:</label>
                                <input type="date" id="appointmentDate" name="appointmentDate" min="<?php echo date('Y-m-d'); ?>" required>

                                <label for="message">Message:</label><br>
                                <textarea id="message" name="message" rows="4" cols="50"><?php echo htmlspecialchars($booking['message']); ?></textarea><br><br>

                                <input type="submit" value="Update Booking">
                            </form>
                        </article>
                        <article class="grid_5 prefix_2"></article>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>