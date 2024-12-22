<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize input data to prevent SQL injection
    $taskname = mysqli_real_escape_string($conn, $_POST['task-name']);
    $taskdesc = mysqli_real_escape_string($conn, $_POST['task-desc']);
    
    $tododate = mysqli_real_escape_string($conn, $_POST['due-date']);
    $taskdone = "0"; // Assuming tasks are not done initially
    $taskpriostr = mysqli_real_escape_string($conn, $_POST['task-priority']);
    $taskprio = 0;
    if($taskpriostr === "low"){
        $taskprio = 2;
    }
    if($taskpriostr === "medium"){
        $taskprio = 1;
    }
    if($taskpriostr === "high"){
        $taskprio = 0;
    }
    echo $taskpriostr;
    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO task (title, description, done, datetodo, priority) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $taskname, $taskdesc, $taskdone, $tododate, $taskprio);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Task submitted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/todoListManager/styles/global.css?id=<?php echo time(); ?>">
    <link rel="stylesheet" href="/todoListManager/styles/taskInput.css?id=<?php echo time(); ?>">

    <title>Form Page</title>
</head>
<body>
    <header>
        <div class="logo">
            <img src="/todoListManager/images/game-controller.png" alt="Logo">
            <p class="description">Gaming Task Manager</p>
        </div>  
        <div class="header-buttons">
        <button class="btn" onclick="location.href='/todoListManager/pages/login.php';">Login</button>
            <button class="btn" onclick="location.href='/todoListManager/pages/register.php';">Register</button>
            <button class="btn" onclick="location.href='/todoListManager/index.php';">Home</button>
        </div>
    </header>

    <main>
        <form class="task-form" action="/todoListManager/pages/taskInput.php" method="POST">
            <h1>Task Submission Form</h1>
            <label for="task-name">Task Name:</label>
            <input type="text" id="task-name" name="task-name" placeholder="Enter task name" required>

            <label for="task-desc">Description:</label>
            <textarea id="task-desc" name="task-desc" placeholder="Enter task description" required></textarea>

            <label for="task-priority">Priority:</label>
            <select id="task-priority" name="task-priority">
                <option value="low">Low</option>
                <option value="medium">Medium</option>
                <option value="high">High</option>
            </select>

            <label for="due-date">Due Date:</label>
            <input type="date" id="due-date" name="due-date" required>

            <button type="submit" class="btn submit">Submit Task</button>
        </form>
    </main>
    
</body>
</html>

<footer>
    <div class="footer-content">
        <p>&copy; 2024 Gaming Task Manager. All Rights Reserved.</p>
        <nav class="footer-nav">
            <a href="#">Privacy Policy</a>
            <a href="#">Terms of Service</a>
            <a href="#">Contact Us</a>
        </nav>
    </div>
</footer>
