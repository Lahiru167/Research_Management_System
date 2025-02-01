<?php
// Database connection
include '../components/connect.php';

// Handle Add Event
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'add') {
    $name = $_POST['name'];
    $date = $_POST['date'];

    // Insert event into the database
    $sql = "INSERT INTO event (name, date) VALUES ('$name', '$date')";
    if ($conn->query($sql) === TRUE) {
        echo "New event added successfully";
    } else {
        
    }
}

// Handle Update Event
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'update') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $date = $_POST['date'];

    // Update event in the database
    $sql = "UPDATE event SET name = '$name', date = '$date' WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        echo "Event updated successfully";
    } else {
       
    }
}

// Handle Delete Event
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];

    // Delete event from the database
    $sql = "DELETE FROM event WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        echo "Event deleted successfully";
    } else {
        
    }
}

// Fetch all events
$sql = "SELECT * FROM event";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Event Management</title>
    <style>
        /* General Styling */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            padding: 20px;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        header {
            text-align: center;
            margin-bottom: 30px;
        }

        h1 {
            font-size: 2rem;
            color: #257cfe;
        }

        h2 {
            margin-bottom: 10px;
        }

        /* Form Section */
        .form-section {
            margin-bottom: 40px;
        }

        form {
            display: grid;
            gap: 15px;
        }

        label {
            font-weight: bold;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        button {
            background-color: #257cfe;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #1a64c7;
        }

        /* Event List Section */
        .event-list table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
            text-align: left;
            padding: 10px;
        }

        th {
            background-color: #257cfe;
            color: white;
        }

        td {
            background-color: #f9f9f9;
        }

        .action-btn {
            background-color: #28a745;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .delete-btn {
            background-color: #dc3545;
        }

        .action-btn:hover, .delete-btn:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Event Management Dashboard</h1>
        </header>

        <!-- Add Event Form -->
        <section class="form-section">
            <h2>Add New Event</h2>
            <form method="POST">
                <input type="hidden" name="action" value="add">
                <label for="name">Event Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="date">Event Date:</label>
                <input type="date" id="date" name="date" required>

                <button type="submit">Add Event</button>
            </form>
        </section>

        <!-- Event List -->
        <section class="event-list">
            <h2>Events</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['date']; ?></td>
                            <td>
                                <a href="index.php?update_id=<?php echo $row['id']; ?>" class="action-btn">Update</a>
                                <a href="index.php?delete_id=<?php echo $row['id']; ?>" class="action-btn delete-btn">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </section>
    </div>
</body>
</html>


