
<?php
include "../config/db.php";

$members = $conn->query("SELECT id, name FROM members ORDER BY name");

$tasks = $conn->query(
    "SELECT tasks.*, members.name AS member_name
     FROM tasks
     LEFT JOIN members ON tasks.assigned_member = members.id
     ORDER BY tasks.id DESC"
);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Task Management</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="main">

    <h1>Task Management</h1>
    <p>Create and manage your project tasks.</p>

    <?php if (isset($_GET['success'])) { ?>
        <p style="color:green;">Task saved successfully!</p>
    <?php } ?>

    <div class="card">
        <h2>Create New Task</h2>

        <form action="../save_task.php" method="POST">

            <label>Task Name</label><br>
            <input type="text" name="task_name" required><br><br>

            <label>Description</label><br>
            <textarea name="description"></textarea><br><br>

            <label>Required Skill</label><br>
            <input type="text" name="required_skill"
                   placeholder="HTML, PHP, Python"><br><br>

            <label>Complexity</label><br>
            <select name="complexity" required>
                <option value="Easy">Easy</option>
                <option value="Medium">Medium</option>
                <option value="Hard">Hard</option>
            </select><br><br>

            <label>Priority</label><br>
            <select name="priority" required>
                <option value="Low">Low</option>
                <option value="Medium">Medium</option>
                <option value="High">High</option>
            </select><br><br>

            <label>Estimated Hours</label><br>
            <input type="number" name="estimated_hours"
                   min="1" required><br><br>

            <label>Deadline</label><br>
            <input type="date" name="deadline" required><br><br>

            <label>Assign Member</label><br>

            <select name="assigned_member">
                <option value="">Not Assigned</option>

                <?php while($m = $members->fetch_assoc()) { ?>
                    <option value="<?php echo $m['id']; ?>">
                        <?php echo htmlspecialchars($m['name']); ?>
                    </option>
                <?php } ?>

            </select><br><br>

            <button type="submit" class="btn">
                Save Task
            </button>

        </form>
    </div>

    <h2 style="margin-top:30px;">All Tasks</h2>

    <div class="card">
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>ID</th>
                <th>Task</th>
                <th>Priority</th>
                <th>Member</th>
                <th>Deadline</th>
                <th>Status</th>
            </tr>

            <?php while($t = $tasks->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $t['id']; ?></td>

                    <td>
                        <?php echo htmlspecialchars($t['task_name']); ?>
                    </td>

                    <td>
                        <?php echo htmlspecialchars($t['priority']); ?>
                    </td>

                    <td>
                        <?php echo htmlspecialchars(
                            $t['member_name'] ?? 'Not Assigned'
                        ); ?>
                    </td>

                    <td><?php echo htmlspecialchars($t['deadline']); ?></td>

                    <td><?php echo htmlspecialchars($t['status']); ?></td>
                </tr>
            <?php } ?>

        </table>
    </div>

    <a href="../index.php" class="btn">Back to Dashboard</a>

</div>

</body>
</html>
