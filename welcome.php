<?php 
session_start();

	include("connection.php");
	include("functions.php");
	$_SESSION;

	$user_data = check_login($con);

if ($_SERVER['REQUEST_METHOD'] == "POST")
{

	$operation = $_POST['operation'];
	$result = $_POST['result'];

	$user_data['operation'] = $operation;
	$user_data['result'] = $result;
	

	$escapedOperation = mysqli_real_escape_string($con, $operation);
	$escapedResult = mysqli_real_escape_string($con, $result);

	$query = "UPDATE users SET operation = '$escapedOperation', result = '$escapedResult' WHERE user_id = '{$user_data['user_id']}'";

	mysqli_query($con, $query);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="Welcome.css">
  <title>Maths mania</title>
</head>
<body>
  <div class="container">
    <div class="tabs">
      <input id="web" type="radio" name="slider" checked>
      <input id="graphics" type="radio" name="slider">
      <input id="photography" type="radio" name="slider">
      <div class="buttons">
        <label for="web"></label>
        <label for="graphics"></label>
        <label for="photography"></label>
      </div>

      <div class="content">

        <div class="Login">
					<a href="logout.php">Logout</a>

					<br>
					<h1> Welcome, <span style="color: red;"> <?php echo $user_data['user_name']; ?> </span> ! </h1>
					<br>
					<p> Your previous operation is : <span style="color: red;"> <?php echo $user_data['operation']; ?> </span> </p>
					<br>
					<p> Your previous result is : <span style="color: red;"> <?php echo $user_data['result']; ?> </span> </p>
				</div>

        <div class="Calculator-Section">
          <div class="bubbles">
            <span style="--i:11;"></span>
            <span style="--i:12;"></span>
            <span style="--i:24;"></span>
            <span style="--i:10;"></span>
            <span style="--i:14;"></span>
            <span style="--i:23"></span>
            <span style="--i:18;"></span>
            <span style="--i:16;"></span>
            <span style="--i:19;"></span>
            <span style="--i:20;"></span>
            <span style="--i:22;"></span>
            <span style="--i:25;"></span>
            <span style="--i:18;"></span>
            <span style="--i:21;"></span>
            <span style="--i:15;"></span>
            <span style="--i:13;"></span>
            <span style="--i:26;"></span>
            <span style="--i:17;"></span>
            <span style="--i:13;"></span>
            <span style="--i:28;"></span>
          </div>
          <div class="Calculator">
          <!--Calculator-->
            <input type="text" id="calc" placeholder="0">
            <div> 
              <button class="button operator">(</button>
              <button class="button operator">AC</button>
              <button class="button operator">DEL</button>
              <button class="button operator">%</button>
              <button class="button operator">/</button>
            </div>
            <div>
              <button class="button operator">)</button>
              <button class="button">7</button>
              <button class="button">8</button>
              <button class="button">9</button>
              <button class="button operator">*</button>
            </div>
            <div>
              <button class="button operator">√</button>
              <button class="button">4</button>
              <button class="button">5</button>
              <button class="button">6</button>
              <button class="button operator">-</button>
            </div>
            <div>
              <button class="button operator">ln</button>
              <button class="button">1</button>
              <button class="button">2</button>
              <button class="button">3</button>
              <button class="button operator">+</button>
            </div>
            <div>
              <button class="button operator">π</button>
              <button class="button">00</button>
              <button class="button">0</button>
              <button class="button">.</button>
              <button class="button equalBtn">=</button>
            </div>
          </div>
        </div>

        <div class="Others">
          <!--Other Operations-->
          <!--<h1>Math.js API Example</h1>-->
          <h1>Calculate an expression</h1>
          <br>
          <br>
          <div class="box">
            <input type="text" id="exp" placeholder="input expression">
            <button type="submit "id="calculateBtn">Calculate</button>
          </div>
            <br><br>
            <div id="result"></div>
        </div>

      </div>

    </div>
  </div>
  <script src="welcome.js"></script>
</body>
</html>