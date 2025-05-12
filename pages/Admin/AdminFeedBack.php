<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . "/../../dbfunctions/adminfunctions.php";
require_once "./AdminTopNavBar.php";
require_once "./AdminSideNavBar.php";

$data = feeedBackDetails();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Feedback</title>
    <link href="../../Bootstrap/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" />
    <style>
        .feedback_section {
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
            .feedback_section {
                left: 0;
                top: 86px;
            }
        }

        th {
            background-color: #D02964 !important;
            color: white !important;
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
    <div class="container mt-5">
        <div class="feedback_section">
            <h3 class="mb-4">Feedback List</h3>
            <?php if ($data) { ?>
                <table id="feedbackTable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>User Name</th>
                            <th>Feedback</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $data->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['userid']); ?></td>
                                <td><?php echo htmlspecialchars($row['name']); ?></td>
                                <td><?php echo htmlspecialchars($row['message']); ?></td>
                                <td><?php echo date("d M Y", strtotime($row['created_at'])); ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } else { ?>
                <p>No feedback entries found.</p>
            <?php } ?>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#feedbackTable').DataTable();
        });
    </script>
</body>

</html>
