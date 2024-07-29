<!DOCTYPE html>
<!-- Coding by CodingNepal | www.codingnepalweb.com-->
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <title>Login and Registration Form in HTML & CSS | CodingLab</title>
  <link rel="stylesheet" href="css/login.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>
  <div class="container">
    <input type="checkbox" id="flip">
    <div class="forms">
      <div class="form-content">
        <div class="login-form">
          <div class="title">Login</div>
          <form action="/MINAMINKS2FINAL/actions/login_action.php" method="POST" id="loginForm">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" name="email" placeholder="Enter your email" pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Enter your password" pattern="(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}" required>
              </div>
              <div class="button input-box">
                <input type="submit" name="submit" value="Submit">
              </div>
              <div class="text sign-up-text">Don't have an account? <label for="flip"><a href="../login/register_view.php">Signup now</a></label></div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="../public/js/login.js"></script>
</body>
</html>
