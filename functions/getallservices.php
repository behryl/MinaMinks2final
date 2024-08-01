<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("./settings/connection.php");
include("./settings/core.php");

function fetchServices($conn) {
    // SQL query to fetch services
    $sql = "SELECT serviceid, servicename FROM services";
    $result = $conn->query($sql);

    // Check if any services were found
    if ($result->num_rows > 0) {
        // Fetch and return services as an associative array
        $services = array();
        while($row = $result->fetch_assoc()) {
            $services[] = $row;
        }
        return $services;
    } else {
        return array();
    }
}
?>
