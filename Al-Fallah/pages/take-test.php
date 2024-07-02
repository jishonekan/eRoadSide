 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Take The Test</title>
    <!-- Your CSS and other head elements go here -->
	<style>
		.banner{

			background-color: #350698;
			border-color: #E00A10;  height:80px
				
			
		}
		.schlogo{
			height: 80px; width: 98px; border-radius: 10px;
		
		}
		.msg{
			margin-left: 100px; margin-top: -70px;
				
			color: white;
			font-size: 40px
			}
		.nav{float: right;padding-right: 20px;}
		.sign-in{
<?php

include('connect.php');



// Check if form data is submitted
if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['class'])) {
    // Retrieve form inputs
    $username = trim($_POST['username']);
    

    // Authenticate user with provided username, password, and class
    $sql_user = "SELECT class FROM student WHERE username = ? AND password = ? AND class = ?";
    $stmt_user = $conn->prepare($sql_user);
    $stmt_user->bind_param("sss", $username, $password, $class);
    $stmt_user->execute();
    $result_user = $stmt_user->get_result();

    // Check if a user with matching username, password, and class exists
    if ($result_user->num_rows > 0) {
        echo "<h3>Welcome, $username </h3>";
        echo "<h4>Attempt all questions</h4>";

        // Retrieve questions based on the user's class
        $sql_questions = "SELECT question, option_a, option_b, option_c, option_d FROM questions WHERE class = ? ORDER BY RAND() LIMIT 10";
        $stmt_questions = $conn->prepare($sql_questions);
        $stmt_questions->bind_param("s", $class);
        $stmt_questions->execute();
        $result_questions = $stmt_questions->get_result();

        // Display the questions
        $question_number = 1;
        while ($row = $result_questions->fetch_assoc()) {
            $question = $row['question'];
            $option_A = $row['option_a'];
            $option_B = $row['option_b'];
            $option_C = $row['option_c'];
            $option_D = $row['option_d'];
            
            echo "<h3>$question_number. $question</h3>";
            echo "<input type='radio' id='option_a' name='answer_$question_number' value='option_a'>";
            echo "<label for='option_a'>$option_A</label>";
            echo "<input type='radio' id='option_b' name='answer_$question_number' value='option_b'>";
            echo "<label for='option_b'>$option_B</label>";
            echo "<input type='radio' id='option_c' name='answer_$question_number' value='option_c'>";
            echo "<label for='option_c'>$option_C</label>";
            echo "<input type='radio' id='option_d' name='answer_$question_number' value='option_d'>";
            echo "<label for='option_d'>$option_D</label>";
            
            $question_number++;
        }
    } else {
        echo "<h2>Invalid username, password, or class provided. Please try again.</h2>";
    }
} else {
    // Redirect to take-test.html if the form is not submitted
    header("Location: take-test.html");
    exit();
}

// Always close the connection and prepared statements
$stmt_user->close();
$stmt_questions->close();
$conn->close();

?>

			<input type='submit' value='Submit Answers'>
</form>
</nav><nav class="pagination">
  <ul>
    <li class="prev"><a href="#"><span>&lsaquo; Prev</span></a></li>
    <li><a href="#"><span>1</span></a></li>
    <li><a class="active" href="#"><span>2</span></a></li>
    <li><a href="#"><span>3</span></a></li>
    <li><a href="#"><span>4</span></a></li>
    <li><a href="#"><span>5</span></a></li>
    <li class="next"><a href="#"><span>Next &rsaquo;</span></a></li>
  </ul>
</nav>
    </div>
    <footer class="footer">
        <div class="iner2">powered by: A4 Solutions and Services Limited . . .   Tel: 08185165911</div>
    </footer>
    <!-- Your JavaScript and other footer elements go here -->
</body>
</html>

 