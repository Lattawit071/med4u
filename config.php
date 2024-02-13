<?php
// Include the database connection and configuration
require_once 'config.php';

// Check if the query parameter is set in the POST request
if (isset($_POST['query'])) {
    $inputText = $_POST['query'];

    // Prepare and execute the SQL query
    $sql = "SELECT name FROM hospital WHERE name LIKE :hospital_name";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['hospital_name' => '%' . $inputText . '%' ]);
    $result = $stmt->fetchAll();

    // Check if there are results
    if ($result) {
        // Loop through the results and echo the HTML for each item
        foreach($result as $row) {
            echo '<a class="list-group-item list-group-item-action border-1">' . $row['name'] . '</a>';
        }
    } else {
        // If no results, echo a message
        echo '<p class="list-group-item border-1">No records found.</p>';
    }
}
?>
