<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Take Exam </title>
    <!-- Your CSS and other head elements go here -->
</head>
<body>
    <div class="body">
        <div class="banner">
            <img class="schlogo" src="../images/schlogo.jpg">
            <div class="msg"><marquee>Welcome To Al-Fallah Schools</marquee></div>
        </div>
        <form action="take-exam.php" method="post">
            <!-- Your PHP code goes here -->
            <?php 
            include('connect.php');
            
            if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['class']) && isset($_POST['submit'])) {
                $class = $_POST['class'];
                $sql = "SELECT * FROM questions WHERE class='$class' ORDER BY RAND() LIMIT 2";
                $result = $conn->query($sql);
            
                if ($result->num_rows == 1) {
                    $row = $result->fetch_assoc();
                    $question = $row["question"];
                    $option_A = $row["option_a"];
                    $option_B = $row["option_b"];
                    $option_C = $row["option_c"];
                    $option_D = $row["option_d"];
            ?>
                    <h2>Question</h2>
                    <?php echo $question; ?>
            
                    <h3><?php echo $question; ?></h3>
                    <input type="radio" id="option_a" name="answer" value="option1"><label for="option1"><?php echo $option_A; ?></label><br>
                    <input type="radio" id="option_b" name="answer" value="option2"><label for="option2"><?php echo $option_B; ?></label><br>
                    <input type="radio" id="option_c" name="answer" value="option3"><label for="option3"><?php echo $option_C; ?></label><br>
                    <input type="radio" id="option_d" name="answer" value="option4"><label for="option4"><?php echo $option_D;?></label><br>
                    <input type="submit" value="Submit Answer">
            <?php
                } else {
                    echo "No questions found in the database for class level $class.";
                }
            }
            ?>
        </form>
    </div>
    <footer class="footer">
        <div class="iner2">powered by: A4 Solutions and Services Limited . . .   Tel: 08185165911</div>
    </footer>
    <!-- Your JavaScript and other footer elements go here -->
</body>
</html>











