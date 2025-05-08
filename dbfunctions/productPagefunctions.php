<?php 
require_once __DIR__.'/dbconnect.php';

// Get products with pagination
function products($tableName, $limit = 12, $offset = 0) {
    global $conn;

    if ($tableName === "all") {
        try {
            $tables = [];
            $products = [];

            $qry = "SELECT table_name FROM category";
            $stmt = $conn->prepare($qry);
            $stmt->execute();
            $category = $stmt->get_result();

            if ($category) {
                while ($data = $category->fetch_assoc()) {
                    $tables[] = $data['table_name'];
                }
            }

            // Fetch products from all tables with limit
            foreach ($tables as $table) {
                $qry = "SELECT * FROM $table";
                $stmt = $conn->prepare($qry);
                $stmt->execute();
                $res = $stmt->get_result();
                while ($row = $res->fetch_assoc()) {
                    $row['table'] = $table;
                    $products[] = $row;
                }
            }

            // Sort all and slice based on pagination
            usort($products, function ($a, $b) {
                return rand(-1, 1); // Random sort for demonstration
            });

            return array_slice($products, $offset, $limit);

        } catch (Exception $e) {
            die($e->getMessage());
        }

    } else {
        try {
            $qry = "SELECT * FROM $tableName LIMIT ? OFFSET ?";
            $stmt = $conn->prepare($qry);
            $stmt->bind_param("ii", $limit, $offset);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                return $result;
            } else {
                return false;
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}

// Get total product count for pagination
function productCount($tableName) {
    global $conn;

    if ($tableName === "all") {
        try {
            $tables = [];
            $total = 0;

            $qry = "SELECT table_name FROM category";
            $stmt = $conn->prepare($qry);
            $stmt->execute();
            $category = $stmt->get_result();

            if ($category) {
                while ($data = $category->fetch_assoc()) {
                    $tables[] = $data['table_name'];
                }
            }

            foreach ($tables as $table) {
                $qry = "SELECT COUNT(*) as count FROM $table";
                $stmt = $conn->prepare($qry);
                $stmt->execute();
                $res = $stmt->get_result()->fetch_assoc();
                $total += $res['count'];
            }

            return $total;
        } catch (Exception $e) {
            die($e->getMessage());
        }

    } else {
        try {
            $qry = "SELECT COUNT(*) as count FROM $tableName";
            $stmt = $conn->prepare($qry);
            $stmt->execute();
            $result = $stmt->get_result()->fetch_assoc();
            return $result['count'];
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}

// Get list of categories
function category() {
    global $conn;
    try {
        $tables = [];
        $qry = "SELECT table_name FROM category";
        $stmt = $conn->prepare($qry);
        $stmt->execute();
        $category = $stmt->get_result();
        if ($category) {
            while ($data = $category->fetch_assoc()) {
                $tables[] = $data['table_name'];
            }
        }
        array_unshift($tables, "all"); // match category key for consistency
        return $tables;
    } catch (Exception $e) {
        die($e->getMessage());
    }
}
?>
