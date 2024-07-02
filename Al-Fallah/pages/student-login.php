<?php

include('connect.php');


// Enable error reporting for debugging purposes
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form inputs
    $username = $_POST['username'];
    $password = $_POST['password'];
    $class = $_POST['class'];

    // Ensure inputs are not empty
    if (empty($username) || empty($password) || empty($class)) {
        echo "All fields are required.";
        exit;
    }

    // Use a prepared statement to prevent SQL injection
    $sql = "SELECT * FROM student WHERE username = ?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Statement preparation failed: " . $conn->error);
    }
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if a user was found
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Check if the password matches using MD5
        if (md5($password) == $user['password']) {
            // Check if the class matches
            if ($user['class'] === $class) {
                // Set session variables and redirect to the test page
                $_SESSION['username'] = $username;
                header("Location: take-test.php");
                exit;
            } else {
                echo "The class is incorrect.";
            }
        } else {
            // Check if the class matches even if the password is wrong
            if ($user['class'] === $class) {
                header("Location: take-test.php"); 
            } else {
                echo "The password and class are incorrect.";
            }
        }
    } else {
        echo "The username is incorrect.";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
