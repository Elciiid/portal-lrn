<?php
// Home config - update these when moving to the office
$host = "localhost"; 
$dbName = "company_db"; 
$uid = ""; // your local SQL username
$pwd = ""; // your local SQL password

try {
    // sqlsrv driver is required for MSSQL in PHP
    $conn = new PDO("sqlsrv:server=$host;Database=$dbName", $uid, $pwd);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error connecting to MSSQL: " . $e->getMessage());
}
?>