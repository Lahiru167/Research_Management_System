<?php
// Include your database connection file
include 'components/connect.php';

// Fetch data from the database
$query = "SELECT * FROM `info`"; // Adjust the table name accordingly
$stmt = $conn->prepare($query);
$stmt->execute();
$researchData = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Research Submissions</title>
    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }

      body {
        font-family: Arial, sans-serif;
        line-height: 1.6;
        color: #333;
        background: linear-gradient(280deg, #130627 40%, #000000 80%);
      }

      .main-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 20px;
        background: #459c98;
        color: #fff;
      }

      .navbar ul {
        list-style: none;
        display: flex;
      }

      .navbar ul li {
        margin: 0 10px;
      }

      .navbar ul li a {
        color: #fff;
        text-decoration: none;
        font-weight: bold;
      }

      .container {
        max-width: 1200px;
        margin: 20px auto;
        padding: 50px;
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      }

      h1 {
        text-align: center;
        color: #333;
      }

      table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
      }

      table th,
      table td {
        padding: 12px;
        text-align: left;
        border: 1px solid #ddd;
      }

      table th {
        background-color: #257cfe;
        color: white;
      }

      table tr:nth-child(even) {
        background-color: #f2f2f2;
      }

      .file-name {
        color: #333;
        pointer-events: none; /* Disable click event for the file name */
      }

      /* Prevent copying of content */
      table, table * {
        user-select: none;
      }

      table td {
        color: #000;
      }
    </style>
  </head>
  <body>
    <header class="main-header">
      <div class="logo">
        <img src="img/Logo.png" alt="University Logo" />
      </div>
      <nav class="navbar">
        <ul>
          <li><a href="home.php">Home</a></li>
          <li><a href="Department.php">Departments</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="contact.php">Contact</a></li>
          <li><a href="Event.php">Event</a></li>
        </ul>
      </nav>
      <button class="login-btn"><a href="Login.php">Login</a></button>
    </header>

    <div class="container">
      <h1>Research Submissions</h1>
      <table>
        <thead>
          <tr>
            <th>Research Title</th>
            <th>Author Name</th>
            <th>Category</th>
            <th>Abstract</th>
            <th>Keyword</th>
            <th>File</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($researchData as $row) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($row['ResearchTitle']) . '</td>';
            echo '<td>' . htmlspecialchars($row['AuthorName']) . '</td>';
            echo '<td>' . htmlspecialchars($row['Category']) . '</td>';
            echo '<td>' . htmlspecialchars($row['Abstract']) . '</td>';
            echo '<td>' . htmlspecialchars($row['KeyWord']) . '</td>';
            echo '<td class="file-name">' . htmlspecialchars($row['File']) . '</td>'; // Display only file name
            echo '</tr>';
          }
          ?>
        </tbody>
      </table>
    </div>

    <footer class="footer">
      <div class="footer-content">
        <p>&copy; 2025 Your Company Name. All Rights Reserved.</p>
      </div>
    </footer>
  </body>
</html>
