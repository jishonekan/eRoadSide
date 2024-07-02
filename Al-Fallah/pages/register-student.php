

<?php
include('connect.php');

// Only proceed if the request method is POST and the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Retrieve form inputs
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $name_of_school = trim($_POST['name_of_school']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $class = trim($_POST['class']);
    
    // Hash the password using a secure hashing algorithm before storing it in the database
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare the SQL query to insert data into the student table
    $stmt = $conn->prepare("INSERT INTO `student` (`firstname`, `lastname`, `name_of_school`, `username`, `password`, `class`) VALUES (?, ?, ?, ?, ?, ?)");
    
    // Bind the form inputs to the prepared statement
    $stmt->bind_param("ssssss", $firstname, $lastname, $name_of_school, $username, $hashed_password, $class);

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect the user to register-student.html upon successful insertion
        header("Location: register-student.html");
        exit(); // Ensure the script stops execution after the redirect
    } else {
        // Output an error message if there is a problem
        echo "Error: " . $stmt->error;
    }

    // Close the prepared statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>