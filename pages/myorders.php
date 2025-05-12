<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    ob_end_flush();
    exit();
}

$conn = new mysqli("localhost", "root", "", "bakery") or die("Connection failed: " . $conn->connect_error);

$orders = [];
try {
    $qry = "SELECT productid, category, status, orderid FROM orders";
    $stmt = $conn->prepare($qry);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $table = $row['category'];
        $productid = $row['productid'];
        $status = $row['status'];
        $orderid = $row['orderid'];

        $subqry = "SELECT * FROM $table WHERE id=?";
        $stmt2 = $conn->prepare($subqry);
        $stmt2->bind_param("i", $productid);
        $stmt2->execute();
        $res = $stmt2->get_result();

        while ($product = $res->fetch_assoc()) {
            $product['status'] = $status;
            $product['orderid'] = $orderid;
            $orders[] = $product;
        }
    }

} catch (Exception $e) {
    die($e->getMessage());
} finally {
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>My Orders</title>
    <link href="./../Bootstrap/bootstrap.min.css" rel="stylesheet">
    <style>
        .order-container {
            max-height: 600px;
            overflow-y: auto;
        }

        .order-card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        }

        .order-img {
            width: 100%;
            height: 160px;
            object-fit: cover;
            border-radius: 0.5rem;
        }

        .status-badge {
            padding: 0.4em 0.7em;
            border-radius: 1rem;
            font-size: 0.85rem;
        }

        .status-pending {
            background-color: #fff3cd;
            color: #856404;
        }

        .status-shipped {
            background-color: #d1ecf1;
            color: #0c5460;
        }

        .status-delivered {
            background-color: #d4edda;
            color: #155724;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h3 class="mb-4">My Orders</h3>
        <div class="order-container">
            <?php foreach ($orders as $order) { ?>
                <div class="card order-card mb-4 p-3">
                    <div class="row g-3 align-items-center">
                        <div class="col-4 col-md-3">
                            <img src="<?= htmlspecialchars($order['image']) ?>" class="order-img" alt="<?= htmlspecialchars($order['product_name']) ?>">
                        </div>
                        <div class="col-md-6 col-8">
                            <div class="card-body py-2 px-1">
                                <h4 class="card-title mb-2"><?= htmlspecialchars($order['product_name']) ?></h4>
                                <p class="card-text mb-1"><strong>Quantity:</strong> <?= $order['quantity'] ?></p>
                                <p class="card-text mb-1"><strong>Total:</strong> ₹<?= number_format($order['price'], 2) ?></p>
                                <p class="card-text mb-1"><strong>Ordered on:</strong> <?= date("d M Y", strtotime($order['created_at'])) ?></p>
                            </div>
                        </div>
                        <div class="col-md-3 col-12 d-flex flex-column justify-content-center align-items-md-end">
                            <span class="status-badge 
                            <?= $order['status'] === 'Pending' ? 'status-pending' : ($order['status'] === 'Shipped' ? 'status-shipped' : 'status-delivered') ?>">
                                <?= $order['status'] ?>
                            </span>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <script src="./../Bootstrap/bootstrap.bundle.min.js"></script>
</body>
</html>
