<?php
include 'db.php';

$term = $_GET['term'] ?? '';

if (strlen($term) >= 1) {
    // Note: Using 'employee_name' as per your database screenshot
    $stmt = $conn->prepare("SELECT TOP 10 employee_number, employee_name, department FROM employees WHERE employee_name LIKE ?");
    $stmt->execute([$term . '%']);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($results);
}
?>