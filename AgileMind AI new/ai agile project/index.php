
<?php
include "config/db.php";

// Get dashboard statistics
$totalQuery = $conn->query("SELECT COUNT(*) AS total FROM tasks");
$totalTasks = $totalQuery->fetch_assoc()['total'];

$completedQuery = $conn->query(
    "SELECT COUNT(*) AS total FROM tasks WHERE status='Completed'"
);
$completedTasks = $completedQuery->fetch_assoc()['total'];

$pendingQuery = $conn->query(
    "SELECT COUNT(*) AS total FROM tasks WHERE status='Pending'"
);
$pendingTasks = $pendingQuery->fetch_assoc()['total'];

$memberQuery = $conn->query("SELECT COUNT(*) AS total FROM members");
$totalMembers = $memberQuery->fetch_assoc()['total'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Smart Agile Project Management</title>

    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">

        <h2>Agile ML</h2>

        <a href="index.php">Dashboard</a>
        <a href="pages/tasks.php">Manage Tasks</a>
        <a href="pages/members.php">Team Members</a>
        <a href="pages/predictions.php">ML Predictions</a>

    </div>

    <!-- Main Dashboard -->
    <div class="main">

        <h1>Smart Agile Project Management</h1>

        <p>AI-Based Task Assignment and Deadline Prediction</p>

        <!-- Statistics Cards -->
        <div class="cards">

            <div class="card">
                <h3>Total Tasks</h3>
                <h2><?php echo $totalTasks; ?></h2>
            </div>

            <div class="card">
                <h3>Completed Tasks</h3>
                <h2><?php echo $completedTasks; ?></h2>
            </div>

            <div class="card">
                <h3>Pending Tasks</h3>
                <h2><?php echo $pendingTasks; ?></h2>
            </div>

            <div class="card">
                <h3>Team Members</h3>
                <h2><?php echo $totalMembers; ?></h2>
            </div>

        </div>

        <!-- Project Overview -->
        <h2>Project Overview</h2>

        <p>
            Welcome to your Smart Agile Project Management System.
            Manage team tasks, monitor workloads and predict deadlines
            using Machine Learning.
        </p>

        <a href="pages/tasks.php" class="btn">
            Create New Task
        </a>

        <a href="pages/predictions.php" class="btn">
            View ML Predictions
        </a>

    </div>

</body>
</html>
