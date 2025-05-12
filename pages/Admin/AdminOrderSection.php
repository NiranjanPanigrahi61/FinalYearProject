<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . "/../../dbfunctions/adminfunctions.php";
require_once "./AdminTopNavBar.php";
require_once "./AdminSideNavBar.php";

$data = orderDetails();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Order Section</title>
    <link href="../../Bootstrap/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" />
    <style>
        .order-section {
            position: fixed;
            top: 110px;
            left: 275px;
            right: 0;
            bottom: 0;
            padding: 20px;
            overflow-y: auto;
            background-color: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        @media (max-width: 768px) {
            .order-section {
                left: 0;
                top: 86px;
            }
        }

        .form-control:focus,
        select.form-control:focus,
        textarea.form-control:focus {
            outline: none;
        }

        .textarea-css {
            height: 150px !important;
            resize: none;
        }

        th {
            background-color: #D02964 !important;
            color: white !important;
        }

        :root {
            --theme-color: #D02964;
            --number-color: red;
        }

        .status-pending {
            color: orange !important;
            font-weight: bold;
        }

        .status-delivered {
            color: green !important;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="order-section">
            <?php if ($data) { ?>
                <div class="table-responsive">
                    <table id="orderTable" class="table table-bordered table-striped table-hover text-center">
                        <thead>
                            <tr>
                                <th>User ID</th>
                                <th>Order ID</th>
                                <th>Address ID</th>
                                <th>Payment ID</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Order Date</th>
                                <th>Status</th>
                                <th style="display:none;">StatusSort</th> <!-- Hidden sort column -->
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $data->fetch_assoc()) { ?>
                                <tr id="order-<?php echo $row['orderid']; ?>">
                                    <td><?php echo $row['userid']; ?></td>
                                    <td><?php echo $row['orderid']; ?></td>
                                    <td><?php echo $row['addressid']; ?></td>
                                    <td><?php echo $row['paymentid']; ?></td>
                                    <td><?php echo $row['quantity']; ?></td>
                                    <td><?php echo $row['total_price']; ?></td>
                                    <td><?php echo $row['order_date']; ?></td>
                                    <td id="status-<?php echo $row['orderid']; ?>" class="status-<?php echo strtolower($row['status']); ?>">
                                        <?php echo $row['status']; ?>
                                    </td>
                                    <td style="display:none;"><?php echo ($row['status'] === 'Pending') ? 1 : 2; ?></td> <!-- StatusSort -->
                                    <td>
                                        <button class="btn btn-primary btn-sm change-status"
                                            data-order-id="<?php echo $row['orderid']; ?>"
                                            data-current-status="<?php echo $row['status']; ?>">
                                            Change Status
                                        </button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            <?php } else { ?>
                <div class="alert alert-warning text-center">No order data available.</div>
            <?php } ?>
        </div>
    </div>

    <script src="../../JQuery/jquery-3.7.1.js"></script>
    <script src="../../Bootstrap/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function () {
            var table = $('#orderTable').DataTable({
                paging: true,
                pageLength: 10,
                lengthMenu: [5, 10, 25, 50, 100],
                ordering: true,
                info: true,
                order: [[8, 'asc']] // Sort by hidden StatusSort column
            });

            $(".change-status").click(function () {
                var orderId = $(this).data("order-id");
                var currentStatus = $(this).data("current-status");
                var newStatus = (currentStatus === "Pending") ? "Delivered" : "Pending";

                $.ajax({
                    url: "../../dbfunctions/update_status.php",
                    method: "POST",
                    data: {
                        orderid: orderId,
                        status: newStatus
                    },
                    success: function (response) {
                        if (response === "success") {
                            var statusCell = $("#status-" + orderId);
                            statusCell.text(newStatus);
                            statusCell.removeClass("status-pending status-delivered");

                            var newClass = (newStatus === "Delivered") ? "status-delivered" : "status-pending";
                            statusCell.addClass(newClass);

                            // Update button's data-current-status
                            $(".change-status[data-order-id='" + orderId + "']").data("current-status", newStatus);

                            // Update hidden sort column
                            var sortValue = (newStatus === "Pending") ? 1 : 2;
                            $("#order-" + orderId + " td:eq(8)").text(sortValue);

                            // Redraw table to reapply sort
                            table.row("#order-" + orderId).invalidate().draw(false);

                            Swal.fire("Success", "Order status updated!", "success");
                        } else {
                            Swal.fire("Error", "Failed to update status.", "error");
                        }
                    }
                });
            });
        });
    </script>
</body>

</html>
