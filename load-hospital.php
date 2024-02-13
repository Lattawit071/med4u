<?php
include './config/db_conn.inc.php';

$search_term = $_POST['hospital'];

try {
    $dbConfig = new DashboardConfig();
    $conn = $dbConfig->getConnection();

    $sql = "SELECT name FROM hospital WHERE name LIKE :search_term LIMIT 4";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':search_term', "%{$search_term}%", PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        while ($row = $stmt->fetch()) {
            echo "<div><a class='items-link' href='single-movie.php?name={$row['name']}' target='_blank'>{$row['name']}</a></div>";
        }
    } else {
        echo "<div>Hospital not found.</div>";
    }
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
} finally {
    $conn = null;
}
?>
