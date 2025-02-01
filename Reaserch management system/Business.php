<?php
// Include your database connection file
include 'components/connect.php';

// Fetch data from the database
$query = "SELECT * FROM `business`"; // Replace with your actual table name
$stmt = $conn->prepare($query);
$stmt->execute();
$researchData = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>



<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Information system</title>
    <link rel="stylesheet" href="Business.css" />
    <style>
      .container1 {
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
      }
    </style>
  </head>
  <body>
    
    <!-- Header -->
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
      <h1 class="header">
        Department of <span class="highlight">Business Management</span>
      </h1>
      <p class="sub-header">
        Transforming Ideas into your Technology Knowledge
      </p>
      <p class="description">
        The Research Management System is a centralized platform designed to
        support and streamline research activities within the Department of
        Business Management.
      </p>

      <div class="button-container">
        <a href="#" class="button">Get Start Now</a>
        <a href="#" class="button">Learn More</a>
      </div>

      <div class="grid">
        <img src="img/Business.jpg" alt="Technology image" />
        <img src="img/Business.jpg" alt="Illustration" />
        <img src="img/H1.jpeg" alt="AI" />
      </div>
    </div>
    <div class="container1">
      <h1>Research </h1>
      <table>
        <thead>
          <tr>
            <th>Research Title</th>
            <th>Author Name</th>
            <th>Category & Department</th>
            <th>Abstract</th>
            <th>KeyWord</th>
            <th>File</th>
          </tr>
        </thead>
        <tbody>
          <?php
                // Display the uploaded PDF files and open links
                if (!empty($researchData)) {
                    foreach ($researchData as $row) {
                        $fileDestination = "admin/" . htmlspecialchars($row['File']); // Correct file path
                        $file_extension = pathinfo($fileDestination, PATHINFO_EXTENSION); // Get file extension

                        // Only show PDF files
                        if (strtolower($file_extension) === 'pdf') {
                            ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['ResearchTitle']); ?></td>
                                <td><?php echo htmlspecialchars($row['AuthorName']); ?></td>
                                <td><?php echo htmlspecialchars($row['Category']); ?></td>
                                <td><?php echo htmlspecialchars($row['Abstract']); ?></td>
                                <td><?php echo htmlspecialchars($row['KeyWord']); ?></td>

                                <td>
                                    <!-- Link to open the PDF in a new tab -->
                                    <a href="#" class="pdf-icon" onclick="viewPDF('<?php echo $fileDestination; ?>')">
                                        <i class="fas fa-file-pdf"></i> View PDF
                                    </a>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="6">No PDF files uploaded yet.</td>
                    </tr>
                    <?php
                }
            ?>
        </tbody>
      </table>
    </div>
        <!-- PDF.js Implementation for Viewing PDFs in Browser -->
    <div id="pdf-container" style="display:none;">
      <h2>PDF Viewer</h2>
      <canvas id="pdf-canvas"></canvas>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
    <script>
        function viewPDF(fileUrl) {
            // Hide the table and show the PDF viewer
            document.querySelector('.container1').style.display = 'none';
            document.getElementById('pdf-container').style.display = 'block';

            // Load the PDF using PDF.js
            pdfjsLib.getDocument(fileUrl).promise.then(function(pdf) {
                console.log("PDF loaded");

                // Get the first page
                pdf.getPage(1).then(function(page) {
                    var canvas = document.getElementById('pdf-canvas');
                    var context = canvas.getContext('2d');
                    var viewport = page.getViewport({ scale: 1.5 });
                    
                    // Set canvas size
                    canvas.height = viewport.height;
                    canvas.width = viewport.width;

                    // Render the page into the canvas
                    page.render({
                        canvasContext: context,
                        viewport: viewport
                    });
                });
            }).catch(function(error) {
                console.error("Error loading PDF: " + error);
            });
        }
    </script>
    <footer class="footer">
      <div class="footer-content">
        <p>&copy; 2025 Your Company Name. All Rights Reserved.</p>
        <p>
          <a href="/about">About</a> |
          <a href="/privacy-policy">Privacy Policy</a> |
          <a href="/contact">Contact</a>
        </p>
      </div>
    </footer>
  </body>
</html>
