<?php
// Start session to track user login status
session_start();

include 'components/connect.php'; // Include the database connection file

if (isset($_POST['submit'])) {
    // Sanitize and fetch the input values from the form
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    // Check if the email and password fields are not empty
    if (empty($email) || empty($password)) {
        $message[] = 'Please fill in all fields.';
    } else {
        // Query the database to check if the user exists
        $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
        $select_user->execute([$email]);
        $row = $select_user->fetch(PDO::FETCH_ASSOC);

        // If the user exists and the password matches
        if ($select_user->rowCount() > 0 && password_verify($password, $row['password'])) {
            // Set session variable to track logged-in user
            $_SESSION['user_id'] = $row['id'];
            header("Location: home.php");  // Redirect to home.php after login
            exit;
        } else {
            $message[] = 'Invalid email or password.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="style.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />
</head>
<body>
    <div class="container">
        <div class="image-section">
            <img src="img/Login.png" alt="Login Image" />
        </div>
        <div class="form-section">
            <h1>Login</h1>

            <?php
                // Display error messages (if any)
                if (isset($message)) {
                    foreach ($message as $msg) {
                        echo '<div class="message">' . $msg . '</div>';
                    }
                }
            ?>

            <form action="" method="post" id="login-form">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required />
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required />
                </div>
                <div class="extra-links">
                    <a href="#">Forgot Password?</a>
                </div>
                <button type="submit" name="submit" class="login-btn">Login</button>
                <div class="link">
                    <a href="Signup.php">Don't have an account? Create an account</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
