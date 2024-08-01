<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("../settings/connection.php");
include("../settings/core.php");

if (isset($_POST["submit"])) {
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $email = test_input($_POST["email"]);
    $password = test_input($_POST["password"]);

    if (empty($email) || empty($password)) {
        header("Location: ../login.php?msg=One or more fields are empty. Please fill them.");
        exit();
    } else {
        $stmt = $conn->prepare("SELECT userid, Password, roleid FROM users WHERE Email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 0) {
            header("Location: ../login.php?msg=This email is not registered.");
            exit();
        } else {
            $row = $result->fetch_assoc();
            $test = password_verify($password, $row['Password']);

            if ($test) {
                // Set session variables
                $_SESSION['userid'] = $row['userid'];
                $_SESSION['email'] = $email;
                $_SESSION['roleid'] = $row['roleid'];

                // Redirect based on role ID
                if ($row['roleid'] == 1) {
                    header("Location: ../admin/admindash.php"); //will change this to the admin page after i set it up 
                } else {
                    header("Location: ../bookappointment.php?msg=login successful!");
                }
                exit();
            } else {
                header("Location: ../login.php?msg=Invalid password.");
                exit();
            }
        }
    }
}
?>
