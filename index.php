<?php 
session_start();

  $_SESSION;
?>

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
          <!--Login and History-->
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
              <button class="button operator">AC</button>
              <button class="button operator">DEL</button>
              <button class="button operator">%</button>
              <button class="button operator">/</button>
            </div>
            <div>
              <button class="button">7</button>
              <button class="button">8</button>
              <button class="button">9</button>
              <button class="button operator">*</button>
            </div>
            <div>
              <button class="button">4</button>
              <button class="button">5</button>
              <button class="button">6</button>
              <button class="button operator">-</button>
            </div>
            <div>
              <button class="button">1</button>
              <button class="button">2</button>
              <button class="button">3</button>
              <button class="button operator">+</button>
            </div>
            <div>
              <button class="button">00</button>
              <button class="button">0</button>
              <button class="button">.</button>
              <button class="button equalBtn">=</button>
            </div>
          </div>
        </div>

        <div class="Others">
          <!--Other Operations-->
            <h2>Other operations</h2>
        </div>

      </div>

    </div>
  </div>
  <script src="script.js"></script>
</body>
</html>