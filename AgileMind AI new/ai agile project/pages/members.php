
<?php
include "../config/db.php";

$result = $conn->query("SELECT * FROM members ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Team Members</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="main">

    <h1>Team Members</h1>
    <p>View your project team information.</p>

    <div class="card">

        <table border="1" cellpadding="12" cellspacing="0">

            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Skills</th>
                <th>Experience</th>
                <th>Workload</th>
            </tr>

            <?php while($row = $result->fetch_assoc()) { ?>

            <tr>
                <td><?php echo $row['id']; ?></td>

                <td><?php echo htmlspecialchars($row['name']); ?></td>

                <td><?php echo htmlspecialchars($row['email'] ?? ''); ?></td>

                <td><?php echo htmlspecialchars($row['skills'] ?? ''); ?></td>

                <td><?php echo $row['experience']; ?></td>

                <td><?php echo $row['workload']; ?></td>
            </tr>

            <?php } ?>

        </table>

    </div>

    <a href="../index.php" class="btn">Back to Dashboard</a>

</div>

</body>
</html>
