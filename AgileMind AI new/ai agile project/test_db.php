
<?php
$host = "127.0.0.1";
$user = "root";
$password = "8217674593";
$database = "agile_ml";

try {
    $conn = new mysqli($host, $user, $password, $database);

    echo "PHP TO MYSQL CONNECTION SUCCESSFUL!";
} catch (mysqli_sql_exception $e) {
    echo "CONNECTION FAILED: " . $e->getMessage();
}
?>
