
<?php

include "config/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST['task_name']);
    $description = $_POST['description'] ?? '';
    $skill = trim($_POST['required_skill'] ?? '');
    $complexity = $_POST['complexity'];
    $priority = $_POST['priority'];
    $hours = (int) $_POST['estimated_hours'];
    $deadline = $_POST['deadline'];

    $member = !empty($_POST['assigned_member'])
        ? (int) $_POST['assigned_member']
        : null;

    $stmt = $conn->prepare(
        "INSERT INTO tasks
        (task_name, description, required_skill, complexity,
        priority, estimated_hours, deadline, assigned_member)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)"
    );

    $stmt->bind_param(
        "sssssisi",
        $name,
        $description,
        $skill,
        $complexity,
        $priority,
        $hours,
        $deadline,
        $member
    );

    if ($stmt->execute()) {
        echo "<script>
            alert('Task saved successfully!');
            window.location.href='pages/tasks.php';
        </script>";
    } else {
        echo "Error saving task: " . htmlspecialchars($stmt->error);
    }

    $stmt->close();
}

$conn->close();

?>

