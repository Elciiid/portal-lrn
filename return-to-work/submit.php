<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Concatenate Superior Name and Position for the single DB column
        $superior_info = "";
        if (isset($_POST['notified']) && $_POST['notified'] === 'Yes') {
            $name = $_POST['sup_name'] ?? '';
            $pos = $_POST['sup_pos'] ?? '';
            $superior_info = $name . " - " . $pos;
        }

        $sql = "INSERT INTO return_to_work (
                    date, 
                    employee_number, 
                    employee_name,
                    prodn_type, 
                    days_absence, 
                    first_date_absence, 
                    date_returned, 
                    reason, 
                    notified_superior, 
                    superior_name_position, 
                    filing_date
                ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        
        $stmt->execute([
            date('Y-m-d H:i:s'),
            $_POST['emp_no'],
            $_POST['emp_name'],
            $_POST['assigned_area'], // Saved into prodn_type
            $_POST['days'],
            $_POST['start_date'],
            $_POST['return_date'],
            $_POST['reason'],
            $_POST['notified'],
            $superior_info,
            $_POST['filing_date']
        ]);

        header("Location: index.php?success=1");
        exit();

    } catch (PDOException $e) {
        die("Database Error: " . $e->getMessage());
    }
}
?>