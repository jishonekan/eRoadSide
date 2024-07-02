 <!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Al-Fallah CBT</title>

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
		.bodi{background-color: #F5CFF0;}
		.sign-in{
			margin-left: 950px;
			border-radius: 5px;
			cursor: pointer;
			 } 
		.form1{
			background-color: #F5CFF0;	
			}
		.tip1{
			font-style: italic; margin-top: -10px;
		}
		.submit1{
			border-radius: 8px;margin-bottom: 20px;
		}
		.iner1{margin-left:250px;margin-right: 200px; margin-bottom: 00px; }
		
		}
		.footer{
			
			background-color:#05129F; }
		.iner2{
			background-color: #350698;color:white;
			padding-left: 300px;
		}
		</style>
	</head>

<body>
    <div class="bodi">
        <div class="banner">
            <img class="schlogo" src="../images/schlogo.jpg">
            <div class="msg"><marquee> Welcome To Al-Fallah Schools</marquee></div>
        </div>
		<div class="content">
            <?php
            // Assuming username is retrieved from the form
            $username = isset($_POST['username']) ? $_POST['username'] : '';

            // Check if username is provided
            if (!empty($username)) {
                echo "<h2>Welcome, $username!</h2>";
            } else {
                echo "<h2>Please provide a username.</h2>";
            }
            ?>
        <form class="form1" action="take-test.php" method="post">
            <div class="iner1">
                <h4>Click your class below to take the test</h4>

              
                <br>
                <input type="radio" id="admin" name="class" value="Grade 1"><label for="admin">Grade 1</label>
                <input type="radio" id="admin" name="class" value="Grade 2"><label for="admin">Grade 2</label>
                <input type="radio" id="admin" name="class" value="Grade 3"><label for="admin">Grade 3</label>
                <input type="radio" id="admin" name="class" value="Grade 4"><label for="admin">Grade 4</label>
                <input type="radio" id="admin" name="class" value="Grade 5"><label for="admin">Grade 5</label>
                <input type="radio" id="admin" name="class" value="jss1"><label for="admin">jss1</label>
                <input type="radio" id="admin" name="class" value="jss2"><label for="admin">jss2</label>
                <input type="radio" id="admin" name="class" value="jss3"><label for="admin">jss3</label>
                <input type="radio" id="admin" name="class" value="ss1"><label for="admin">ss1</label>
                <input type="radio" id="admin" name="class" value="ss2"><label for="admin">ss2</label>
                <input type="radio" id="admin" name="class" value="ss3"><label for="admin">ss3</label>
                
                <button class="submit1" type="submit" name="submit">Submit</button>
				
            </div>
        </form>

        <footer class="footer">
            <div class="iner2">powered by: A4 Solutions and Services Limited . . .   Tel: 08185165911</div>
        </footer>
    </div>
</body> 
</html>