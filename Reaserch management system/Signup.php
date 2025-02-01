<?php
include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

if(isset($_POST['submit'])){

   // Sanitize and fetch the form data
   $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
   $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
   $pass = $_POST['pass'];
   $cpass = $_POST['cpass'];

   // Validate password match
   if ($pass !== $cpass) {
      $message[] = 'Passwords do not match!';
   } else {
      // Hash password securely
      $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

      // Check if the email already exists in the database
      $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
      $select_user->execute([$email]);
      $row = $select_user->fetch(PDO::FETCH_ASSOC);

      if ($select_user->rowCount() > 0) {
         $message[] = 'Email already exists!';
      } else {
         // Insert new user into the database
         $insert_user = $conn->prepare("INSERT INTO `users` (name, email, password) VALUES (?, ?, ?)");
         $insert_user->execute([$name, $email, $hashed_pass]);
         $message[] = 'Registered successfully, please login now!';
      }
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign Up Page</title>
    <link rel="stylesheet" href="signUp.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />
</head>
<body>
    <div class="container">
        <div class="signup-box">
            <h2 class="signup-title">Sign <span>Up</span></h2>
            
            <?php
                // Display any messages (like errors or success messages)
                if (isset($message)) {
                    foreach ($message as $msg) {
                        echo '<div class="message">' . $msg . '</div>';
                    }
                }
            ?>
            
            <form action="" method="post">
                <div class="input-field">
                    <label>Full Name</label>
                    <input type="text" name="name" placeholder="Enter your full name" required />
                </div>
                <div class="input-field">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="Enter your email" required />
                    <span class="icon">✉️</span>
                </div>
                <div class="input-field">
                    <label>Password</label>
                    <input type="password" id="password" name="pass" placeholder="Enter your password" required />
                    <span class="eye-icon" onclick="togglePassword('password')">👁️</span>
                </div>
                <div class="input-field">
                    <label>Confirm Password</label>
                    <input type="password" id="confirmPassword" name="cpass" placeholder="Confirm your password" required />
                    <span class="eye-icon" onclick="togglePassword('confirmPassword')">👁️</span>
                </div>
                <button type="submit" name="submit" class="signup-btn">Sign Up</button>
                <p class="login-text">
                    Already have an account? <a href="Login.php">Login</a>
                </p>
            </form>
        </div>

        <div class="image-box">
            <!-- Placeholder for futuristic AI image -->
            <img src="img/Login.png" alt="logo" />
        </div>
    </div>

    <script>
        // Function to toggle password visibility
        function togglePassword(id) {
            const passwordField = document.getElementById(id);
            const type = passwordField.type === 'password' ? 'text' : 'password';
            passwordField.type = type;
        }
    </script>
</body>
</html>
