<?php
// Include the database connection file
include 'components/connect.php';

// Start the session to get the logged-in user's details
session_start();

// Assuming the user is logged in and their ID is stored in session
$user_id = $_SESSION['user_id']; 

// Fetch user data from the database
$query = "SELECT * FROM users WHERE id = :user_id";  // Replace 'users' with your actual table name
$stmt = $conn->prepare($query);
$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$stmt->execute();
$userData = $stmt->fetch(PDO::FETCH_ASSOC);

// Check if user exists
if (!$userData) {
    echo "User not found.";
    exit;
}

// Fetch the user details (name, email, and image)
$user_name = $userData['name'];
$user_email = $userData['email'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        /* General body and layout */
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(280deg, #130627 40%, #000000 80%);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Profile container */
        .profile-container {
            width: 100%;
            max-width: 600px;
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        /* Profile title */
        h1 {
            font-size: 30px;
            color: #333;
            margin-bottom: 20px;
        }

        /* Profile description */
        .profile-description {
            font-size: 18px;
            color: #666;
            margin-bottom: 20px;
        }

        /* Buttons */
        .btn {
            display: inline-block;
            background-color: #257cfe;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            text-decoration: none;
            margin-bottom: 10px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #1a64c7;
        }

        /* Logout button */
        .logout-btn {
            background-color: #f44336;
        }

        /* Flexbox for buttons */
        .btn-container {
            display: flex;
            justify-content: center;
            gap: 15px;
        }
    </style>
</head>
<body>

    <!-- Profile Page Container -->
    <div class="profile-container">
        <h1>Welcome, <?php echo htmlspecialchars($user_name); ?></h1>

        <div class="profile-description">
            <p>Email: <?php echo htmlspecialchars($user_email); ?></p>
        </div>

        <!-- Buttons Container -->
        <div class="btn-container">
            <a href="Signup.php" class="btn">Register</a>
            <a href="Login.php" class="btn">Login</a>
            <a href="components/user_logout.php" class="btn logout-btn" onclick="return confirm('Are you sure you want to logout?');">Logout</a>
        </div>
    </div>

</body>
</html>

<?php
// Close the database connection

?>
