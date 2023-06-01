<script>

<?php 
session_start();

  $_SESSION;
  include("connection.php");
  include("functions.php");

  $error_password = "";
  $error_invalid = "";
  $error_already = "";
  $Success = "";

  $user_data = check_login($con);
  if ($_SERVER['REQUEST_METHOD'] == "POST")
  {

    $section = $_POST["section"];


    if ($section === "login") 
    {
      $user_name = $_POST['user_name'];
      $password = $_POST['password'];
      if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		  {
			  //read from database
			  $query = "select * from users where user_name = '$user_name' limit 1";
			  $result = mysqli_query($con, $query);
        
			  if($result)
			  {
				  if($result && mysqli_num_rows($result) > 0)
				  {
					  $user_data = mysqli_fetch_assoc($result);

					  if($user_data['password'] === $password)
					  {
						  $_SESSION['user_id'] = $user_data['user_id'];
              // Send to other file Welcome
						  header("Location: welcome.php");
					  }
            else
            {
              $error_password = "Incorrect input! Please try again."; //Wrong password
            }
				  }
			  }

        $error_password = "wrong username or password!";
			
		  }
      else
		  {
			  $error_password = "wrong username or password!";
		  }
    } 

      
    else if($section === "signin")
    {
      $user_name = $_POST['user_name'];
      $password = $_POST['password'];

      //Must have different name
      $query = "SELECT * FROM users WHERE user_name = '$user_name'";
      $result = mysqli_query($con, $query);

      if ($result && mysqli_num_rows($result) > 0) 
      {
        $error_already = "Incorrect input! Please try again."; //Already
      }
      else
      {
        if(!empty($user_name) && !empty($password) && !is_numeric($user_name) )
        {
          $user_id = rand_num(20);
          $query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";

          mysqli_query($con, $query);
          $Success = "yes";
        }
        else
        {
          $error_invalid = "Incorrect input! Please try again."; //Valid
        }
      }
    }
  }

?>

</script>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="Layout.css">
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
          <div class="LoginSystem">

            <div class="blueBg">

              <div class="box signin">
                <h2>Already Have an Account?</h2>
                <button class="signinBtn">Sign in</button>
              </div>

              <div class="box signup">
                <h2>Don't Have an Account?</h2>
                <button class="signupBtn">Sign up</button>
              </div>

            </div>

            <div class="formBx">
              <div class="form signinform">

                <form method="post">
                  <h3>Sign In</h3>
                  <input type="text" name="user_name" placeholder="Username">
                  <input type="password" name="password" placeholder="Password">
                  <input type="hidden" name="section" value="signin">
                  <!-- The login button -->
                  <input type="submit" value="Login">
                  <?php if (!empty($error_already)) : ?>
                    <p class="already">Someone already chose this username!</p>
                  <?php endif; ?>
                  <?php if (!empty($error_invalid)) : ?>
                    <p class="invalid">Please enter some valid information!</p>
                  <?php endif; ?>
                  <?php if (!empty($Success)) : ?>
                    <p class="success">Successfully Registered!</p>
                  <?php endif; ?>
                </form>

              </div>
              <div class="form signupform">

                <form method="post">
                  <h3>Sign Up</h3>
                  <input type="text" name="user_name" placeholder="Username">
                  <input type="password" name="password" placeholder="Password">
                  <input type="hidden" name="section" value="login">
                  <!-- The login button -->
                  <input type="submit" value="Register">
                  <?php if (!empty($error_password)) : ?>
                    <p class="wrong">Wrong username or password!</p>
                  <?php endif; ?>
                </form>
                
              </div>
            </div>

          </div>
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
  <script src="script.js"></script>
</body>
</html>