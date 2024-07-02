
<?php
include('connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit']))
{
	$question = $_POST['question'];
    $option_A = $_POST['option_a'];
    $option_B = $_POST['option_b'];
    $option_C = $_POST['option_c'];
    $option_D = $_POST['option_d'];
    $correct_answer = $_POST['answer'];
	$class = $_POST['class'];
	

    $sql = "INSERT INTO `questions`(`que_id`, `question`, `option_A`, `option_B`, `option_C`, `option_D`, `correct_answer`, `class`) VALUES ('NULL','$question','$option_A ','$option_B','$option_C','$option_D','$correct_answer','$class')";
	
	

  if ($conn->query($sql) === TRUE) {
	
		header("Location:set-questions.html");
    } 
	else {
		   
        echo "Error: " . $sql . "<br>" . $conn->error;
    }    

}

?>

