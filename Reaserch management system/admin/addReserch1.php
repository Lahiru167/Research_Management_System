<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Research</title>
    <style>
        /* Basic Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        /* Navbar Styles */
        .navbar {
            background-color: #333;
            color: white;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar h1 {
            margin: 0;
            font-size: 1.5rem;
        }

        .nav-links {
            display: flex;
            align-items: center;
        }

        .nav-links a {
            color: white;
            margin-left: 20px;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 5px;
            background-color: #007bff;
        }

        .nav-links a:hover {
            background-color: #0056b3;
        }

        /* Main Content */
        .container {
            max-width: 800px;
            margin: 50px auto;
            background: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        /* Form Styles */
        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: bold;
            margin: 10px 0 5px;
        }

        input, textarea, select {
            padding: 10px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
        }

        button {
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            font-size: 1rem;
            cursor: pointer;
            margin-top: 20px;
        }

        button:hover {
            background-color: #0056b3;
        }

        .research-list {
            margin-top: 30px;
            border-top: 1px solid #ccc;
            padding-top: 20px;
        }

        .research-item {
            display: flex;
            justify-content: space-between;
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }

        .btn {
            background-color: #f39c12;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-update {
            background-color: #27ae60;
        }

        .btn-delete {
            background-color: #e74c3c;
        }
    </style>
</head>
<body>

    <!-- Navbar with Links -->
    <div class="navbar">
        <h1>Dashboard</h1>
        <div class="nav-links">
           <!-- Bank Button -->
            <a href="dashboard.php">Dashboard</a>
            
        </div>
    </div>

    <div class="container">
        <h2>Add/Update Research</h2>

        <?php
        include '../components/connect.php'; // Ensure this file exists and contains the database connection details

        session_start();

        // Insert or Update research
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file'])) {
            $file = $_FILES['file'];
            $fileName = $_FILES['file']['name'];
            $fileTmpName = $_FILES['file']['tmp_name'];
            $fileError = $_FILES['file']['error'];
            $fileSize = $_FILES['file']['size'];

            // Check if 'uploads/' directory exists
            if (!file_exists('uploads/')) {
                mkdir('uploads/', 0777, true); // Create the directory if it doesn't exist
            }

            if ($fileError === 0) {
                if ($fileSize < 5000000) {
                    $fileNewName = uniqid('', true) . "." . strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
                    $fileDestination = 'uploads/' . $fileNewName;

                    if (move_uploaded_file($fileTmpName, $fileDestination)) {
                        // Check if we're adding or updating the record
                        if (isset($_GET['update_id'])) {
                            // Update existing record
                            $updateId = $_GET['update_id'];
                            $sql = "UPDATE business 
                                    SET `ResearchTitle` = :title, `AuthorName` = :author, `Category` = :category, 
                                        `Abstract` = :abstract, `KeyWord` = :keyword, `File` = :fileDestination
                                    WHERE `id` = :id";

                            try {
                                $stmt = $conn->prepare($sql);
                                $stmt->bindParam(':title', $_POST['title']);
                                $stmt->bindParam(':author', $_POST['author']);
                                $stmt->bindParam(':category', $_POST['category']);
                                $stmt->bindParam(':abstract', $_POST['abstract']);
                                $stmt->bindParam(':keyword', $_POST['keyword']);
                                $stmt->bindParam(':fileDestination', $fileDestination);
                                $stmt->bindParam(':id', $updateId, PDO::PARAM_INT);
                                $stmt->execute();
                                echo "<p style='color: green;'>Research updated successfully!</p>";
                            } catch (PDOException $e) {
                                echo "<p style='color: red;'>Error updating research: " . $e->getMessage() . "</p>";
                            }
                        } else {
                            // Insert new record
                            $sql = "INSERT INTO business (`ResearchTitle`, `AuthorName`, `Category`, `Abstract`, `KeyWord`, `File`) 
                                    VALUES (:title, :author, :category, :abstract, :keyword, :fileDestination)";

                            try {
                                $stmt = $conn->prepare($sql);
                                $stmt->bindParam(':title', $_POST['title']);
                                $stmt->bindParam(':author', $_POST['author']);
                                $stmt->bindParam(':category', $_POST['category']);
                                $stmt->bindParam(':abstract', $_POST['abstract']);
                                $stmt->bindParam(':keyword', $_POST['keyword']);
                                $stmt->bindParam(':fileDestination', $fileDestination);

                                $stmt->execute();
                                echo "<p style='color: green;'>Research added successfully!</p>";
                            } catch (PDOException $e) {
                                echo "<p style='color: red;'>Error adding research: " . $e->getMessage() . "</p>";
                            }
                        }
                    } else {
                        echo "<p style='color: red;'>Error uploading the file!</p>";
                    }
                } else {
                    echo "<p style='color: red;'>File size exceeds the 5MB limit!</p>";
                }
            } else {
                echo "<p style='color: red;'>There was an error with the file!</p>";
            }
        }

        // Fetch research data for update
        if (isset($_GET['update_id'])) {
            $updateId = $_GET['update_id'];
            $selectQuery = "SELECT * FROM business WHERE id = :id";
            $stmt = $conn->prepare($selectQuery);
            $stmt->bindParam(':id', $updateId, PDO::PARAM_INT);
            $stmt->execute();
            $research = $stmt->fetch(PDO::FETCH_ASSOC);
        }

        // Handle delete request
        if (isset($_GET['delete_id'])) {
            $deleteId = $_GET['delete_id'];
            $deleteQuery = "DELETE FROM business WHERE id = :id";
            try {
                $stmt = $conn->prepare($deleteQuery);
                $stmt->bindParam(':id', $deleteId, PDO::PARAM_INT);
                $stmt->execute();
                echo "<p style='color: green;'>Research deleted successfully!</p>";
            } catch (PDOException $e) {
                echo "<p style='color: red;'>Error deleting research: " . $e->getMessage() . "</p>";
            }
        }
        ?>

        <form action="" method="post" enctype="multipart/form-data">
            <label for="title">Research Title</label>
            <input type="text" id="title" name="title" placeholder="Enter research title" required value="<?php echo isset($research) ? $research['ResearchTitle'] : ''; ?>">

            <label for="author">Author Name</label>
            <input type="text" id="author" name="author" placeholder="Enter author name" required value="<?php echo isset($research) ? $research['AuthorName'] : ''; ?>">

            <label for="category">Category</label>
            <select id="category" name="category" required>
                <option value="">--Select Category--</option>
                <option value="information" <?php echo isset($research) && $research['Category'] == 'information' ? 'selected' : ''; ?>>Information System</option>
                <option value="Bussince" <?php echo isset($research) && $research['Category'] == 'Bussince' ? 'selected' : ''; ?>>Business Management</option>
                <option value="hr" <?php echo isset($research) && $research['Category'] == 'hr' ? 'selected' : ''; ?>>Human Resource Management</option>
                <option value="education" <?php echo isset($research) && $research['Category'] == 'education' ? 'selected' : ''; ?>>Accounting and Finance</option>
                <option value="tourism" <?php echo isset($research) && $research['Category'] == 'tourism' ? 'selected' : ''; ?>>Tourism Hospitality Management</option>
                <option value="marketing" <?php echo isset($research) && $research['Category'] == 'marketing' ? 'selected' : ''; ?>>Marketing Management</option>
            </select>

            <label for="abstract">Abstract</label>
            <textarea id="abstract" name="abstract" rows="5" placeholder="Enter research abstract" required><?php echo isset($research) ? $research['Abstract'] : ''; ?></textarea>

            <label for="keyword">Key Word</label>
            <input type="text" id="keyword" name="keyword" placeholder="Enter research keyword" required value="<?php echo isset($research) ? $research['KeyWord'] : ''; ?>">

            <label for="file">Upload File</label>
            <input type="file" id="file" name="file" <?php echo isset($research) ? '' : 'required'; ?>>

            <button type="submit"><?php echo isset($research) ? 'Update Research' : 'Add Research'; ?></button>
        </form>

        <div class="research-list">
            <h2>All Research</h2>
            <?php
            // Fetch all research records
            $query = "SELECT * FROM business";
            $stmt = $conn->query($query);
            while ($research = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<div class='research-item'>
                        <div>" . $research['ResearchTitle'] . " by " . $research['AuthorName'] . "</div>
                        <div>
                            <a href='?update_id=" . $research['id'] . "' class='btn btn-update'>Update</a>
                            <a href='?delete_id=" . $research['id'] . "' class='btn btn-delete'>Delete</a>
                        </div>
                    </div>";
            }
            ?>
        </div>
    </div>
</body>
</html>
