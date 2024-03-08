<?php
include './config/db_conn.inc.php';
?>

<script>
function redirectToHospitalCase(name, id) {
    window.location.href = `hospital_case?name=${name}&hospital_id=${id}`;
}
</script>

<?php
$search_term = $_POST['hospital_case'];
try {
    $dbConfig = new DashboardConfig();
    $conn = $dbConfig->getConnection();

    $sql = "SELECT id, name FROM hospital_case WHERE name LIKE :search_term LIMIT 4";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':search_term', "%{$search_term}%", PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        while ($row = $stmt->fetch()) {
            $id = isset($row['id']) ? $row['id'] : '';
            echo "<div onclick=\"redirectToHospitalCase('{$row['name']}', '{$id}')\"><a style='text-decoration: none;' class='items-link' href='javascript:void(0);'>{$row['name']}</a></div>";
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
