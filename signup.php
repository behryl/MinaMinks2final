<!DOCTYPE html>
<!-- Coding by CodingNepal | www.codingnepalweb.com-->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mina Minks | Register</title>
    <!-- Link to your style.css file -->
    <link rel="stylesheet" href="css/login.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    
    <div class="container">
        <input type="checkbox" id="flip">
        <div class="forms">
            <div class="form-content">
                <div class="signup-form">
                    <div class="title">Signup</div>
                    <form action="actions/register_action.php" method="POST">
                        <div class="input-boxes">
                            <div class="input-box">
                                <i class="fas fa-user"></i>
                                <input type="text" name="firstname" placeholder="Enter your first name" pattern="\b([A-ZÀ-ÿ][-,a-z. ']+[ ]*)+" required>
                            </div>
                            <div class="input-box">
                                <i class="fas fa-user"></i>
                                <input type="text" name="lastname" placeholder="Enter your last name" pattern="\b([A-ZÀ-ÿ][-,a-z. ']+[ ]*)+" required>
                            </div>
                            <div class="input-box">
                                <i class="fas fa-envelope"></i>
                                <input type="text" name="email" placeholder="Enter your email" pattern="^\S+@\S+$" required>
                            </div>
                            <div class="input-box">
                                <i class="fas fa-phone"></i>
                                <input type="text" name="number" placeholder="Enter your phone number (must start with 0)" pattern="^0\d{9}$" required>
                            </div>
                            <div class="input-box">
                                <i class="fas fa-lock"></i>
                                <input type="password" name="password1" placeholder="Enter your password" pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$" required>
                            </div>
                            <div class="input-box">
                                <i class="fas fa-lock"></i>
                                <input type="password" name="password2" placeholder="Enter your password again" pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$" required>
                            </div>
                            <div class="button input-box">
                                <input type="submit" name="submit" value="Submit">
                            </div>
                            <div class="text sign-up-text">Already have an account? <label for="flip"> <a href="login.php">Login now</a></label></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const urlParams = new URLSearchParams(window.location.search);
            const msg = urlParams.get('msg');
            if (msg) {
                let icon = 'info';
                if (msg.includes('successfully')) {
                    icon = 'success';
                } else if (msg.includes('went wrong') || msg.includes('Passwords do not match')) {
                    icon = 'error';
                }
                Swal.fire({
                    title: 'Message',
                    text: msg,
                    icon: icon,
                    confirmButtonText: 'OK'
                });
            }
        });
    </script>
    <script src="../public/js/register.js"></script>
</body>

</html>
