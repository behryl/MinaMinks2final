<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include("../settings/connection.php");
include("../settings/core.php");

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST["submit"])) {
    $firstname = test_input($_POST["firstname"]);
    $lastname = test_input($_POST["lastname"]);
    $email = test_input($_POST["email"]);
    $password = test_input($_POST["password1"]);
    $phonenumber = test_input($_POST["number"]);
    $password_confirmation = test_input($_POST["password2"]);

    // Default role id for normal users
    $role_id = 2;

    if (empty($firstname) || empty($lastname) || empty($email) || empty($password) || empty($phonenumber) || empty($password_confirmation)) {
        header("Location: ../signup.php?msg=One or more fields are empty. Please fill them.");
        exit();
    } else {
        // Check if email already exists
        $stmt = $conn->prepare("SELECT Email FROM user WHERE Email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            header("Location: ../signup.php?msg=This email is already associated with another account.");
            exit();
        } else {
            if ($password == $password_confirmation) {
                $final_password = password_hash($password, PASSWORD_DEFAULT);

                $stmt = $conn->prepare("INSERT INTO user (FirstName, LastName, MobileNumber, Email, Password, rid) VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("sssssi", $firstname, $lastname, $phonenumber, $email, $final_password, $role_id);

                if ($stmt->execute()) {
                    header("Location: ../login.php?msg=You have successfully registered.");
                    exit();
                } else {
                    header("Location: ../signup.php?msg=Something went wrong. Please try again.");
                    exit();
                }
            } else {
                header("Location: ../signup.php?msg=Passwords do not match.");
                exit();
            }
        }
    }
}
