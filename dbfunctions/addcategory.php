<?php
include_once "./dbconnect.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addcategory'])) {
    $categoryName = trim($_POST['category']);

    // Generate table name safely: lowercase and underscores
    $tableName = strtolower(str_replace(' ', '_', $categoryName));

    // Validate to prevent SQL injection in table names
    if (!preg_match('/^[a-zA-Z_][a-zA-Z0-9_]*$/', $tableName)) {
        die("Invalid category name.");
    }

    // Insert into categories table
    $insertSql = "INSERT INTO category (name, table_name) VALUES (?, ?)";
    $stmt = $conn->prepare($insertSql);
    $stmt->bind_param("ss", $categoryName, $tableName);

    if ($stmt->execute()) {
        // Create a new table for this category
        $createTableSql = "
            CREATE TABLE `$tableName` (
                id INT AUTO_INCREMENT PRIMARY KEY,
                product_name VARCHAR(255) NOT NULL,
                description TEXT,
                price DECIMAL(10,2),
                image VARCHAR(255),
                created_at DATETIME DEFAULT CURRENT_TIMESTAMP
            )
        ";

        if ($conn->query($createTableSql)) {
            echo "<script>alert('Category and table \"$tableName\" created successfully.'); window.location.href='add_category_form.php';</script>";
        } else {
            echo "Failed to create table: " . $conn->error;
        }
    } else {
        echo "Error inserting category: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
