
<?php
include "../config/db.php";

$result = $conn->query(
    "SELECT tasks.*, members.name AS member_name
     FROM tasks
     LEFT JOIN members ON tasks.assigned_member = members.id
     ORDER BY tasks.deadline ASC"
);
?>

<!DOCTYPE html>
<html>
<head>
    <title>ML Predictions</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="main">

    <h1>Machine Learning Predictions</h1>

    <p>Task assignment and deadline prediction analysis.</p>

    <div class="card">

        <table border="1" cellpadding="12" cellspacing="0">

            <tr>
                <th>Task</th>
                <th>Assigned Member</th>
                <th>Complexity</th>
                <th>Estimated Hours</th>
                <th>Deadline</th>
                <th>Predicted Days</th>
            </tr>

            <?php while($row = $result->fetch_assoc()) { ?>

            <tr>
                <td><?php echo htmlspecialchars($row['task_name']); ?></td>

                <td>
                    <?php echo htmlspecialchars(
                        $row['member_name'] ?? 'Not Assigned'
                    ); ?>
                </td>

                <td><?php echo htmlspecialchars($row['complexity']); ?></td>

                <td><?php echo $row['estimated_hours']; ?></td>

                <td><?php echo htmlspecialchars($row['deadline']); ?></td>

                <td>
                    <?php
                    echo $row['predicted_days'] !== null
                        ? htmlspecialchars((string)$row['predicted_days']) . " days"
                        : "Awaiting ML model";
                    ?>
                </td>
            </tr>

            <?php } ?>

        </table>

    </div>

    <a href="../index.php" class="btn">Back to Dashboard</a>

</div>

</body>
</html>
