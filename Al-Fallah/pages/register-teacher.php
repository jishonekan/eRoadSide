<?php
include('connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit']))
{
	$firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $position = $_POST['position'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    
	

    $sql = "INSERT INTO `teacher`(`id`, `firstname`, `lastname`, `position`, `username`, `password` ) VALUES ('NULL','$firstname','$lastname ','$position','$username','$password')";
	
	

  if ($conn->query($sql) === TRUE) {
	
		header("Location:register-teachers.html");
    } 
	else {
		   
        echo "Error: " . $sql . "<br>" . $conn->error;
    }    

}

?>
