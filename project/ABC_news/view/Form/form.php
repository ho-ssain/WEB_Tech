<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="form.css">
  <title>Document</title>
</head>


<body>
  <div class="container" id="container">
    <!------------------------------------------------------------------------------------------------->
    <div class="form-container sign-up-container">
		  <form action="../../controller/dataVal.php" method="POST">
			  <h1>Create Account</h1>
			  <div class="social-container">
				  <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				  <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				  <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			  </div>
        <span>or use your email for registration</span>
        <input type="text" name="u_name" placeholder="User Name">
			  <input type="email" name="email" placeholder="Email" />
			  <input type="password" name="password" placeholder="Password" />
        <input type="password" name="cpassword" placeholder="Confirm Password" >
			  <button type="submit" name="submit">Sign Up</button>
		  </form>
	</div>

	  <div class="form-container sign-in-container">
		  <form action="../../controller/logVal.php" method="POST">
			  <h1>Sign in</h1>
			  <div class="social-container">
				  <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				  <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				  <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			  </div>
        <span>or use your account</span>
			  <input type="email" name="email" placeholder="Email" />
			  <input type="password" name="password" placeholder="Password" />
			  <a href="#">Forgot your password?</a>
			  <button type="submit" name="submit" id="login">Sign In</button>
		  </form>
	  </div>

	  <div class="overlay-container">
		  <div class="overlay">
			  <div class="overlay-panel overlay-left">
				  <h3>To keep connected with us please login</h3>
				  <button class="ghost" id="signIn">Sign In</button>
			  </div>
			  <div class="overlay-panel overlay-right">
				  <h3>
				  Don’t have an account? <br>
          Create Now and start journey with us 
          </h3>
				  <button class="ghost" id="signUp">Sign Up</button>
			  </div>
		  </div>
	  </div>
  <!----------------------------------------------------------------------------------------------------->
  </div>


  <script
			  src="https://code.jquery.com/jquery-3.6.0.min.js"
			  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
			  crossorigin="anonymous"></script>
  <script src="form.js"></script>
  <script src="ajax.js"></script>
</body>
</html>

